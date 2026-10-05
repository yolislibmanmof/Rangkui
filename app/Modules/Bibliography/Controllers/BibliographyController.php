<?php

namespace App\Modules\Bibliography\Controllers;

use App\Controllers\BaseController;
use App\Modules\Bibliography\Models\BibliographyModel;

class BibliographyController extends BaseController
{
    private $datetime;
    private $bibliopage = "biblio/";
    private $toolspage  = "tools/";

    private const ALLOWED_TABLES = [
        'language', 'item_type', 'gmd', 'publisher', 'place',
        'copyright', 'license', 'author', 'contributor',
        'supervisor', 'examiner', 'topic'
    ];

    public function __construct()
    {
        $this->datetime = date('YmdHis');
    }

    public function index()
    {
        $biblio = new BibliographyModel();
        $view   = $this->bibliopage . "v_index";
        $title  = "Bibliography";
        $js     = ['assets/custom/js/modules/bibliography/bibliography'];

        $content['data'] = $biblio->orderBy('biblio_id', 'DESC')->get()->getResult();
        _render($view, $title, $content, $js);
    }

    public function add()
    {
        $biblio = new BibliographyModel();
        $view   = $this->bibliopage . "v_add";
        $title  = "Bibliography";
        $js     = ['assets/custom/js/modules/bibliography/bibliography'];
        $css    = ['assets/custom/css/modules/bibliography/bibliography'];
        $content['mst_data'] = $biblio->getMstBio();
        _render($view, $title, $content, $js, $css);
    }

