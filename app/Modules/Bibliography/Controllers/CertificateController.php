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
            return view('Modules/Bibliography/Views/certificate_invalid');
        }

        // Update download counter (view saja)
        $db->table('biblio_certificates')
            ->where('cert_id', $cert->cert_id)
            ->set('download_count', 'download_count + 1', false)
            ->update();

        $data = [
            'cert' => $cert,
            'title' => 'Verifikasi Sertifikat Deposito Digital'
        ];

        return view('Modules/Bibliography/Views/certificate_verify', $data);
    }

    /**
     * Download PDF sertifikat
     */
    public function download($biblio_id)
    {
        $db = \Config\Database::connect();
        $cert = $db->table('biblio_certificates')
            ->where('biblio_id', $biblio_id)
            ->join('biblio', 'biblio.biblio_id = biblio_certificates.biblio_id')
            ->get()->getRow();

        if (!$cert) {
            return redirect()->back()->with('error', 'Sertifikat tidak ditemukan');
        }

        // Generate PDF jika belum ada
        if (!$cert->pdf_path || !file_exists(FCPATH . $cert->pdf_path)) {
            $pdfPath = $this->generateCertificatePdf($cert);
            if (!$pdfPath) {
                return redirect()->back()->with('error', 'Gagal generate PDF sertifikat');
            }
        }

        return $this->response->download(FCPATH . $cert->pdf_path, null);
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

        // Cari file PDF utama untuk hash
        $file = $db->table('biblio_files')
            ->where('biblio_id', $biblio_id)
            ->orderBy('file_id', 'DESC')
            ->get()->getRow();

        $hash = 'N/A';
        if ($file) {
            $filePath = FCPATH . ltrim($file->file_dir, '/') . '/' . $file->file_name;
            if (file_exists($filePath)) {
                $hash = hash_file('sha256', $filePath);
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

    private function generateCertificatePdf($cert)
    {
        // Menggunakan DomPDF atau TCPDF
        // Sederhana: generate HTML lalu convert
        $html = $this->renderCertificateHtml($cert);
        $path = 'uploads/certificates/' . $cert->certificate_no . '.pdf';
        $fullPath = FCPATH . $path;

        if (!is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Simpan sebagai HTML (bisa di-upgrade ke PDF generator)
        file_put_contents(str_replace('.pdf', '.html', $fullPath), $html);

        // Update path di database
        $db = \Config\Database::connect();
        $db->table('biblio_certificates')
            ->where('cert_id', $cert->cert_id)
            ->update(['pdf_path' => $path]);

        return $path;
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