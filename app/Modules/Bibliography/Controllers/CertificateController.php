<?php
namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;

class CertificateController extends BaseController
{
    /**
     * Halaman verifikasi publik sertifikat
     */
    public function verify($cert_no)
    {
        $db = \Config\Database::connect();
        $cert = $db->table('biblio_certificates')
            ->where('certificate_no', $cert_no)
            ->join('biblio', 'biblio.biblio_id = biblio_certificates.biblio_id')
            ->get()->getRow();

        if (!$cert) {
            _renderView('certificate_invalid', 'Sertifikat Tidak Valid', []);
            return;
        }

        // Update download counter (view saja)
        $db->table('biblio_certificates')
            ->where('cert_id', $cert->cert_id)
            ->set('download_count', 'download_count + 1', false)
            ->update();

        _renderView('certificate_verify', 'Verifikasi Sertifikat', ['cert' => $cert]);
    }

    /**
     * Download PDF sertifikat
     */
    public function download($biblio_id)
    {
        $db = \Config\Database::connect();
        $cert = $db->table('biblio_certificates')
            ->where('biblio_certificates.biblio_id', $biblio_id)
            ->join('biblio', 'biblio.biblio_id = biblio_certificates.biblio_id')
            ->get()->getRow();

        if (!$cert) {
            return redirect()->back()->with('error', 'Sertifikat tidak ditemukan');
        }

        // Hanya izinkan file sertifikat yang berada di direktori penyimpanan sertifikat.
        $relativePath = str_replace('\\\\', '/', ltrim((string) ($cert->pdf_path ?? ''), '/\\\\'));
        if ($relativePath !== '' && (!str_starts_with($relativePath, 'uploads/certificates/') || str_contains($relativePath, '..'))) {
            log_message('error', 'Path sertifikat tidak valid untuk cert_id ' . (int) $cert->cert_id);
            return redirect()->back()->with('error', 'Lokasi berkas sertifikat tidak valid.');
        }

        $fullPath = $relativePath !== '' ? FCPATH . $relativePath : '';
        $htmlPath = $fullPath !== '' ? preg_replace('/\\.pdf$/i', '.html', $fullPath) : '';

        if ($relativePath === '' || (!is_file($fullPath) && !is_file($htmlPath))) {
            $htmlPath = $this->generateCertificateHtml($cert);
            if (!is_string($htmlPath) || !is_file($htmlPath)) {
                log_message('error', 'Gagal membuat HTML sertifikat untuk cert_id ' . (int) $cert->cert_id);
                return redirect()->back()->with('error', 'Berkas sertifikat gagal dibuat.');
            }
        }

        $downloadPath = is_file($fullPath) ? $fullPath : $htmlPath;
        if (!is_file($downloadPath)) {
            return redirect()->back()->with('error', 'Berkas sertifikat tidak ditemukan.');
        }

        $extension = strtolower((string) pathinfo($downloadPath, PATHINFO_EXTENSION));
        $downloadName = (string) $cert->certificate_no . ($extension === 'pdf' ? '.pdf' : '.html');

        return $this->response->download($downloadPath, null)->setFileName($downloadName);
    }

