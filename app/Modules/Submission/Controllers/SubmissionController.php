<?php

namespace App\Modules\Submission\Controllers;

use App\Controllers\BaseController;
use App\Modules\Submission\Models\SubmissionModel;
use App\Modules\Bibliography\Models\BibliographyModel;

class SubmissionController extends BaseController
{
    protected $submissionModel;
    protected $biblioModel;

    public function __construct()
    {
        $this->submissionModel = new SubmissionModel();
        $this->biblioModel = new BibliographyModel();
    }

    /**
     * Halaman form unggah publik
     */
    public function index()
    {
        $view  = 'public_upload';
        $title = 'Unggah Karya Ilmiah';
        _renderView($view, $title, []);
    }

    /**
     * Halaman sukses setelah unggahan masuk antrian verifikasi
     */
    public function sukses()
    {
        $view  = 'success_public';
        $title = 'Unggahan Berhasil Dikirim';
        _renderView($view, $title, []);
    }

    /**
     * Proses penyimpanan unggahan
     */
    public function proses()
    {
        // Validasi input
        $rules = [
            'student_name' => 'required|min_length[3]',
            'student_id'   => 'required|min_length[5]',
            'departement'  => 'required',
            'title'        => 'required|min_length[10]',
            'year'         => 'required|integer',
            'notes'        => 'required|min_length[50]',
            'file_pdf'     => 'uploaded[file_pdf]|mime_in[file_pdf,application/pdf]|max_size[file_pdf,20480]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        
        // Cek duplikasi (Mencegah spam double-submit dalam 5 menit)
        if ($this->submissionModel->isDuplicate($postData['title'], $postData['student_id'])) {
            return redirect()->to('/unggah/sukses');
        }

        // Upload file
        $file_id = $this->uploadPDF($postData['title']);
        
        if (!$file_id) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal upload file PDF');
        }

        // Simpan biblio
        $biblio_id = $this->biblioModel->insertBiblio([
            'title'           => $postData['title'],
            'gmd_id'          => (int)($postData['gmd'] ?? 1),
            'student_id'      => $postData['student_id'],
            'cp_email'        => $postData['cp_email'] ?? null,
            'departement'     => $postData['departement'],
            'publisher_name'  => $postData['publisher'] ?? null,
            'publish_place'   => $postData['place'] ?? null,
            'publish_year'    => $postData['year'],
            'collation'       => $postData['collation'] ?? null,
            'language_id'     => $postData['language'] ?? 'id',
            'classification'  => $postData['class'] ?? null,
            'call_number'     => $postData['callNumber'] ?? null,
            'notes'           => $postData['notes'],
            'notes_en'        => $postData['notes_en'] ?? null,
            'authors_text'    => $postData['authors_text'] ?? null,
            'supervisors_text'=> $postData['supervisors_text'] ?? null,
            'examiners_text'  => $postData['examiners_text'] ?? null,
            'subjects_text'   => $postData['topics_text'] ?? null,
            'opac_hide'       => 1,
            'approval_status' => 'pending',
            'input_date'      => date('Y-m-d H:i:s'),
            'last_update'     => date('Y-m-d H:i:s'),
            'uid'             => $this->session->get('user_id') ?? 0,
        ]);

        if (!$biblio_id) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data');
        }

        // Link file ke biblio
        $this->biblioModel->insertBiblioFiles([
            'biblio_id'    => $biblio_id,
            'file_id'      => $file_id,
            'access_type'  => 'private',
            'access_limit' => 0
        ]);

        // Catat submission
        $this->submissionModel->createSubmission([
            'biblio_id'     => $biblio_id,
            'member_id'     => $this->session->get('member_id') ?? $postData['student_id'],
            'student_name'  => $postData['student_name'],
            'current_stage' => 'admin',
            'status'        => 'menunggu',
            'note'          => 'Menunggu verifikasi admin',
        ]);

