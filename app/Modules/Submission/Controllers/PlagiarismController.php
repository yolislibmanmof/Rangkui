<?php

namespace App\Modules\Submission\Controllers;

use App\Controllers\BaseController;

class PlagiarismController extends BaseController
{
    /**
     * Halaman publik: cek similarity mandiri
     */
    public function index()
    {
        $db = \Config\Database::connect();
        _renderView('v_plagiarism_check', 'Cek Similaritas Mandiri', [
            'threshold' => (float) $this->getSetting('plagiarism_gate_threshold', 25),
            'fp_count'  => (int) $db->table('xu_plagiarism_fingerprints')->countAllResults(),
        ]);
    }

    /**
     * 🛡️ HALAMAN ADMIN: Audit riwayat gerbang plagiarisme + manajemen sidik jari
     * Terbungkus template admin otomatis via _renderView (guard session admin).
     */
    public function audit()
    {
        // Guard: khusus admin login
        if (!session()->get('user_id')) {
            return redirect()->to(base_url('login'));
        }

        $db     = \Config\Database::connect();
        $total  = (int) $db->table('xu_plagiarism_checks')->countAllResults();
        $lulus  = (int) $db->table('xu_plagiarism_checks')->where('status', 'lulus')->countAllResults();
        $avgRow = $db->table('xu_plagiarism_checks')->selectAvg('similarity_score')->get()->getRow();

                _render('v_plagiarism_audit', 'Audit Gerbang Plagiarisme', [
            'total' => $total,
            'lulus' => $lulus,
            'gagal' => $total - $lulus,
            'avg'   => round((float) ($avgRow->similarity_score ?? 0), 1),
            'fp'    => (int) $db->table('xu_plagiarism_fingerprints')->countAllResults(),
            'rows'  => $db->table('xu_plagiarism_checks')
                            ->orderBy('check_id', 'DESC')
                            ->limit(100)
                            ->get()->getResult(),
        ]);
    }

    /**
     * SCAN PDF unggahan vs seluruh koleksi repositori
     */
    public function scan()
    {
        @set_time_limit(180);
        helper('integrity_helper');

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan']);
        }