    public function save()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/bibliography/')->with('error', 'Method tidak diizinkan');
        }

        $validationRules = [
            'title'     => 'required|min_length[5]|max_length[500]',
            'gmd'       => 'required|numeric',
            'item_type' => 'required|numeric',
            'year'      => 'permit_empty|numeric|greater_than[1900]|less_than[2100]',
            'image'     => [
                'label' => 'Cover Image',
                'rules' => 'permit_empty|is_image[image]|max_size[image,500]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 500KB',
                    'mime_in'  => 'Hanya file JPG, PNG, WebP yang diperbolehkan'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData  = $this->request->getPost();
        $image     = '';
        $user      = $this->session->user_id;
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $configImage = $this->_configBerkas($imageFile->getName(), $user);
            if (!is_dir($configImage['upload_path'])) {
                mkdir($configImage['upload_path'], 0755, true);
            }
            $image = $configImage['file_name'];
            $imageFile->move($configImage['upload_path'], $image);
        } elseif ($imageFile && !$imageFile->isValid() && !empty($imageFile->getName())) {
            slim_alert('error', 'Gagal upload gambar: ' . $imageFile->getErrorString());
            return redirect()->back()->withInput();
        }

        $data = [
            'title'            => trim($postData['title'] ?? ''),
            'gmd_id'           => (int)($postData['gmd'] ?? 0),
            'item_type_id'     => (int)($postData['item_type'] ?? 0),
            'student_id'       => trim($postData['student_id'] ?? ''),
            'cp_email'         => filter_var($postData['cp_email'] ?? '', FILTER_VALIDATE_EMAIL) ?: null,
            'edition'          => trim($postData['edition'] ?? ''),
            'departement'      => trim($postData['departement'] ?? ''),
            'code_ministry'    => trim($postData['ministry'] ?? ''),
            'publisher_id'     => (int)($postData['publisher'] ?? 0) ?: null,
            'publish_year'     => (int)($postData['year'] ?? date('Y')),
            'collation'        => trim($postData['collation'] ?? ''),
            'call_number'      => trim($postData['callNumber'] ?? ''),
            'language_id'      => trim($postData['language'] ?? 'id'),
            'copyright_id'     => (int)($postData['copyright'] ?? 0) ?: null,
            'license_id'       => (int)($postData['license'] ?? 0),
            'publish_place_id' => (int)($postData['place'] ?? 0) ?: null,
            'classification'   => trim($postData['class'] ?? ''),
            'notes'            => trim($postData['notes'] ?? ''),
            'notes_en'         => trim($postData['notes_en'] ?? ''),
            'spec_detail_info' => trim($postData['specDetailInfo'] ?? ''),
            'image'            => $image,
            'url_crossref'     => filter_var($postData['urlcrossref'] ?? '', FILTER_VALIDATE_URL) ?: null,
            'opac_hide'        => 0,
            'promoted'         => 0,
            'frequency_id'     => 0,
            'input_date'       => date('Y-m-d H:i:s'),
            'last_update'      => date('Y-m-d H:i:s'),
            'uid'              => $this->session->user_id
        ];

        $biblio = new BibliographyModel();
        $lastId = $biblio->insertBiblio($data);

        if ($lastId == 0) {
            slim_alert('error', 'Gagal menyimpan dokumen.');
            return redirect()->to('/bibliography/');
        }

        $result = $biblio->insertBilioSub($lastId, $postData, FALSE);
        if ($result) {
            slim_alert('success', 'Dokumen berhasil ditambahkan.');
        } else {
            slim_alert('warning', 'Dokumen disimpan tapi ada masalah pada data tambahan.');
        }

        return redirect()->to('/bibliography/');
    }

    public function edit()
    {
        $biblio              = new BibliographyModel();
        $view                = $this->bibliopage . "v_edit";
        $title               = "Bibliography";
        $content['user_id']  = $this->session->user_id;
        $content['mst_data'] = $biblio->getMstBio();

        $bbi       = $this->request->getGet('bbi');
        $decrypted = slim_decrypt($bbi);
        log_message('info', 'Edit method - biblio_id: ' . $decrypted);

        $content['data'] = $biblio->getData($decrypted);

        if (empty($content['data'])) {
            log_message('warning', 'Edit method - Data kosong untuk biblio_id: ' . $decrypted);
        }

        $js  = ['assets/custom/js/modules/bibliography/bibliography'];
        $css = ['assets/custom/css/modules/bibliography/bibliography'];

        _render($view, $title, $content, $js, $css);
    }

    public function update()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/bibliography/')->with('error', 'Method tidak diizinkan');
        }

        $postData  = $this->request->getPost();
        $biblio_id = (int)($postData['biblio_id'] ?? 0);

        $biblio      = new BibliographyModel();
        $list_biblio = $biblio->find($biblio_id);

        if (empty($list_biblio)) {
            slim_alert('error', 'Dokumen tidak ditemukan.');
            return redirect()->to('/bibliography/');
        }

        $rules = [
            'image' => [
                'label' => 'Image File',
                'rules' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,500]|max_dims[image,4000,4000]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'            => trim($postData['title'] ?? ''),
            'gmd_id'           => (int)($postData['gmd'] ?? 0),
            'item_type_id'     => (int)($postData['item_type'] ?? 0),
            'student_id'       => trim($postData['student_id'] ?? ''),
            'cp_email'         => filter_var($postData['cp_email'] ?? '', FILTER_VALIDATE_EMAIL) ?: null,
            'edition'          => trim($postData['edition'] ?? ''),
            'departement'      => trim($postData['departement'] ?? ''),
            'code_ministry'    => trim($postData['ministry'] ?? ''),
            'publisher_id'     => (int)($postData['publisher'] ?? 0) ?: null,
            'publish_year'     => (int)($postData['year'] ?? date('Y')),
            'collation'        => trim($postData['collation'] ?? ''),
            'call_number'      => trim($postData['callNumber'] ?? ''),
            'language_id'      => trim($postData['language'] ?? 'id'),
            'copyright_id'     => (int)($postData['copyright'] ?? 0) ?: null,
            'license_id'       => (int)($postData['license'] ?? 0),
            'publish_place_id' => (int)($postData['place'] ?? 0) ?: null,
            'classification'   => trim($postData['class'] ?? ''),
            'notes'            => trim($postData['notes'] ?? ''),
            'notes_en'         => trim($postData['notes_en'] ?? ''),
            'spec_detail_info' => trim($postData['specDetailInfo'] ?? ''),
            'url_crossref'     => filter_var($postData['urlcrossref'] ?? '', FILTER_VALIDATE_URL) ?: null,
            'opac_hide'        => 0,
            'promoted'         => 0,
            'frequency_id'     => 0,
            'last_update'      => date('Y-m-d H:i:s')
        ];

        $user      = $this->session->user_id;
        $imageFile = $this->request->getFile('image');

        // Handle image upload
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $configImage = $this->_configBerkas($imageFile->getName(), $user);
            if (!is_dir($configImage['upload_path'])) {
                mkdir($configImage['upload_path'], 0755, true);
            }
            $image = $configImage['file_name'];
            $imageFile->move($configImage['upload_path'], $image);
            $data['image'] = $image;
        }

        // Handle attachments (new upload)
        if (isset($_FILES['attc_file']) && !empty($_FILES['attc_file']['name'][0] ?? null)) {
            $titles       = $postData['title_file'] ?? [];
            $urls         = $postData['url_file'] ?? [];
            $descriptions = $postData['desk_file'] ?? [];
            $aksesFiles   = $postData['akses_file'] ?? [];
            $aksesMembers = $postData['akses_member'] ?? [];

            $this->uploadattachment($user, $urls, $biblio_id, $_FILES['attc_file'], $aksesFiles, $aksesMembers, $titles, $descriptions);
        }

        // Handle updates to existing attachments
        if (isset($postData['edit_file_id']) && is_array($postData['edit_file_id'])) {
            foreach ($postData['edit_file_id'] as $index => $fileId) {
                $fileData = [
                    'file_title'  => $postData['edit_title_file'][$index] ?? '',
                    'file_desc'   => $postData['edit_desk_file'][$index] ?? '',
                    'file_url'    => $postData['edit_url_file'][$index] ?? '',
                    'last_update' => date('Y-m-d H:i:s')
                ];

                $biblioFileData = [
                    'access_type'  => $postData['edit_akses_file'][$index] ?? 'private',
                    'access_limit' => (int)($postData['edit_akses_member'][$index] ?? 0)
                ];

                // Insert if attachment relation doesn't exist
                $existingRecord = $this->db->table('biblio_attachment')
                    ->where('biblio_id', $biblio_id)
                    ->where('file_id', $fileId)
                    ->get()
                    ->getRowArray();

                if (!$existingRecord) {
                    $this->db->table('biblio_attachment')->insert([
                        'biblio_id'    => $biblio_id,
                        'file_id'      => $fileId,
                        'access_type'  => $biblioFileData['access_type'],
                        'access_limit' => $biblioFileData['access_limit']
                    ]);
                }

                // Handle file upload if new file provided
                if (isset($_FILES['edit_attc_file']['name'][$index]) && !empty($_FILES['edit_attc_file']['name'][$index])) {
                    $file = $this->request->getFile("edit_attc_file.$index");

                    if ($file && $file->isValid() && !$file->hasMoved()) {
                        $config   = $this->_configBerkas($file->getName(), $user . $biblio_id, 'attachment', 0);
                        $fileName = $config['file_name'];
                        $filePath = $config['upload_path'];

                        // ✅ AMBIL MIME TYPE SEBELUM MOVE (cegah finfo_file error)
                        $mimeType = $file->getClientMimeType();

                        if (!is_dir($filePath)) {
                            mkdir($filePath, 0755, true);
                        }
                        $file->move($filePath, $fileName);

                        $fileData['file_name'] = $fileName;
                        $fileData['file_dir']  = $filePath;
                        $fileData['mime_type'] = $mimeType;

                        log_message('info', "Edit attachment uploaded: {$fileName}");
                    }
                }

                // Update file and biblio attachment records
                $this->db->table('files')->where('file_id', $fileId)->update($fileData);
                $this->db->table('biblio_attachment')
                    ->where('biblio_id', $biblio_id)
                    ->where('file_id', $fileId)
                    ->update($biblioFileData);
            }
        }

        // ✅ SINGLE UPDATE (hapus double update sebelumnya)
        $hasil = $biblio->updateBiblio($biblio_id, $data);
        $biblio->insertBilioSub($biblio_id, $postData, TRUE);

        if ($hasil) {
            slim_alert('success', 'Dokumen berhasil diupdate.');
        } else {
            slim_alert('error', 'Gagal mengupdate dokumen.');
        }

        return redirect()->to('/bibliography/');
    }

    function uploadattachment($user, $url, $biblio_id, $fl, $aksesFiles = [], $aksesMembers = null, $title = [], $desk_file = null)
    {
        $files = $this->request->getFiles();

        if (!isset($files['attc_file']) || empty($files['attc_file'])) {
            log_message('info', 'uploadattachment: No attc_file found in request');
            return;
        }

        $files = $files['attc_file'];

        foreach ($files as $i => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $config   = $this->_configBerkas($file->getName(), $user . $biblio_id, 'attahcment', $i);
                $filenm   = $config['file_name'];
                $filepath = $config['upload_path'];

                if (!is_dir($filepath)) {
                    mkdir($filepath, 0755, true);
                }

                $file->move($filepath, $filenm);

                $data = [
                    "file_title"  => isset($title[$i]) ? $title[$i] : '-',
                    "file_desc"   => isset($desk_file[$i]) ? $desk_file[$i] : '-',
                    "file_name"   => $filenm,
                    "file_dir"    => $filepath,
                    "file_url"    => '',
                    "uploader_id" => $this->session->user_id,
                    "input_date"  => date('Y-m-d H:i:s'),
                    "last_update" => date('Y-m-d H:i:s'),
                ];

                $biblio     = new BibliographyModel();
                $lastIdFile = $biblio->insertFiles($data);

                $data_biblio = [
                    'biblio_id'    => $biblio_id,
                    'file_id'      => $lastIdFile,
                    'access_type'  => isset($aksesFiles[$i]) ? $aksesFiles[$i] : 'private',
                    'access_limit' => isset($aksesMembers[$i]) ? $aksesMembers[$i] : 0,
                ];

                $biblio->insertBiblioFiles($data_biblio);

                log_message('info', 'uploadattachment: File uploaded successfully - ' . $filenm);
            } else {
                $error = $file->getErrorString();
                log_message('error', 'uploadattachment: File upload error - ' . $error);
            }
        }
    }

    public function attachmentDelete($biblio_id = null, $fileId = null)
    {
        if (!$this->request->is('post') && $biblio_id === null && $fileId === null) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Method tidak diizinkan'
            ])->setStatusCode(405);
        }

        $fileId    = is_null($fileId) ? $this->request->getPost('f_id') : $fileId;
        $biblio_id = is_null($biblio_id) ? $this->request->getPost('b_id') : $biblio_id;

        if (!is_numeric($biblio_id) || !is_numeric($fileId) || (int)$biblio_id <= 0 || (int)$fileId <= 0) {
            log_message('warning', 'attachmentDelete: Invalid IDs - biblio_id=' . $biblio_id . ', file_id=' . $fileId);
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Parameter tidak valid'
            ])->setStatusCode(400);
        }

        $biblio_id = (int)$biblio_id;
        $fileId    = (int)$fileId;

        $biblio     = new BibliographyModel();
        $biblioData = $biblio->find($biblio_id);

        if (!$biblioData) {
            log_message('warning', 'attachmentDelete: Dokumen tidak ditemukan - biblio_id=' . $biblio_id);
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Dokumen tidak ditemukan'
            ])->setStatusCode(404);
        }

        $attachment = $this->db->table('biblio_attachment')
            ->where('biblio_id', $biblio_id)
            ->where('file_id', $fileId)
            ->get()
            ->getRow();

        if (!$attachment) {
            log_message('warning', 'attachmentDelete: Attachment tidak ada atau bukan milik dokumen ini');
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Attachment tidak ditemukan'
            ])->setStatusCode(404);
        }

        $loadModel = new BibliographyModel();
        $hasil     = $loadModel->attDelete($biblio_id, $fileId);

        if ($hasil === false) {
            log_message('error', 'attachmentDelete: Gagal menghapus attachment - biblio_id=' . $biblio_id . ', file_id=' . $fileId);
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal menghapus data'
            ])->setStatusCode(500);
        }

        log_message('info', "attachmentDelete: Sukses menghapus - biblio_id={$biblio_id}, file_id={$fileId}");

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Attachment berhasil dihapus'
        ])->setStatusCode(200);
    }

    /**
     * Backward compatibility wrapper untuk typo lama "atthacment"
     */
    public function atthacmentDelete($biblio_id = null, $fileId = null)
    {
        return $this->attachmentDelete($biblio_id, $fileId);
    }

    public function getAttachment()
    {
        $fileId   = $this->request->getPost('file_id');
        $biblioId = $this->request->getPost('biblio_id');

        if (!is_numeric($fileId) || !is_numeric($biblioId)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Parameter tidak valid'
            ])->setStatusCode(400);
        }

        $loadModel  = new BibliographyModel();
        $attachment = [];

        if (method_exists($loadModel, 'getAttachmentData')) {
            $attachment = $loadModel->getAttachmentData($biblioId, $fileId);
        } else {
            $sql = "SELECT f.*, ba.access_type, ba.access_limit
                    FROM files f
                    JOIN biblio_attachment ba ON f.file_id = ba.file_id
                    WHERE ba.biblio_id = ? AND f.file_id = ?";
            $query      = $this->db->query($sql, [$biblioId, $fileId]);
            $attachment = $query->getRowArray();
        }

        if ($attachment) {
            return $this->response->setJSON([
                'status' => 'success',
                'data'   => $attachment
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Attachment not found'
        ])->setStatusCode(404);
    }

    public function updateAttachment()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Method tidak diizinkan'
            ])->setStatusCode(405);
        }

        $postData = $this->request->getPost();
        $fileId   = $postData['file_id'] ?? null;
        $biblioId = $postData['biblio_id'] ?? null;

        if (!is_numeric($fileId) || !is_numeric($biblioId)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Parameter tidak valid'
            ])->setStatusCode(400);
        }

        $data = [
            'file_title'  => $postData['edit_title_file'] ?? '',
            'file_desc'   => $postData['edit_desk_file'] ?? '',
            'file_url'    => $postData['edit_url_file'] ?? '',
            'last_update' => date('Y-m-d H:i:s')
        ];

        $biblioData = [
            'access_type'  => $postData['edit_akses_file'] ?? 'private',
            'access_limit' => (int)($postData['edit_akses_member'] ?? 0)
        ];

        $user = $this->session->user_id;
        $file = $this->request->getFile('edit_attc_file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $config   = $this->_configBerkas($file->getName(), $user . $biblioId, 'attachment', 0);
            $fileName = $config['file_name'];
            $filePath = $config['upload_path'];

            // ✅ AMBIL MIME TYPE SEBELUM MOVE (cegah finfo_file error)
            $mimeType = $file->getClientMimeType();

            if (!is_dir($filePath)) {
                mkdir($filePath, 0755, true);
            }
            $file->move($filePath, $fileName);

            $data['file_name'] = $fileName;
            $data['file_dir']  = $filePath;
            $data['mime_type'] = $mimeType;
        }

        $updatedFile = $this->db->table('files')->where('file_id', $fileId)->update($data);
        $updatedBiblioFile = $this->db->table('biblio_attachment')
            ->where('biblio_id', $biblioId)
            ->where('file_id', $fileId)
            ->update($biblioData);

        if ($updatedFile || $updatedBiblioFile) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Attachment updated successfully'
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Failed to update attachment'
        ])->setStatusCode(500);
    }

    private function _configBerkas($file, $user, $ket = null, $i = null)
    {
        $index = 0;
        if (!is_null($i) && $i > 0) {
            $index = $i;
        }

        $config = [];
        $ext    = pathinfo($file, PATHINFO_EXTENSION);

        if (!is_null($ket)) {
            $path = 'uploads/repository';
            if (!is_dir('./' . $path)) {
                mkdir('./' . $path, 0755, TRUE);  // ✅ FIXED: 0777 → 0755 (lebih aman)
            }
            $save = 'B_' . $user . '_' . $ket . '-' . $this->datetime . '-' . $index . '.' . $ext;

            $config['allowed_types'] = 'pdf';
            $config['max_size']      = '51200';
            $config['upload_path']   = './' . $path;
        } else {
            $path = 'uploads/images/docs';
            if (!is_dir('./' . $path)) {
                mkdir('./' . $path, 0755, TRUE);  // ✅ FIXED: 0777 → 0755 (lebih aman)
            }
            $save = 'cover_' . $user . '-' . $this->datetime . '-' . $index . '.' . $ext;

            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']      = '500';
            $config['upload_path']   = './' . $path;
        }
        $config['file_name'] = $save;

        return $config;
    }

    public function delete()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Method tidak diizinkan'
            ])->setStatusCode(405);
        }

        $biblio_id   = (int)$this->request->getPost('id');
        $biblio      = new BibliographyModel();
        $list_biblio = $biblio->find($biblio_id);
        $response    = ['status' => 'error', 'message' => 'Record not found'];

        if (!empty($list_biblio)) {
            try {
                // Hapus gambar cover
                if (!empty($list_biblio['image'])) {
                    $hapusImage = delImage('images/docs', $list_biblio['image']);
                    if ($hapusImage == 0 || $hapusImage == '-1') {
                        // ✅ FIXED: Level info, bukan error (file fisik memang mungkin tidak ada)
                        log_message('info', 'File cover sudah tidak ada untuk biblio_id: ' . $biblio_id);
                    }
                }

                // Hapus semua attachment
                $sql   = "SELECT file_id FROM biblio_attachment WHERE biblio_id = ?";
                $hasil = $this->db->query($sql, [$biblio_id]);

                if ($hasil->getNumRows() > 0) {
                    foreach ($hasil->getResult() as $val) {
                        $this->attachmentDelete($biblio_id, $val->file_id);
                    }
                }

                // Hapus relasi di tabel pendukung
                $tables = [
                    'biblio_author',
                    'biblio_contributor',
                    'biblio_supervisor',
                    'biblio_examiner',
                    'biblio_topic',
                    'biblio_certificates'   // ✅ Sertifikat ikut dihapus
                ];

                foreach ($tables as $table) {
                    $this->db->table($table)->where(['biblio_id' => $biblio_id])->delete();
                }

                // Hapus record utama
                $deleted = $this->db->table('biblio')->where(['biblio_id' => $biblio_id])->delete();

                if ($deleted) {
                    log_message('info', "Biblio deleted successfully - biblio_id={$biblio_id}");
                    $response = ['status' => 'success', 'message' => 'Record deleted successfully', 'id' => $biblio_id];
                } else {
                    $response = ['status' => 'error', 'message' => 'Failed to delete main record'];
                }
            } catch (\Exception $e) {
                log_message('error', 'Error deleting biblio_id: ' . $biblio_id . ' - ' . $e->getMessage());
                $response = ['status' => 'error', 'message' => 'An error occurred while deleting the record'];
            }
        }

        return $this->response->setJSON($response);
    }

    public function addOptions()
    {
        $db     = \Config\Database::connect();
        $now    = date('Y-m-d');
        $name   = trim((string) $this->request->getPost('name'));
        $tbl    = $this->request->getPost('tbl');
        $optFor = ucwords(strtolower(str_replace('_', ' ', $tbl)));

        if (!in_array($tbl, self::ALLOWED_TABLES)) {
            return $this->response->setJSON([
                "status"  => "error",
                "message" => "Tabel tidak valid.",
                "data"    => '',
                "title"   => $optFor
            ]);
        }

        if ($name === '' || !preg_match('/^[\p{L}\p{N}.,\'\-() ]+$/u', $name)) {
            return $this->response->setJSON([
                "status"  => "warning",
                "message" => "Nama tidak boleh kosong atau tidak valid.",
                "data"    => '',
                "title"   => $optFor
            ]);
        }

        if ($tbl == 'language' || $tbl == 'item_type' || $tbl == 'gmd') {
            $idnya = $this->request->getPost('idnya');

            $query = $db->table("mst_{$tbl}")
                ->where("{$tbl}_id", $idnya)
                ->orWhere("{$tbl}_name", $name);

            if ($tbl == 'item_type' || $tbl == 'gmd') {
                $query->orWhere("{$tbl}_code", $name);
            }

            $existing = $query->get()->getRow();

            if (!$existing) {
                $data = [
                    "{$tbl}_name" => $name,
                    'input_date'  => $now,
                ];
                if ($tbl == 'item_type' || $tbl == 'gmd') {
                    $data["{$tbl}_code"] = $idnya;
                } else {
                    $data["{$tbl}_id"] = $idnya;
                }

                $db->table("mst_{$tbl}")->insert($data);
                $lastId  = ($tbl == 'language') ? $idnya : $db->insertID();
                $name    = ucwords(strtolower($name));
                $status  = "success";
                $message = "Berhasil tambah data {$name}.";
                $data    = ['id' => $lastId, 'val' => $name];
            } else {
                $idKey   = "{$tbl}_id";
                $status  = "success";
                $message = "Data {$name} sudah ada.";
                $data    = ['id' => $existing->$idKey ?? '', 'val' => $name];
            }
        } else {
            $col      = ($tbl === 'topic') ? 'topic' : "{$tbl}_name";
            $idKey    = "{$tbl}_id";
            $existing = $db->table("mst_{$tbl}")->where($col, $name)->get()->getRow();

            if ($existing) {
                $status  = "success";
                $message = "Data {$name} sudah ada.";
                $data    = ['id' => $existing->$idKey, 'val' => $name];
            } else {
                $db->table("mst_{$tbl}")->insert([
                    $col         => $name,
                    'input_date' => $now,
                ]);
                $lastId  = $db->insertID();
                $status  = "success";
                $message = "Berhasil tambah data {$name}.";
                $data    = ['id' => $lastId, 'val' => $name];
            }
        }

        return $this->response->setJSON([
            "status"  => $status,
            "message" => $message,
            "data"    => $data,
            "title"   => $optFor
        ]);
    }

    public function addMinistry()
    {
        $db         = \Config\Database::connect();
        $now        = date('Y-m-d');
        $idnya      = $this->request->getPost('codenya');
        $nama_prodi = $this->request->getPost('nama_prodi');
        $degree     = $this->request->getPost('degree');
        $university = $this->request->getPost('university');
        $tbl        = $this->request->getPost('tbl');
        $optFor     = ucwords(strtolower(str_replace('_', ' ', $tbl)));

        $existing = $db->table("mst_code_ministry")
            ->where("code_ministry", $idnya)
            ->where("name_prodi", $nama_prodi)
            ->get()
            ->getRow();

        if (!$existing) {
            $data = [
                "code_ministry" => $idnya,
                "name_prodi"    => $nama_prodi,
                "degree"        => $degree,
                "university"    => $university,
                'input_date'    => $now,
            ];

            $db->table("mst_code_ministry")->insert($data);
            $lastId  = $db->insertID();
            $name    = ucwords(strtolower($nama_prodi));
            $status  = "success";
            $message = "Berhasil tambah data id {$idnya} untuk Prodi {$nama_prodi}.";
            $title   = $optFor;
            $data    = ['id' => $lastId, 'val' => $idnya . ' - ' . $name];
        } else {
            $status  = 'warning';
            $message = "Data Sudah Ada.";
            $title   = $optFor;
            $data    = '';
        }

        return $this->response->setJSON([
            "status"  => $status,
            "message" => $message,
            "data"    => $data,
            "title"   => $title
        ]);
    }

    public function extract_ai()
    {
        $this->response->setContentType('application/json');

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan.'])->setStatusCode(405);
        }

        $file = $this->request->getFile('pdf_file');
        if (!$file || !$file->isValid() || $file->getError() !== 0) {
            return $this->response->setJSON(['ok' => false, 'error' => 'File PDF tidak valid atau tidak ditemukan.']);
        }

        $apiKey = trim(env('GEMINI_API_KEY', ''));
        if (empty($apiKey)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'GEMINI_API_KEY kosong di file .env']);
        }

        try {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($file->getRealPath());
            $fullText = $pdf->getText();
// ✅ Diperbesar ke 12000 karakter agar abstrak di halaman 4-5 ikut terbaca
$textToAnalyze = substr($fullText, 0, 12000);

            if (strlen(trim($textToAnalyze)) < 50) {
                return $this->response->setJSON(['ok' => false, 'error' => 'Gagal membaca teks dari PDF. Pastikan PDF berisi teks, bukan hasil scan gambar.']);
            }

            // ✅ PROMPT YANG LEBIH FOKUS PADA ABSTRAK
            $prompt = "Anda adalah asisten AI perpustakaan akademik yang sangat teliti. Analisis teks berikut dan ekstrak SEMUA informasi yang tersedia ke dalam format JSON yang valid.

PETUNJUK PENTING:
1. ABSTRAK biasanya ditandai dengan kata 'ABSTRAK', 'ABSTRACT', 'Ringkasan', atau paragraf panjang setelah judul
2. Abstrak biasanya 150-300 kata dan berisi: latar belakang, metode, hasil, dan kesimpulan
3. Jika menemukan teks panjang yang merupakan abstrak, SALIN SELURUHNYA tanpa dipotong

Aturan field:
- document_type_id: Skripsi/S1=43, Tesis/S2=48, Disertasi/S3=47
- authors: pisahkan dengan koma jika lebih dari satu
- year: harus 4 digit (2021, bukan 21)
- notes: ABSTRAK LENGKAP (wajib diisi jika ada)

Format JSON yang HARUS dikembalikan:
{
    \"title\": \"Judul lengkap (wajib)\",
    \"year\": \"Tahun 4 digit (wajib)\",
    \"document_type_id\": 47,
    \"notes\": \"ABSTRAK LENGKAP dalam bahasa Indonesia (wajib jika ada)\",
    \"department\": \"Nama departemen/prodi\",
    \"student_id\": \"NIM/NPM\",
    \"authors\": [\"Nama Penulis 1\", \"Nama Penulis 2\"],
    \"supervisors\": [\"Nama Pembimbing 1\"],
    \"subjects\": [\"Subyek 1\", \"Subyek 2\"],
    \"publisher\": \"Nama penerbit\",
    \"place\": \"Kota penerbitan\",
    \"language\": \"id atau en\",
    \"collation\": \"Jumlah halaman (contoh: 102 hal)\",
    \"classification\": \"Klasifikasi DDC\"
}

Teks Dokumen:
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
                return $this->response->setJSON(['ok' => false, 'error' => 'Gagal koneksi jaringan: ' . $curlError]);
            }

            // ✅ KEY MATI / KUOTA HABIS -> beralih ke ekstraksi lokal (heuristik)
            if (in_array($httpCode, [401, 403, 429])) {
                log_message('warning', 'extract_ai: API tidak tersedia (HTTP ' . $httpCode . '), beralih ke ekstraksi lokal.');
                $local = $this->localExtract($fullText);
                return $this->response->setJSON([
                    'ok'      => true,
                    'data'    => $local,
                    'warning' => 'AI Gemini tidak tersedia (HTTP ' . $httpCode . '). Form diisi oleh mesin ekstraksi lokal (heuristik). Ganti GEMINI_API_KEY untuk hasil AI penuh.'
                ]);
            }

            if ($httpCode !== 200) {
                $apiError = json_decode($response, true);
                $errorMsg = $apiError['error']['message'] ?? 'Unknown API Error (HTTP ' . $httpCode . ')';
                return $this->response->setJSON(['ok' => false, 'error' => 'Ditolak oleh Gemini API: ' . $errorMsg]);
            }

            $geminiResult = json_decode($response, true);
            $aiText = $geminiResult['candidates'][0]['content']['parts'][0]['text'] ?? '';
            
            // Pembersihan markdown
            $aiText = preg_replace('/^```(?:json)?\s*|\s*```$/', '', trim($aiText));
            $extractedData = json_decode($aiText, true);

            if (!$extractedData || !isset($extractedData['title'])) {
                log_message('error', 'AI Extraction Failed. Raw AI Text: ' . substr($aiText, 0, 500));
                return $this->response->setJSON(['ok' => false, 'error' => 'AI gagal memformat data. Cek log server untuk detail.']);
            }

            // ✅ KIRIM SEMUA DATA KE FRONTEND
            return $this->response->setJSON([
                'ok' => true,
                'data' => [
                    'title'        => trim($extractedData['title'] ?? ''),
                    'publish_year' => trim($extractedData['year'] ?? date('Y')),
                    'gmd'          => (int)($extractedData['document_type_id'] ?? 1),
                    'notes'        => trim($extractedData['notes'] ?? ''),
                    'department'   => trim($extractedData['department'] ?? ''),
                    'student_id'   => trim($extractedData['student_id'] ?? ''),
                    'authors'      => $extractedData['authors'] ?? [],
                    'supervisors'  => $extractedData['supervisors'] ?? [],
                    'subjects'     => $extractedData['subjects'] ?? [],
                    'publisher'    => trim($extractedData['publisher'] ?? ''),
                    'place'        => trim($extractedData['place'] ?? ''),
                    'language'     => trim($extractedData['language'] ?? 'id'),
                    'collation'    => trim($extractedData['collation'] ?? ''),
                    'classification' => trim($extractedData['classification'] ?? '')
                ],
                'message' => 'Metadata berhasil diekstrak oleh AI'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'AI Extraction Exception: ' . $e->getMessage());
            return $this->response->setJSON(['ok' => false, 'error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()]);
        }
    }

        /**
     * Auto-DDC Classification via Gemini AI
     */
    /**
     * Auto-DDC Classification via Gemini AI (dengan fallback lokal)
     */
    public function suggestDdc()
    {
        $this->response->setContentType('application/json');

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Method tidak diizinkan']);
        }

        $title      = (string) $this->request->getPost('title');
        $abstract   = (string) $this->request->getPost('abstract');
        $department = (string) $this->request->getPost('department');

        if (!$title && !$abstract) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Judul/abstrak diperlukan']);
        }

        $apiKey     = trim(env('GEMINI_API_KEY', ''));
        $localDdc   = $this->localDdcGuess($title . ' ' . $abstract . ' ' . $department);

        // Jika API key kosong, langsung pakai klasifikasi lokal
        if (empty($apiKey)) {
            return $this->response->setJSON([
                'ok'      => true,
                'data'    => $localDdc,
                'source'  => 'local',
                'warning' => 'GEMINI_API_KEY tidak ditemukan. Menggunakan klasifikasi lokal.'
            ]);
        }

        $prompt = "Anda adalah ahli klasifikasi perpustakaan Dewey Decimal Classification (DDC).