        return redirect()->to('/unggah/sukses');
    }

    /**
     * Upload file PDF ke repository
     */
    private function uploadPDF($title)
    {
        $file = $this->request->getFile('file_pdf');
        
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return null;
        }

        $mimeType = $file->getMimeType();
        $fileName = 'ETD_' . uniqid() . '_' . time() . '.pdf';
        $uploadPath = FCPATH . 'uploads/repository/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $fileName);

        $fileData = [
            'file_title'  => $title,
            'file_desc'   => 'File Utama Unggahan',
            'file_name'   => $fileName,
            'file_dir'    => 'uploads/repository/',
            'mime_type'   => $mimeType,
            'uploader_id' => $this->session->get('user_id') ?? 0,
            'input_date'  => date('Y-m-d H:i:s'),
            'last_update' => date('Y-m-d H:i:s'),
        ];

        return $this->biblioModel->insertFiles($fileData);
    }

         /**
     * ✅ Hapus submission beserta semua data terkait (biblio, file fisik, relasi)
     */
    public function delete($submission_id = null)
    {
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Method tidak diizinkan');
        }

        $submission_id = (int) $submission_id;
        if ($submission_id <= 0) {
            return redirect()->back()->with('error', 'ID submission tidak valid');
        }

        // 1. Ambil data submission
        $db = \Config\Database::connect();
        $submission = $db->table('submission')
            ->where('submission_id', $submission_id)
            ->get()
            ->getRow();

        if (!$submission) {
            return redirect()->back()->with('error', 'Submission tidak ditemukan');
        }

        $biblio_id = (int) $submission->biblio_id;
        $student_name = $submission->student_name ?? 'Unknown';

        try {
            // 2. Hapus record submission terlebih dahulu
            $db->table('submission')->where('submission_id', $submission_id)->delete();

            // 3. Jika ada biblio terkait, hapus dengan cascade penuh
            if ($biblio_id > 0) {
                $biblio = $db->table('biblio')->where('biblio_id', $biblio_id)->get()->getRowArray();

                if ($biblio) {
                    // 3a. Hapus gambar cover (jika ada)
                    if (!empty($biblio['image'])) {
                        $coverPath = FCPATH . 'uploads/images/docs/' . $biblio['image'];
                        if (file_exists($coverPath)) {
                            @unlink($coverPath);
                        }
                    }

                    // 3b. Hapus semua file attachment dari disk
                    $attachments = $db->table('biblio_attachment')
                        ->where('biblio_id', $biblio_id)
                        ->get()
                        ->getResult();

                    foreach ($attachments as $att) {
                        $fileRow = $db->table('files')
                            ->where('file_id', $att->file_id)
                            ->get()
                            ->getRow();

                        if ($fileRow) {
                            // Hapus file fisik
                            $filePath = FCPATH . ltrim($fileRow->file_dir, '/') . '/' . $fileRow->file_name;
                            if (file_exists($filePath)) {
                                @unlink($filePath);
                            }
                            // Hapus record file
                            $db->table('files')->where('file_id', $att->file_id)->delete();
                        }
                        // Hapus relasi attachment
                        $db->table('biblio_attachment')
                            ->where('biblio_id', $biblio_id)
                            ->where('file_id', $att->file_id)
                            ->delete();
                    }

                    // 3c. Hapus relasi tabel pendukung
                    $relationTables = [
                        'biblio_author',
                        'biblio_contributor',
                        'biblio_supervisor',
                        'biblio_examiner',
                        'biblio_topic'
                    ];

                    foreach ($relationTables as $table) {
                        $db->table($table)->where('biblio_id', $biblio_id)->delete();
                    }

                    // 3d. Hapus record bibliografi utama
                    $db->table('biblio')->where('biblio_id', $biblio_id)->delete();

                    log_message('info', "Submission #{$submission_id} & Biblio #{$biblio_id} ({$student_name}) deleted successfully");
                }
            }

            return redirect()->back()->with('success', "Submission '{$student_name}' berhasil dihapus beserta seluruh datanya.");

        } catch (\Exception $e) {
            log_message('error', "Error deleting submission #{$submission_id}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus: ' . $e->getMessage());
        }
    }

    /**
     * ✅ Endpoint Ekstraksi Metadata AI (menggunakan model stabil gemini-3.5-flash-lite)
     */
    public function extract_ai()
    {
        $this->response->setContentType('application/json');

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan.'])->setStatusCode(405);
        }

        $file = $this->request->getFile('pdf_file');
        if (!$file || !$file->isValid() || $file->getError() !== 0) {
            return $this->response->setJSON(['ok' => false, 'error' => 'File PDF tidak valid.']);
        }

        $apiKey = trim(env('GEMINI_API_KEY', ''));
        if (empty($apiKey)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'GEMINI_API_KEY kosong di .env']);
        }

        try {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($file->getRealPath());
            $fullText = $pdf->getText();
            $textToAnalyze = substr($fullText, 0, 8000);

            if (strlen(trim($textToAnalyze)) < 50) {
                return $this->response->setJSON(['ok' => false, 'error' => 'PDF tidak berisi teks yang bisa dibaca.']);
            }

            $prompt = "Anda adalah asisten AI perpustakaan akademik. Analisis teks berikut dan ekstrak SEMUA informasi ke dalam JSON valid tanpa markdown.

Aturan:
- document_type_id: Skripsi/S1=43, Tesis/S2=48, Disertasi/S3=47, lain=1
- year: 4 digit
- notes: ABSTRAK LENGKAP (jangan dipotong)
- Pisahkan nama orang ke array

Format JSON:
{
    \"title\": \"Judul lengkap\",
    \"year\": \"2024\",
    \"document_type_id\": 47,
    \"notes\": \"ABSTRAK LENGKAP Indonesia\",
    \"notes_en\": \"Full abstract in English\",
    \"department\": \"Nama Prodi\",
    \"student_id\": \"NIM\",
    \"email\": \"email@domain.com\",
    \"authors\": [\"Nama Penulis 1\", \"Nama Penulis 2\"],
    \"supervisors\": [\"Pembimbing 1\"],
    \"examiners\": [\"Penguji 1\", \"Penguji 2\"],
    \"subjects\": [\"Subyek 1\", \"Subyek 2\"],
    \"publisher\": \"Penerbit\",
    \"place\": \"Kota\",
    \"language\": \"id\",
    \"collation\": \"102 hal\",
    \"classification\": \"370.193\",
    \"call_number\": \"370.193 IND p\"
}

Teks:
\"\"\"
{$textToAnalyze}
\"\"\"";

            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent?key=" . $apiKey;
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 90);
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => [
                    'temperature' => 0.1,
                    'response_mime_type' => 'application/json'
                ]
            ]));

            $response = curl_exec($ch);
            $curlError = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($curlError) {
                return $this->response->setJSON(['ok' => false, 'error' => 'cURL Error: ' . $curlError]);
            }

            if ($httpCode !== 200) {
                $apiError = json_decode($response, true);
                $errorMsg = $apiError['error']['message'] ?? 'Unknown Error (HTTP ' . $httpCode . ')';
                log_message('error', 'Gemini API Error (' . $httpCode . '): ' . $errorMsg);

                // Pesan ramah khusus untuk kuota habis
                if (stripos($errorMsg, 'quota') !== false) {
                    return $this->response->setJSON([
                        'ok' => false,
                        'error' => 'Kuota harian AI gratis telah mencapai batas (20 permintaan/hari). Silakan coba lagi besok, atau lengkapi metadata secara manual.'
                    ]);
                }

                return $this->response->setJSON(['ok' => false, 'error' => 'Gemini API Error: ' . $errorMsg]);
            }

            $geminiResult = json_decode($response, true);
            $aiText = $geminiResult['candidates'][0]['content']['parts'][0]['text'] ?? '';
            $aiText = preg_replace('/^```(?:json)?\s*|\s*```$/', '', trim($aiText));
            $extractedData = json_decode($aiText, true);

            if (!$extractedData || !isset($extractedData['title'])) {
                return $this->response->setJSON(['ok' => false, 'error' => 'AI gagal memformat data.']);
            }

            return $this->response->setJSON([
                'ok' => true,
                'data' => [
                    'title'           => trim($extractedData['title'] ?? ''),
                    'publish_year'    => trim($extractedData['year'] ?? date('Y')),
                    'gmd'             => (int)($extractedData['document_type_id'] ?? 1),
                    'notes'           => trim($extractedData['notes'] ?? ''),
                    'notes_en'        => trim($extractedData['notes_en'] ?? ''),
                    'department'      => trim($extractedData['department'] ?? ''),
                    'student_id'      => trim($extractedData['student_id'] ?? ''),
                    'email'           => trim($extractedData['email'] ?? ''),
                    'authors'         => $extractedData['authors'] ?? [],
                    'supervisors'     => $extractedData['supervisors'] ?? [],
                    'examiners'       => $extractedData['examiners'] ?? [],
                    'subjects'        => $extractedData['subjects'] ?? [],
                    'publisher'       => trim($extractedData['publisher'] ?? ''),
                    'place'           => trim($extractedData['place'] ?? ''),
                    'language'        => trim($extractedData['language'] ?? 'id'),
                    'collation'       => trim($extractedData['collation'] ?? ''),
                    'classification'  => trim($extractedData['classification'] ?? ''),
                    'call_number'     => trim($extractedData['call_number'] ?? '')
                ],
                'message' => 'Metadata berhasil diekstrak'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'AI Extraction Exception: ' . $e->getMessage());
            return $this->response->setJSON(['ok' => false, 'error' => 'Error: ' . $e->getMessage()]);
        }
    }
}