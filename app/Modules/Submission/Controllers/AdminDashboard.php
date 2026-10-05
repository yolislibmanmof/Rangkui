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
        $db = \Config\Database::connect();
        
        // Update submission
        $db->table('xu_submission')->update([
            'status' => 'disetujui',
            'current_stage' => 'selesai',
            'note' => 'Disetujui oleh admin pada ' . date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ], ['submission_id' => $submission_id]);
        
        // Update biblio menjadi published
        $submission = $db->table('xu_submission')->where('submission_id', $submission_id)->get()->getRow();
        if ($submission) {
            $db->table('biblio')->update([
                'opac_hide' => 0,
                'approval_status' => 'published',
                'last_update' => date('Y-m-d H:i:s')
            ], ['biblio_id' => $submission->biblio_id]);
        }
        
        return redirect()->back()->with('success', 'Submission berhasil disetujui dan dipublikasikan.');
    }
    
    public function reject($submission_id)
    {
        $note = $this->request->getPost('note') ?? 'Ditolak oleh admin';
        
        $db = \Config\Database::connect();
        $db->table('xu_submission')->update([
            'status' => 'ditolak',
            'note' => $note,
            'updated_at' => date('Y-m-d H:i:s')
        ], ['submission_id' => $submission_id]);
        
        return redirect()->back()->with('info', 'Submission ditolak.');
    }
    
    public function requestRevisi($submission_id)
    {
        $note = $this->request->getPost('note') ?? 'Perlu revisi';
        
        $db = \Config\Database::connect();
        $db->table('xu_submission')->update([
            'status' => 'revisi',
            'note' => $note,
            'updated_at' => date('Y-m-d H:i:s')
        ], ['submission_id' => $submission_id]);
        
        return redirect()->back()->with('warning', 'Revisi diminta kepada mahasiswa.');
    }
}