Berdasarkan informasi berikut, tentukan nomor klasifikasi DDC yang paling tepat.

Judul: {$title}
Abstrak: " . mb_substr($abstract, 0, 2000) . "
Departemen: {$department}

Format JSON (tanpa markdown):
{
    \"primary\": \"Nomor DDC utama (contoh: 370.193)\",
    \"primary_label\": \"Deskripsi singkat\",
    \"alternatives\": [
        {\"code\": \"153.8\", \"label\": \"Deskripsi alternatif\"}
    ],
    \"explanation\": \"Penjelasan singkat alasan klasifikasi\"
}";

        // ===== LAPIS 1: COBA BERBAGAI MODEL (anti kuota habis / model mati) =====
        $models    = ['gemini-3.5-flash-lite', 'gemini-3.8-flash', 'gemini-flash-latest'];
        $lastError = '';

        foreach ($models as $model) {
            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=" . $apiKey;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 45);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => ['temperature' => 0.1]
            ]));

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode === 200) {
                $result = json_decode($response, true);
                $aiText = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';
                $aiText = preg_replace('/^```(?:json)?\s*|\s*```$/', '', trim($aiText));
                $data   = json_decode($aiText, true);

                if ($data && !empty($data['primary'])) {
                    return $this->response->setJSON(['ok' => true, 'data' => $data, 'source' => $model]);
                }
                $lastError = 'Respons AI tidak valid';
                continue;
            }

            $apiError  = json_decode($response, true);
            $lastError = 'HTTP ' . $httpCode . ': ' . ($apiError['error']['message'] ?? 'unknown');
            log_message('error', 'suggestDdc model ' . $model . ' gagal: ' . $lastError);

            // ✅ Key mati = semua model pasti gagal, langsung ke fallback lokal
            if ($httpCode === 401 || $httpCode === 403) {
                $lastError = 'API Key tidak valid/dicabut (HTTP ' . $httpCode . ')';
                break;
            }
        }

        // ===== LAPIS 2: SEMUA MODEL GAGAL -> FALLBACK LOKAL =====
        return $this->response->setJSON([
            'ok'      => true,
            'data'    => $localDdc,
            'source'  => 'local',
            'warning' => 'AI tidak tersedia (' . $lastError . '). Menggunakan klasifikasi lokal berbasis kata kunci.'
        ]);
    }

    /**
     * FALLBACK LOKAL: Ekstraksi metadata tanpa AI (heuristik teks PDF)
     */
    private function localExtract($fullText)
    {
        // Rapikan baris
        $lines = preg_split('/\r\n|\r|\n/', $fullText);
        $clean = [];
        foreach ($lines as $l) {
            $l = trim(preg_replace('/\s+/', ' ', $l));
            if ($l !== '') $clean[] = $l;
        }
        $textFlat = implode("\n", $clean);

        // --- JUDUL: baris terpanjang (biasanya kapital) di 15 baris pertama ---
        $title = '';
        $best  = 0;
        foreach (array_slice($clean, 0, 15) as $l) {
            $len   = mb_strlen($l);
            $bonus = (mb_strtoupper($l) === $l) ? 1.2 : 1; // judul biasanya KAPITAL
            $score = $len * $bonus;
            if ($len >= 20 && $len <= 300 && $score > $best) {
                $best  = $score;
                $title = $l;
            }
        }

        // --- ABSTRAK: teks di antara 'ABSTRAK' dan 'Kata Kunci'/'ABSTRACT' ---
        $notes = '';
        if (preg_match('/ABSTRAK\s*(.{200,3000}?)(KATA\s*KUNCI|Kata\s*Kunci|ABSTRACT)/s', $textFlat, $m)) {
            $notes = trim(preg_replace('/\s+/', ' ', $m[1]));
        } elseif (preg_match('/ABSTRAK\s*(.{200,3000})/s', $textFlat, $m)) {
            $notes = trim(preg_replace('/\s+/', ' ', $m[1]));
        }

        // --- TAHUN: angka 4 digit pertama ---
        $year = '';
        if (preg_match('/\b(19|20)\d{2}\b/', $textFlat, $m)) $year = $m[0];

        // --- NIM: deret 8-20 digit ---
        $studentId = '';
        if (preg_match('/\b\d{8,20}\b/', $textFlat, $m)) $studentId = $m[0];

        // --- DEPARTEMEN: baris berisi 'Program Studi' / 'Jurusan' / 'Fakultas' ---
        $department = '';
        foreach ($clean as $l) {
            if (preg_match('/(program\s*studi|jurusan|departemen|fakultas)/i', $l) && mb_strlen($l) < 120) {
                $department = $l;
                break;
            }
        }

        // --- JENIS KARYA (GMD) ---
        $gmd = 1;
        if (stripos($textFlat, 'disertasi') !== false)      $gmd = 47;
        elseif (stripos($textFlat, 'tesis') !== false)      $gmd = 48;
        elseif (stripos($textFlat, 'skripsi') !== false)    $gmd = 43;

        return [
            'title'          => $title,
            'publish_year'   => $year,
            'gmd'            => $gmd,
            'notes'          => $notes,
            'department'     => $department,
            'student_id'     => $studentId,
            'authors'        => [],
            'supervisors'    => [],
            'subjects'       => [],
            'publisher'      => '',
            'place'          => '',
            'language'       => 'id',
            'collation'      => '',
            'classification' => ''
        ];
    }

    /**
     * Klasifikasi DDC lokal berbasis kata kunci (bekerja tanpa internet/API)
     */
    private function localDdcGuess($text)
    {
        $t = mb_strtolower($text);

        $map = [
            ['658', 'Manajemen & Bisnis',            ['manajemen', 'bisnis', 'pemasaran', 'kepemimpinan', 'karyawan', 'sumber daya manusia', 'organisasi']],
            ['370', 'Pendidikan',                    ['pendidikan', 'pembelajaran', 'siswa', 'guru', 'kurikulum', 'sekolah', 'akademik']],
            ['340', 'Hukum',                         ['hukum', 'undang', 'peraturan', 'pidana', 'perdata', 'keadilan']],
            ['610', 'Kedokteran & Kesehatan',        ['kesehatan', 'medis', 'pasien', 'klinis', 'penyakit', 'perawat']],
            ['004', 'Ilmu Komputer & Informatika',   ['informatika', 'komputer', 'sistem informasi', 'algoritma', 'aplikasi', 'website', 'machine learning', 'kecerdasan buatan']],
            ['150', 'Psikologi',                     ['psikologi', 'mental', 'perilaku', 'kepribadian', 'motivasi']],
            ['297', 'Islam & Studi Keislaman',       ['islam', 'quran', 'syariah', 'muslim', 'dakwah', 'pesantren']],
            ['330', 'Ekonomi & Keuangan',            ['ekonomi', 'keuangan', 'bank', 'inflasi', 'pasar']],
            ['710', 'Arsitektur & Perencanaan Kota', ['arsitektur', 'tata ruang', 'perkotaan', 'bangunan']],
            ['620', 'Teknik & Rekayasa',             ['teknik', 'rekayasa', 'mesin', 'sipil', 'elektro']],
        ];

        foreach ($map as $row) {
            foreach ($row[2] as $kw) {
                if (strpos($t, $kw) !== false) {
                    return [
                        'primary'       => $row[0],
                        'primary_label' => $row[1],
                        'alternatives'  => [],
                        'explanation'   => 'Klasifikasi lokal: terdeteksi kata kunci "' . $kw . '".'
                    ];
                }
            }
        }

        return [
            'primary'       => '000',
            'primary_label' => 'Umum / Knowledge',
            'alternatives'  => [],
            'explanation'   => 'Tidak ada kata kunci spesifik yang cocok; silakan klasifikasi manual.'
        ];
    }

    /**
     * ✅ Halaman Analytics - Statistik & Analitik Bibliografi
     */
    public function analytics()
    {
        $db = \Config\Database::connect();
        $an = [];
        
        // 1. Statistik Utama untuk Kartu Hero (View mengharapkan key ini)
        $an['total_doc']    = (int) $db->table('biblio')->countAllResults();
        $an['total_author'] = (int) $db->table('mst_author')->countAllResults();
        $an['total_file']   = (int) $db->table('files')->countAllResults();
        $an['total_topic']  = (int) $db->table('mst_topic')->countAllResults();
        $an['file_public']  = (int) $db->table('biblio_attachment')->where('access_type', 'public')->countAllResults();

        // ✅ PERBAIKAN: Gunakan MAX(input_date) untuk ORDER BY agar kompatibel dengan ONLY_FULL_GROUP_BY
        $monthlyRaw = $db->query("SELECT DATE_FORMAT(input_date, '%b %Y') as label, COUNT(*) as count FROM biblio GROUP BY label ORDER BY MAX(input_date) DESC LIMIT 12")->getResultArray();
        $an['monthly'] = array_reverse($monthlyRaw); // Agar grafik urut dari kiri (lama) ke kanan (baru)
        if (empty($an['monthly'])) {
            $an['monthly'] = [['label' => date('M Y'), 'count' => 0]];
        }
        
        // 3. Top Authors -> ARRAY of OBJECTS (View pakai $au->author_name dan $au->c)
        $an['authors'] = $db->query("SELECT a.author_name, COUNT(ba.biblio_id) as c FROM biblio_author ba JOIN mst_author a ON ba.author_id = a.author_id GROUP BY ba.author_id ORDER BY c DESC LIMIT 10")->getResult();
        
        // 4. Top Topics -> ARRAY of OBJECTS (View pakai $tp->topic dan $tp->c)
        $an['topics'] = $db->query("SELECT t.topic, COUNT(bt.biblio_id) as c FROM biblio_topic bt JOIN mst_topic t ON bt.topic_id = t.topic_id GROUP BY bt.topic_id ORDER BY c DESC LIMIT 10")->getResult();
        
        // 5. Top Prodi -> ARRAY of OBJECTS (View pakai $pr->name_prodi dan $pr->c)
        // Kita alias 'departement' menjadi 'name_prodi' agar cocok dengan View
        $an['prodi'] = $db->query("SELECT departement as name_prodi, COUNT(*) as c FROM biblio WHERE departement IS NOT NULL AND departement != '' GROUP BY departement ORDER BY c DESC LIMIT 10")->getResult();
        
        // 6. GMD Stats -> ARRAY of OBJECTS (View pakai $g->gmd_name dan $g->c)
        $an['gmd'] = $db->query("SELECT g.gmd_name, COUNT(b.biblio_id) as c FROM biblio b LEFT JOIN mst_gmd g ON b.gmd_id = g.gmd_id GROUP BY b.gmd_id, g.gmd_name ORDER BY c DESC")->getResult();

        $view = $this->bibliopage . "v_analytics";
        $title = "Analytics & Statistik";
        $js = ['assets/custom/js/modules/bibliography/analytics'];
        
        _render($view, $title, ['an' => $an], $js);
    }

    /**
     * ✅ Halaman Scanner - Scanner Kebersihan Data
     */
    public function scanner()
    {
        $db = \Config\Database::connect();
        $scan = [];
        
        // 1. Dokumen tanpa abstrak (Count)
        $scan['no_abstract'] = (int) $db->table('biblio')->where('notes IS NULL OR notes = ""')->countAllResults();
        
        // 2. Lampiran rusak / Relasi file hilang (Count)
        $scan['broken_files'] = (int) $db->query("SELECT COUNT(*) as c FROM biblio_attachment ba LEFT JOIN files f ON ba.file_id = f.file_id WHERE f.file_id IS NULL")->getRow()->c;
        
        // 3. Dokumen tanpa tahun terbit (Count)
        $scan['no_year'] = (int) $db->table('biblio')->where('publish_year IS NULL OR publish_year = 0 OR publish_year = ""')->countAllResults();
        
        // 4. Dokumen tanpa penulis (Count)
        $scan['no_author'] = (int) $db->query("SELECT COUNT(*) as c FROM biblio b LEFT JOIN biblio_author ba ON b.biblio_id = ba.biblio_id WHERE ba.biblio_id IS NULL")->getRow()->c;
        
        // 5. Dokumen tanpa subyek (Count)
        $scan['no_topic'] = (int) $db->query("SELECT COUNT(*) as c FROM biblio b LEFT JOIN biblio_topic bt ON b.biblio_id = bt.biblio_id WHERE bt.biblio_id IS NULL")->getRow()->c;
        
        // 6. Duplikasi judul -> ARRAY of ARRAYS (View pakai $d['score'], $d['a'], $d['ta'], $d['b'], $d['tb'])
        $scan['duplicates'] = $db->query("
            SELECT 
                b1.biblio_id AS a, 
                b1.title AS ta, 
                b2.biblio_id AS b, 
                b2.title AS tb,
                85 AS score
            FROM biblio b1
            JOIN biblio b2 ON b1.biblio_id < b2.biblio_id AND b1.title = b2.title
            LIMIT 50
        ")->getResultArray();

        $view = $this->bibliopage . "v_scanner";
        $title = "Scanner Kebersihan Data";
        $js = ['assets/custom/js/modules/bibliography/scanner'];
        
        _render($view, $title, ['scan' => $scan], $js);
    }
} 