<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class ApprovalStepModel extends BaseModel
{
    protected $table         = 'xu_approval_step';
    protected $primaryKey    = 'step_id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua step untuk submission tertentu (diurutkan)
     */
    public function getStepsBySubmission($submission_id)
    {
        return $this->db->table('xu_approval_step')
            ->where('submission_id', $submission_id)
            ->orderBy('stage_order', 'ASC')
            ->get()->getResult();
    }

    /**
     * Update status satu step (misal: dari 'pending' ke 'setuju')
     */
    public function updateStepStatus($step_id, $status, $note = '', $acted_at = null)
    {
        $data = [
            'status'     => $status,
            'note'       => $note,
            'acted_at'   => $acted_at ?? date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->table('xu_approval_step')->where('step_id', $step_id)->update($data);
    }

    /**
     * Cari step berdasarkan token unik (untuk link approval via email/WA)
     */
    public function getByToken($token)
    {
        return $this->db->table('xu_approval_step')
            ->where('token', $token)
            ->get()->getRow();
    }
}