        $file = $this->request->getFile('pdf_file');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['ok' => false, 'error' => 'File tidak valid']);
        }
        if ($file->getClientMimeType() !== 'application/pdf') {
            return $this->response->setJSON(['ok' => false, 'error' => 'Hanya file PDF yang diterima']);
        }
        if ($file->getSize() > 25 * 1024 * 1024) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Ukuran maksimal 25MB']);
        }

        $studentId = trim((string) $this->request->getPost('student_id'));

        // 1. Ekstrak teks PDF
        try {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($file->getRealPath());
            $text   = $pdf->getText();
        } catch (\Throwable $e) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Gagal membaca PDF: ' . $e->getMessage()]);
        }

        if (strlen(trim($text)) < 200) {
            return $this->response->setJSON(['ok' => false, 'error' => 'PDF tidak mengandung teks yang cukup (mungkin hasil scan gambar)']);
        }

        // 2. Bangun sidik jari dokumen unggahan (4-gram)
        $upSig = integrity_signature($text, 4);
        if (count($upSig) < 20) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Dokumen terlalu pendek untuk dianalisis']);
        }

        // 3. Muat sidik jari koleksi (hanya dokumen publik)
        $db   = \Config\Database::connect();
        $rows = $db->query("
            SELECT f.fp_id, f.biblio_id, f.sig_text, f.hash_count, b.title, b.publish_year, b.departement
            FROM xu_plagiarism_fingerprints f
            JOIN biblio b ON b.biblio_id = f.biblio_id
            WHERE b.opac_hide = 0
        ")->getResult();

        if (empty($rows)) {
            return $this->response->setJSON([
                'ok' => true, 'score' => 0, 'threshold' => (float) $this->getSetting('plagiarism_gate_threshold', 25),
                'status' => 'lulus', 'matches' => [], 'snippets' => [], 'fp_count' => 0,
                'token' => $this->issueToken($studentId, $file->getName(), 0, [], []),
                'message' => 'Koleksi pembanding masih kosong. Dokumen Anda otomatis lolos.',
            ]);
        }

        // 4. Bandingkan dengan setiap dokumen koleksi
        $upFlip = array_flip($upSig);
        $upLen  = count($upSig);
        $matches = [];

        foreach ($rows as $r) {
            $docSig  = explode(',', $r->sig_text);
            $docFlip = array_flip($docSig);
            $inter   = count(array_intersect_key($upFlip, $docFlip));
            if ($inter === 0) continue;

            $union       = $upLen + count($docSig) - $inter;
            $jaccard     = $union > 0 ? $inter / $union : 0;
            $containment = $inter / min($upLen, count($docSig)); // overlap coefficient
            $score       = round($containment * 100, 2);

            if ($score > 1) {
                $matches[] = [
                    'biblio_id' => (int) $r->biblio_id,
                    'title'     => $r->title,
                    'year'      => $r->publish_year,
                    'dept'      => $r->departement,
                    'score'     => $score,
                    'jaccard'   => round($jaccard * 100, 2),
                    'shared'    => $inter,
                    'sig'       => $docSig, // dipakai sementara untuk deteksi kalimat
                ];
            }
        }

        usort($matches, fn($a, $b) => $b['score'] <=> $a['score']);
        $top      = array_slice($matches, 0, 5);
        $maxScore = !empty($top) ? $top[0]['score'] : 0;

        // 5. Deteksi kalimat paling mirip (untuk highlight)
        $snippets = [];
        if (!empty($top)) {
            $topSigFlip = array_flip($top[0]['sig']);
            $sentences  = integrity_sentences($text);
            $scored     = [];
            foreach ($sentences as $s) {
                if (mb_strlen($s) < 60) continue;
                $sSig = integrity_signature($s, 3);
                if (count($sSig) < 3) continue;
                $sFlip = array_flip($sSig);
                $ov    = count(array_intersect_key($sFlip, $topSigFlip));
                $ratio = $ov / count($sSig);
                if ($ratio >= 0.30) {
                    $scored[] = ['ratio' => $ratio, 'text' => $s];
                }
            }
            usort($scored, fn($a, $b) => $b['ratio'] <=> $a['ratio']);
            foreach (array_slice($scored, 0, 3) as $sc) {
                $snippets[] = ['ratio' => round($sc['ratio'] * 100), 'text' => mb_substr($sc['text'], 0, 400)];
            }
        }

        // Bersihkan sig internal sebelum dikirim ke frontend
        foreach ($top as &$t) unset($t['sig']);
        unset($t);

        // 6. Evaluasi status & terbitkan token bila lulus
        $threshold = (float) $this->getSetting('plagiarism_gate_threshold', 25);
        $status    = ($maxScore <= $threshold) ? 'lulus' : 'gagal';
        $token     = null;
        $expires   = null;

        $checkId = $this->logCheck($studentId, $file->getName(), $maxScore, $threshold, $status, $top, $snippets);
        if ($status === 'lulus') {
            $token   = bin2hex(random_bytes(16));
            $expires = date('Y-m-d H:i:s', time() + 86400);
            $db->table('xu_plagiarism_checks')->where('check_id', $checkId)->update([
                'token' => $token, 'expires_at' => $expires,
            ]);
        }

        return $this->response->setJSON([
            'ok'        => true,
            'score'     => $maxScore,
            'threshold' => $threshold,
            'status'    => $status,
            'matches'   => $top,
            'snippets'  => $snippets,
            'fp_count'  => count($rows),
            'token'     => $token,
            'expires'   => $expires,
            'check_id'  => $checkId,
        ]);
    }

    /**
     * ADMIN: bangun ulang sidik jari koleksi (batch, dengan progress)
     */
    public function build()
    {
        @set_time_limit(300);
        helper('integrity_helper');

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan']);
        }
        if (!session()->get('user_id')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Khusus admin yang login'])->setStatusCode(403);
        }

        $offset = (int) $this->request->getPost('offset');
        $force  = (int) $this->request->getPost('force');
        $batch  = 4;

        $db = \Config\Database::connect();

        $baseSql = "
            SELECT b.biblio_id, f.file_name, f.file_dir
            FROM biblio b
            JOIN (
                SELECT ba.biblio_id, MAX(ba.file_id) AS file_id
                FROM biblio_attachment ba
                JOIN files f2 ON f2.file_id = ba.file_id
                WHERE f2.file_name LIKE '%.pdf'
                GROUP BY ba.biblio_id
            ) latest ON latest.biblio_id = b.biblio_id
            JOIN files f ON f.file_id = latest.file_id
            WHERE b.opac_hide = 0
        ";
        if (!$force) {
            $baseSql .= " AND b.biblio_id NOT IN (SELECT biblio_id FROM xu_plagiarism_fingerprints)";
        }
        $baseSql .= " ORDER BY b.biblio_id ASC";

        $total = count($db->query($baseSql)->getResult());
        $docs  = $db->query($baseSql . " LIMIT {$batch} OFFSET {$offset}")->getResult();

        $done = 0;
        foreach ($docs as $d) {
            $path = FCPATH . trim($d->file_dir, './') . '/' . $d->file_name;
            $path = str_replace('//', '/', $path);
            if (!file_exists($path)) { $done++; continue; }

            try {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf    = $parser->parseFile($path);
                $text   = $pdf->getText();
            } catch (\Throwable $e) {
                $done++; continue;
            }
            if (strlen(trim($text)) < 200) { $done++; continue; }

            $sig  = integrity_signature($text, 4);
            $wc   = count(integrity_tokenize($text));
            $data = [
                'biblio_id'  => (int) $d->biblio_id,
                'sig_text'   => implode(',', $sig),
                'hash_count' => count($sig),
                'word_count' => $wc,
                'source_file'=> $d->file_name,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $exists = $db->table('xu_plagiarism_fingerprints')->where('biblio_id', $d->biblio_id)->get()->getRow();
            if ($exists) {
                $db->table('xu_plagiarism_fingerprints')->where('fp_id', $exists->fp_id)->update($data);
            } else {
                $db->table('xu_plagiarism_fingerprints')->insert($data);
            }
            $done++;
        }

        $newOffset = $offset + $done;
        return $this->response->setJSON([
            'ok'       => true,
            'done'     => $done,
            'offset'   => $newOffset,
            'total'    => $total,
            'finished' => ($done === 0 || $newOffset >= $total),
        ]);
    }

    /**
     * Saran perbaikan berbasis AI untuk kalimat yang mirip
     */
    public function advice()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan']);
        }
        $snippets  = (string) $this->request->getPost('snippets');
        $matchTitle = (string) $this->request->getPost('match_title');
        if (trim($snippets) === '') {
            return $this->response->setJSON(['ok' => false, 'error' => 'Tidak ada kutipan untuk dianalisis']);
        }

        $apiKey = trim(env('GEMINI_API_KEY', ''));
        if (empty($apiKey)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'GEMINI_API_KEY kosong']);
        }

        $prompt = "Kamu adalah asisten integritas akademik. Berikut adalah potongan teks tugas akhir mahasiswa yang terdeteksi MIRIP dengan karya lain berjudul \"{$matchTitle}\":\n\n\"\"\"\n{$snippets}\n\"\"\"\n\nBerikan 3 saran konkret dalam Bahasa Indonesia untuk menulis ulang potongan tersebut dengan kata-kata sendiri tanpa mengubah makna ilmiah, plus contoh satu kalimat hasil parafrase untuk potongan pertama. Gunakan markdown ringan, maks 200 kata.";

        $models = ['gemini-3.5-flash-lite', 'gemini-3.8-flash', 'gemini-flash-latest'];
        foreach ($models as $m) {
            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$m}:generateContent?key=" . $apiKey;
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_TIMEOUT => 40,
                CURLOPT_POSTFIELDS => json_encode([
                    'contents' => [['parts' => [['text' => $prompt]]]],
                    'generationConfig' => ['temperature' => 0.6],
                ]),
            ]);
            $resp = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($code === 200) {
                $body = json_decode($resp, true);
                $txt  = $body['candidates'][0]['content']['parts'][0]['text'] ?? '';
                if ($txt !== '') return $this->response->setJSON(['ok' => true, 'advice' => $txt, 'model' => $m]);
            }
            if ($code === 401 || $code === 403) break;
        }
        return $this->response->setJSON(['ok' => false, 'error' => 'AI tidak tersedia saat ini']);
    }

    // ================= HELPERS =================

    private function logCheck($studentId, $fileName, $score, $threshold, $status, $matches, $snippets)
    {
        $db = \Config\Database::connect();
        $db->table('xu_plagiarism_checks')->insert([
            'student_id'       => $studentId !== '' ? $studentId : null,
            'file_name'        => $fileName,
            'similarity_score' => $score,
            'threshold'        => $threshold,
            'status'           => $status,
            'matches_json'     => json_encode($matches, JSON_UNESCAPED_UNICODE),
            'snippets_json'    => json_encode($snippets, JSON_UNESCAPED_UNICODE),
            'created_at'       => date('Y-m-d H:i:s'),
        ]);
        return $db->insertID();
    }

    private function issueToken($studentId, $fileName, $score, $matches, $snippets)
    {
        $db    = \Config\Database::connect();
        $token = bin2hex(random_bytes(16));
        $db->table('xu_plagiarism_checks')->insert([
            'token'            => $token,
            'student_id'       => $studentId !== '' ? $studentId : null,
            'file_name'        => $fileName,
            'similarity_score' => $score,
            'threshold'        => (float) $this->getSetting('plagiarism_gate_threshold', 25),
            'status'           => 'lulus',
            'matches_json'     => json_encode($matches),
            'snippets_json'    => json_encode($snippets),
            'created_at'       => date('Y-m-d H:i:s'),
            'expires_at'       => date('Y-m-d H:i:s', time() + 86400),
        ]);
        return $token;
    }

    /**
     * Verifikasi token pra-approval (dipanggil modul Submission saat proses upload)
     */
    public static function verifyToken($token)
    {
        if (empty($token)) return null;
        $db = \Config\Database::connect();
        $row = $db->table('xu_plagiarism_checks')
            ->where('token', $token)
            ->where('status', 'lulus')
            ->get()->getRow();
        if (!$row) return null;
        if ($row->expires_at && strtotime($row->expires_at) < time()) return null;
        return $row;
    }

    private function getSetting($key, $default = null)
    {
        $db  = \Config\Database::connect();
        $row = $db->table('system_settings')->where('setting_key', $key)->get()->getRow();
        return $row ? $row->setting_value : $default;
    }
}