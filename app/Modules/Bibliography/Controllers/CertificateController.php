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

        // Generate file HTML jika belum ada
        $fullPath = FCPATH . ltrim($cert->pdf_path, '/');
        $htmlPath = str_replace('.pdf', '.html', $fullPath);

        if (!$cert->pdf_path || (!file_exists($fullPath) && !file_exists($htmlPath))) {
            $this->generateCertificateHtml($cert);
        }

        // Download file HTML (karena PDF generator belum diinstall)
        $downloadPath = file_exists($fullPath) ? $fullPath : $htmlPath;
        $downloadName = $cert->certificate_no . '.html';

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

        // Ambil data biblio
        $biblio = $db->table('biblio')->where('biblio_id', $biblio_id)->get()->getRow();
        if (!$biblio) return null;

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
        $repoName = 'RANGKUI - Repositori Akademik Digital';
        return "<!DOCTYPE html><html><head><meta charset='utf-8'><title>Sertifikat {$cert->certificate_no}</title></head>
        <body style='font-family: Georgia, serif; padding: 40px; text-align: center;'>
            <h1 style='color:#059669;'>{$repoName}</h1>
            <h2>SERTIFIKAT DEPOSITO DIGITAL</h2>
            <p>No: <strong>{$cert->certificate_no}</strong></p>
            <hr>
            <p>Dengan ini menyatakan bahwa karya ilmiah:</p>
            <h3 style='margin:20px 0;'>{$cert->title}</h3>
            <p>Telah disetor secara resmi ke repositori pada:</p>
            <p><strong>" . date('d F Y H:i', strtotime($cert->issued_at)) . " WIB</strong></p>
            <hr>
            <p><strong>Hash SHA-256:</strong></p>
            <p style='font-family: monospace; font-size: 10px; word-break: break-all;'>{$cert->sha256_hash}</p>
            <p style='margin-top:30px;'>Verifikasi: " . base_url('sertifikat/' . $cert->certificate_no) . "</p>
        </body></html>";
    }

    private function getSetting($key, $default = null)
    {
        $db = \Config\Database::connect();
        $row = $db->table('system_settings')->where('setting_key', $key)->get()->getRow();
        return $row ? $row->setting_value : $default;
    }
}