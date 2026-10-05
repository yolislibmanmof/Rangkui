<?php

namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;

class IntegrityController extends BaseController
{
    public $bibliopage = "biblio/";

    public function __construct()
    {
        helper('integrity');
    }

    /** Halaman utama scanner */
    public function index()
    {
        $db = \Config\Database::connect();
        $view  = $this->bibliopage . "v_integrity";
        $title = "Integrity Scanner";

        $content['docs'] = $db->query("
            SELECT b.biblio_id, b.title, b.publish_year,
                   b.integrity_similarity, b.integrity_ai_risk, b.integrity_last_scan
            FROM biblio b
            ORDER BY b.biblio_id DESC
            LIMIT 500
        ")->getResult();

        $content['stats'] = [
            'total_scanned'   => (int) $db->table('xu_fingerprint')->countAllResults(),
            'flagged_similar' => (int) $db->table('biblio')->where('integrity_similarity >', 70)->countAllResults(),
            'flagged_ai'      => (int) $db->table('biblio')->where('integrity_ai_risk >', 65)->countAllResults(),
        ];

        _render($view, $title, $content);
    }

    /** Scan satu dokumen */
    public function scan()
    {
        $bid = (int) $this->request->getPost('biblio_id');
        return $this->response->setJSON($this->runScan($bid));
    }

    /** Scan massal (per chunk agar tidak timeout) */
    public function scanAll()
    {
        @set_time_limit(300);
        @ini_set('memory_limit', '512M');
        $db = \Config\Database::connect();
        $offset = (int) $this->request->getPost('offset');
        $chunk = 5;

        $total = (int) $db->table('biblio')->countAllResults();
        $docs = $db->table('biblio')->select('biblio_id')
            ->orderBy('biblio_id', 'ASC')->limit($chunk, $offset)->get()->getResult();

        $done = 0;
        foreach ($docs as $d) { $this->runScan($d->biblio_id); $done++; }

        $next = $offset + $done;
        return $this->response->setJSON([
            'ok' => true, 'done' => $done, 'offset' => $next, 'total' => $total,
            'finished' => ($next >= $total || $done === 0),
        ]);
    }

    /** Detail hasil scan */
    public function detail()
    {
        $db = \Config\Database::connect();
        $bid = (int) $this->request->getGet('biblio_id');
        $last = $db->table('xu_scan_history')->where('biblio_id', $bid)->orderBy('scan_id', 'DESC')->get()->getRow();
        if (!$last) return $this->response->setJSON(['ok' => false]);
        $doc = $db->table('biblio')->where('biblio_id', $bid)->get()->getRow();
        $ind = json_decode($last->indicators, true) ?: [];
        return $this->response->setJSON([
            'ok' => true, 'doc' => $doc, 'scan' => $last, 'indicators' => $ind,
            'source' => $ind['source'] ?? 'Abstrak',
        ]);
    }

    /* ================= MESIN INTI ================= */

    private function runScan($bid)
    {
        @set_time_limit(300);
        @ini_set('memory_limit', '512M');
        $db = \Config\Database::connect();

        $doc = $db->table('biblio')->where('biblio_id', $bid)->get()->getRow();
        if (!$doc) return ['ok' => false, 'error' => 'Dokumen tidak ditemukan.'];

        $full = $this->getFullText($bid);
        $text = $full['text'];

        if (mb_strlen($text) < 100) {
            return ['ok' => false, 'error' => 'Teks terlalu pendek untuk dianalisis (min. 100 karakter).'];
        }

        $profile = integrity_full_profile($text);
        $ai = integrity_ai_risk_score($profile);

        // Simpan/update fingerprint
        $existing = $db->table('xu_fingerprint')->where('biblio_id', $bid)->get()->getRow();
        $fpData = [
            'biblio_id' => $bid,
            'text_hash' => $profile['text_hash'],
            'word_count' => $profile['word_count'],
            'unique_words' => $profile['unique_words'],
            'ttr' => $profile['ttr'],
            'entropy' => $profile['entropy'],
            'burstiness' => $profile['burstiness'],
            'avg_sentence_len' => $profile['avg_sentence_len'],
            'lexical_density' => $profile['lexical_density'],
            'ngram_signature' => json_encode($profile['signature']),
            'scan_count' => ($existing ? ($existing->scan_count + 1) : 1),
        ];
        if ($existing) $db->table('xu_fingerprint')->where('biblio_id', $bid)->update($fpData);
        else $db->table('xu_fingerprint')->insert($fpData);

        // Komparasi similarity
        $others = $db->table('xu_fingerprint')->where('biblio_id !=', $bid)->get()->getResult();
        $matches = [];
        foreach ($others as $o) {
            $otherSig = json_decode($o->ngram_signature, true) ?: [];
            $jaccard = integrity_jaccard($profile['signature'], $otherSig);
            if ($jaccard > 0.05) {
                $otherDoc = $db->table('biblio')->where('biblio_id', $o->biblio_id)->get()->getRow();
                $matches[] = [
                    'biblio_id' => $o->biblio_id,
                    'title' => $otherDoc ? $otherDoc->title : 'Unknown',
                    'score' => round($jaccard * 100, 2),
                ];
                $pairData = [
                    'biblio_a' => min($bid, $o->biblio_id),
                    'biblio_b' => max($bid, $o->biblio_id),
                    'jaccard_score' => $jaccard,
                    'ngram_overlap' => count(array_intersect($profile['signature'], $otherSig)),
                ];
                $dup = $db->table('xu_similarity_pairs')
                    ->where('biblio_a', $pairData['biblio_a'])
                    ->where('biblio_b', $pairData['biblio_b'])->get()->getRow();
                if ($dup) $db->table('xu_similarity_pairs')->where('pair_id', $dup->pair_id)->update($pairData);
                else $db->table('xu_similarity_pairs')->insert($pairData);
            }
        }
        usort($matches, fn($a, $b) => $b['score'] <=> $a['score']);
        $top = $matches[0] ?? null;
        $similarityScore = $top ? $top['score'] : 0;

        $db->table('biblio')->where('biblio_id', $bid)->update([
            'integrity_similarity' => $similarityScore,
            'integrity_ai_risk' => $ai['final'],
            'integrity_last_scan' => date('Y-m-d H:i:s'),
        ]);

        $db->table('xu_scan_history')->insert([
            'biblio_id' => $bid,
            'scan_type' => 'full',
            'similarity_score' => $similarityScore,
            'ai_risk_score' => $ai['final'],
            'top_match_biblio_id' => $top ? $top['biblio_id'] : null,
            'top_match_title' => $top ? $top['title'] : null,
            'top_match_percent' => $similarityScore,
            'indicators' => json_encode([
                'source' => $full['source'],
                'profile' => $profile,
                'ai_scores' => $ai['scores'],
                'matches' => $matches,
            ]),
        ]);

        return [
            'ok' => true,
            'source' => $full['source'],
            'similarity' => $similarityScore,
            'ai_risk' => $ai['final'],
            'ai_scores' => $ai['scores'],
            'profile' => [
                'word_count' => $profile['word_count'],
                'unique_words' => $profile['unique_words'],
                'ttr' => $profile['ttr'],
                'entropy' => $profile['entropy'],
                'burstiness' => $profile['burstiness'],
                'lexical_density' => $profile['lexical_density'],
                'ai_markers_total' => $profile['ai_markers']['total'],
            ],
            'matches' => array_slice($matches, 0, 5),
            'ai_markers' => $profile['ai_markers']['hits'],
        ];
    }

    /** Ambil teks: prioritaskan ISI PENUH PDF, fallback abstrak */
    private function getFullText($bid)
    {
        $db = \Config\Database::connect();
        $atts = $db->table('biblio_attachment AS ba')
            ->select('f.file_name')
            ->join('files AS f', 'f.file_id = ba.file_id')
            ->where('ba.biblio_id', $bid)
            ->get()->getResult();

        foreach ($atts as $at) {
            if (stripos($at->file_name, '.pdf') === false) continue;
            $path = FCPATH . 'uploads/repository/' . $at->file_name;
            if (!is_file($path)) continue;

            try {
                if (class_exists('\Smalot\PdfParser\Parser')) {
                    $parser = new \Smalot\PdfParser\Parser();
                    $pdf = $parser->parseFile($path);
                    $text = preg_replace('/\s+/', ' ', $pdf->getText());
                    if (mb_strlen($text) > 200) {
                        return ['text' => $text, 'source' => 'PDF (' . count($pdf->getPages()) . ' halaman)'];
                    }
                }
            } catch (\Throwable $e) {
                log_message('error', 'IntegrityScanner: parse PDF gagal: ' . $e->getMessage());
            }
            break;
        }

        $doc = $db->table('biblio')->where('biblio_id', $bid)->get()->getRow();
        return ['text' => trim((string) ($doc->notes ?? '')), 'source' => 'Abstrak'];
    }

    /** Dashboard Forensik Global */
    public function dashboard()
    {
        $db = \Config\Database::connect();

        $view  = $this->bibliopage . "v_integrity_dashboard";
        $title = "Dasbor Forensik Global";

        $totalDocs = (int) $db->table('biblio')->countAllResults();
        $totalScanned = (int) $db->table('biblio')
            ->where('integrity_last_scan IS NOT NULL', null, false)
            ->countAllResults();

        $avgRow = $db->query("
            SELECT
                ROUND(AVG(COALESCE(integrity_similarity,0)),2) AS avg_similarity,
                ROUND(AVG(COALESCE(integrity_ai_risk,0)),2) AS avg_ai
            FROM biblio
            WHERE integrity_last_scan IS NOT NULL
        ")->getRow();

        $flagSimilar = (int) $db->table('biblio')
            ->where('integrity_similarity >=', 70)
            ->countAllResults();

        $flagAi = (int) $db->table('biblio')
            ->where('integrity_ai_risk >=', 65)
            ->countAllResults();

        $cleanDocs = (int) $db->table('biblio')
            ->where('integrity_last_scan IS NOT NULL', null, false)
            ->where('integrity_similarity <', 20)
            ->where('integrity_ai_risk <', 30)
            ->countAllResults();

        $watchDocs = (int) $db->query("
            SELECT COUNT(*) AS total
            FROM biblio
            WHERE integrity_last_scan IS NOT NULL
              AND (
                    (integrity_similarity >= 20 AND integrity_similarity < 50)
                 OR (integrity_ai_risk >= 30 AND integrity_ai_risk < 65)
              )
              AND NOT (integrity_similarity >= 50 OR integrity_ai_risk >= 65)
        ")->getRow()->total;

        $dangerDocs = (int) $db->query("
            SELECT COUNT(*) AS total
            FROM biblio
            WHERE integrity_last_scan IS NOT NULL
              AND (integrity_similarity >= 50 OR integrity_ai_risk >= 65)
        ")->getRow()->total;

        $trend = $db->query("
            SELECT
                DATE(scanned_at) AS day,
                ROUND(AVG(similarity_score),2) AS avg_similarity,
                ROUND(AVG(ai_risk_score),2) AS avg_ai,
                COUNT(*) AS total_scan
            FROM xu_scan_history
            WHERE scanned_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
            GROUP BY DATE(scanned_at)
            ORDER BY day ASC
        ")->getResult();

        $topSimilar = $db->query("
            SELECT biblio_id, title, publish_year, integrity_similarity, integrity_ai_risk, integrity_last_scan
            FROM biblio
            WHERE integrity_last_scan IS NOT NULL
            ORDER BY integrity_similarity DESC, integrity_ai_risk DESC
            LIMIT 10
        ")->getResult();

        $topAi = $db->query("
            SELECT biblio_id, title, publish_year, integrity_similarity, integrity_ai_risk, integrity_last_scan
            FROM biblio
            WHERE integrity_last_scan IS NOT NULL
            ORDER BY integrity_ai_risk DESC, integrity_similarity DESC
            LIMIT 10
        ")->getResult();

        $pairs = $db->query("
            SELECT
                p.biblio_a,
                p.biblio_b,
                ROUND(p.jaccard_score * 100, 2) AS percent,
                p.ngram_overlap,
                p.compared_at,
                ba.title AS title_a,
                bb.title AS title_b
            FROM xu_similarity_pairs p
            LEFT JOIN biblio ba ON ba.biblio_id = p.biblio_a
            LEFT JOIN biblio bb ON bb.biblio_id = p.biblio_b
            ORDER BY p.jaccard_score DESC
            LIMIT 10
        ")->getResult();

        $recent = $db->query("
            SELECT
                h.scan_id,
                h.biblio_id,
                b.title,
                h.similarity_score,
                h.ai_risk_score,
                h.top_match_title,
                h.top_match_percent,
                h.scanned_at
            FROM xu_scan_history h
            LEFT JOIN biblio b ON b.biblio_id = h.biblio_id
            ORDER BY h.scan_id DESC
            LIMIT 12
        ")->getResult();

        $content = [
            'stats' => [
                'total_docs'     => $totalDocs,
                'total_scanned'  => $totalScanned,
                'avg_similarity' => $avgRow ? (float) $avgRow->avg_similarity : 0,
                'avg_ai'         => $avgRow ? (float) $avgRow->avg_ai : 0,
                'flag_similar'   => $flagSimilar,
                'flag_ai'        => $flagAi,
                'clean_docs'     => $cleanDocs,
                'watch_docs'     => $watchDocs,
                'danger_docs'    => $dangerDocs,
            ],
            'trend'      => $trend,
            'topSimilar' => $topSimilar,
            'topAi'      => $topAi,
            'pairs'      => $pairs,
            'recent'     => $recent,
        ];

        _render($view, $title, $content);
    }
}