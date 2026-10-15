<?php

namespace App\Modules\Submission\Controllers;

use App\Controllers\BaseController;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // Statistik
        $stats['total'] = (int) $db->table('xu_submission')->countAllResults();
        $stats['menunggu'] = (int) $db->table('xu_submission')->where('status', 'menunggu')->countAllResults();
        $stats['disetujui'] = (int) $db->table('xu_submission')->where('status', 'disetujui')->countAllResults();
        $stats['ditolak'] = (int) $db->table('xu_submission')->where('status', 'ditolak')->countAllResults();
        $stats['revisi'] = (int) $db->table('xu_submission')->where('status', 'revisi')->countAllResults();
        
        // Submission dengan detail biblio - PERBAIKAN: Hapus m.institution atau gunakan COALESCE
        $sql = "SELECT 
                    s.*,
                    b.title,
                    b.approval_status,
                    b.input_date as biblio_date,
                    COALESCE(m.member_name, 'Non-member') as mahasiswa_nama
                FROM xu_submission s
                LEFT JOIN biblio b ON b.biblio_id = s.biblio_id
                LEFT JOIN member m ON m.member_id = s.member_id
                ORDER BY s.created_at DESC";
        
        $submissions = $db->query($sql)->getResult();
        
        $view = 'v_admin_dashboard';
        $title = 'Dashboard Persetujuan Submission';
        $content['stats'] = $stats;
        $content['submissions'] = $submissions;
        
        _render($view, $title, $content);
    }
    
    public function approve($submission_id)
    {
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Metode permintaan tidak diizinkan.');
        }

        $submission_id = (int) $submission_id;
        if ($submission_id <= 0) {
            return redirect()->back()->with('error', 'ID submission tidak valid.');
        }

        $db = \Config\Database::connect();
        $submission = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();

        if (!$submission) {
            return redirect()->back()->with('error', 'Submission tidak ditemukan.');
        }
        if (($submission->status ?? '') !== 'menunggu' || ($submission->current_stage ?? '') !== 'admin') {
            return redirect()->back()->with('error', 'Submission tidak berada pada tahap persetujuan admin.');
        }

        $biblio = $db->table('biblio')->where('biblio_id', (int) $submission->biblio_id)->get()->getRow();
        if (!$biblio) {
            return redirect()->back()->with('error', 'Data bibliografi terkait tidak ditemukan.');
        }

        $db->transBegin();
        try {
            $db->table('xu_submission')->where('submission_id', $submission_id)->update([
                'status' => 'disetujui',
                'current_stage' => 'selesai',
                'note' => 'Disetujui oleh admin pada ' . date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $db->table('biblio')->where('biblio_id', (int) $submission->biblio_id)->update([
                'opac_hide' => 0,
                'approval_status' => 'published',
                'last_update' => date('Y-m-d H:i:s')
            ]);

            if ($db->transStatus() === false) {
                $db->transRollback();
                return redirect()->back()->with('error', 'Submission gagal diperbarui.');
            }
            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', 'Approval submission #' . $submission_id . ' gagal: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyetujui submission.');
        }

        return redirect()->back()->with('success', 'Submission berhasil disetujui dan dipublikasikan.');
    }
    
    public function reject($submission_id)
    {
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Metode permintaan tidak diizinkan.');
        }

        $submission_id = (int) $submission_id;
        $note = trim((string) ($this->request->getPost('note') ?? 'Ditolak oleh admin'));
        if (mb_strlen($note) > 2000) {
            return redirect()->back()->with('error', 'Catatan penolakan terlalu panjang.');
        }

        $db = \Config\Database::connect();
        $submission = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();
        if (!$submission || ($submission->status ?? '') !== 'menunggu' || ($submission->current_stage ?? '') !== 'admin') {
            return redirect()->back()->with('error', 'Submission tidak ditemukan atau tidak berada pada tahap admin.');
        }

        $db->transBegin();
        $db->table('xu_submission')->where('submission_id', $submission_id)->update([
            'status' => 'ditolak',
            'note' => $note,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $db->table('biblio')->where('biblio_id', (int) $submission->biblio_id)->update([
            'approval_status' => 'draft',
            'opac_hide' => 1,
            'last_update' => date('Y-m-d H:i:s')
        ]);

        if ($db->transStatus() === false) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Submission gagal ditolak.');
        }
        $db->transCommit();

        return redirect()->back()->with('info', 'Submission ditolak.');
    }
    
    public function requestRevisi($submission_id)
    {
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Metode permintaan tidak diizinkan.');
        }

        $submission_id = (int) $submission_id;
        $note = trim((string) ($this->request->getPost('note') ?? 'Perlu revisi'));
        if ($note === '' || mb_strlen($note) > 2000) {
            return redirect()->back()->with('error', 'Catatan revisi wajib diisi dan maksimal 2.000 karakter.');
        }

        $db = \Config\Database::connect();
        $submission = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();
        if (!$submission || ($submission->status ?? '') !== 'menunggu' || ($submission->current_stage ?? '') !== 'admin') {
            return redirect()->back()->with('error', 'Submission tidak ditemukan atau tidak berada pada tahap admin.');
        }

        $db->transBegin();
        $db->table('xu_submission')->where('submission_id', $submission_id)->update([
            'status' => 'revisi',
            'note' => $note,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($db->transStatus() === false) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Permintaan revisi gagal disimpan.');
        }
        $db->transCommit();

        return redirect()->back()->with('warning', 'Revisi diminta kepada mahasiswa.');
    }

    /**
     * ✅ Hapus submission beserta semua data terkait (biblio, file fisik, relasi)
     */
    public function delete($submission_id = null)
    {
        // Hanya terima request POST (keamanan)
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Method tidak diizinkan. Gunakan tombol Hapus di dashboard.');
        }

        $submission_id = (int) $submission_id;
        if ($submission_id <= 0) {
            return redirect()->back()->with('error', 'ID submission tidak valid.');
        }

        $db = \Config\Database::connect();
        
        // 1. Ambil data submission dari tabel xu_submission
        $submission = $db->table('xu_submission')
            ->where('submission_id', $submission_id)
            ->get()
            ->getRow();

        if (!$submission) {
            return redirect()->back()->with('error', 'Submission tidak ditemukan.');
        }

        $biblio_id = (int) $submission->biblio_id;
        $student_name = $submission->student_name ?? 'Unknown';

        try {
            // 2. Hapus record submission terlebih dahulu
            $db->table('xu_submission')->where('submission_id', $submission_id)->delete();

            // 3. Jika ada biblio terkait, hapus dengan cascade penuh
            if ($biblio_id > 0) {
                $biblio = $db->table('biblio')->where('biblio_id', $biblio_id)->get()->getRowArray();

                if ($biblio) {
                    // 3a. Hapus gambar cover (jika ada)
                    if (!empty($biblio['image'])) {
                        $coverPath = FCPATH . 'uploads/images/docs/' . $biblio['image'];
                        if (file_exists($coverPath)) {
                            @unlink($coverPath);
                            log_message('info', "Cover deleted: " . $biblio['image']);
                        }
                    }

                    // 3b. Hapus semua file attachment dari disk & database
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
                                log_message('info', "File deleted: " . $fileRow->file_name);
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
                        'biblio_topic',
                        'biblio_certificates'   // ✅ Sertifikat ikut dihapus
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
}