    /**
     * Generate sertifikat saat dokumen di-approve
     */
    public function issueCertificate($biblio_id, $issued_by = null)
    {
        $db = \Config\Database::connect();

        // Cek apakah sertifikat sudah ada
        $existing = $db->table('biblio_certificates')
            ->where('biblio_id', $biblio_id)
            ->get()->getRow();

        if ($existing) {
            return $existing->cert_id;
        }

        // Sertifikat hanya boleh diterbitkan untuk dokumen yang sudah resmi terbit.
        $biblio = $db->table('biblio')->where('biblio_id', (int) $biblio_id)->get()->getRow();
        if (!$biblio || ($biblio->approval_status ?? '') !== 'published') {
            return null;
        }

        // Cari file PDF utama untuk hash (via relasi biblio_attachment)
        $file = $db->table('biblio_attachment')
            ->select('files.*')
            ->join('files', 'files.file_id = biblio_attachment.file_id')
            ->where('biblio_attachment.biblio_id', $biblio_id)
            ->where('files.file_name LIKE', '%.pdf')
            ->orderBy('files.file_id', 'DESC')
            ->get()->getRow();

        $hash = 'N/A';
        if ($file && !empty($file->file_name)) {
            $fileDir = trim($file->file_dir, '/');
            $fileName = trim($file->file_name, '/');
            $filePath = FCPATH . $fileDir . '/' . $fileName;

            if (file_exists($filePath)) {
                $hash = hash_file('sha256', $filePath);
            } else {
                log_message('warning', 'issueCertificate: File tidak ditemukan di ' . $filePath);
            }
        }

        // Generate nomor sertifikat
        $prefix = $this->getSetting('certificate_prefix', 'RKG');
        $year = date('Y');
        $seq = $db->table('biblio_certificates')->countAllResults() + 1;
        $cert_no = sprintf('%s-%s-%04d-%05d', $prefix, $year, $biblio_id, $seq);

        $data = [
            'biblio_id' => $biblio_id,
            'certificate_no' => $cert_no,
            'sha256_hash' => $hash,
            'issued_at' => date('Y-m-d H:i:s'),
            'issued_by' => $issued_by
        ];

        $db->table('biblio_certificates')->insert($data);
        return $db->insertID();
    }

    private function generateCertificateHtml($cert)
    {
        $html = $this->renderCertificateHtml($cert);
        $path = 'uploads/certificates/' . $cert->certificate_no . '.pdf';
        $fullPath = FCPATH . $path;

        if (!is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Simpan sebagai HTML (bisa di-upgrade ke PDF generator nanti)
        $htmlPath = str_replace('.pdf', '.html', $fullPath);
        file_put_contents($htmlPath, $html);

        // Update path di database
        $db = \Config\Database::connect();
        $db->table('biblio_certificates')
            ->where('cert_id', $cert->cert_id)
            ->update(['pdf_path' => $path]);

        return $htmlPath;
    }

    private function renderCertificateHtml($cert)
    {
        $repoName = esc('RANGKUI - Repositori Akademik Digital');
        $certificateNo = esc((string) ($cert->certificate_no ?? ''));
        $title = esc((string) ($cert->title ?? ''));
        $issuedAt = esc(date('d F Y H:i', strtotime((string) ($cert->issued_at ?? 'now'))));
        $hash = esc((string) ($cert->sha256_hash ?? ''));
        $verifyUrl = esc(base_url('sertifikat/' . rawurlencode((string) ($cert->certificate_no ?? ''))));

        return "<!DOCTYPE html><html lang=\"id\"><head><meta charset=\"utf-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><title>Sertifikat {$certificateNo}</title></head>
        <body style=\"font-family: Georgia, serif; padding: 40px; text-align: center;\">
            <h1 style=\"color:#059669;\">{$repoName}</h1>
            <h2>SERTIFIKAT DEPOSITO DIGITAL</h2>
            <p>No: <strong>{$certificateNo}</strong></p>
            <hr>
            <p>Dengan ini menyatakan bahwa karya ilmiah:</p>
            <h3 style=\"margin:20px 0;\">{$title}</h3>
            <p>Telah disetor secara resmi ke repositori pada:</p>
            <p><strong>{$issuedAt} WITA</strong></p>
            <hr>
            <p><strong>Hash SHA-256:</strong></p>
            <p style=\"font-family: monospace; font-size: 10px; word-break: break-all;\">{$hash}</p>
            <p style=\"margin-top:30px;\">Verifikasi: {$verifyUrl}</p>
        </body></html>";
    }

    private function getSetting($key, $default = null)
    {
        $db = \Config\Database::connect();
        $row = $db->table('system_settings')->where('setting_key', $key)->get()->getRow();
        return $row ? $row->setting_value : $default;
    }
}