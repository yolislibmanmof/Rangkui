<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class SubmissionModel extends BaseModel
{
    protected $table         = 'xu_submission';
    protected $primaryKey    = 'submission_id';
    protected $protectFields = false; // Agar bisa insert/update array penuh
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua submission dengan info biblio (join)
     */
    public function getAllWithDetails()
    {
        return $this->db->table('xu_submission s')
            ->select('s.*, b.title as biblio_title, s.student_name as mahasiswa_nama')
            ->join('biblio b', 'b.biblio_id = s.biblio_id', 'left')
            ->orderBy('s.created_at', 'DESC')
            ->get()->getResult();
    }

    /**
     * Ambil submission berdasarkan ID
     */
    public function getDetail($submission_id)
    {
        return $this->db->table('xu_submission s')
            ->select('s.*, b.title as biblio_title, b.notes as abstract, s.student_name as mahasiswa_nama')
            ->join('biblio b', 'b.biblio_id = s.biblio_id', 'left')
            ->where('s.submission_id', $submission_id)
            ->get()->getRow();
    }

    /**
     * Update status dan stage submission
     */
    public function updateProgress($submission_id, $current_stage, $status, $note = null)
    {
        $data = [
            'current_stage' => $current_stage,
            'status'        => $status,
            'updated_at'    => date('Y-m-d H:i:s')
        ];
        
        if ($note !== null) {
            $data['note'] = $note;
        }

        return $this->db->table('xu_submission')->where('submission_id', $submission_id)->update($data);
    }

    /**
     * ✅ FIXED: Cek duplikasi berdasarkan judul dan NIM di tabel BIBLIO
     * (Bukan di xu_submission, karena title & student_id ada di biblio)
     */
    public function isDuplicate(string $title, string $student_id, int $minutes = 5): bool
    {
        return $this->db->table('biblio')
            ->where('title', $title)
            ->where('student_id', $student_id)
            ->where('input_date >=', date('Y-m-d H:i:s', strtotime("-{$minutes} minutes")))
            ->countAllResults() > 0;
    }

    /**
     * ✅ Membuat record submission baru di tabel xu_submission
     */
    public function createSubmission(array $data): bool
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        return (bool) $this->insert($data);
    }
}