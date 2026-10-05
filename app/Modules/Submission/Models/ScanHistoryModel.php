<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class ScanHistoryModel extends BaseModel
{
    protected $table         = 'xu_scan_history';
    protected $primaryKey    = 'scan_id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Catat hasil scan baru
     */
    public function logScan($biblio_id, $scan_type, $similarity_score, $ai_risk_score, $indicators_json)
    {
        return $this->db->table('xu_scan_history')->insert([
            'biblio_id'        => $biblio_id,
            'scan_type'        => $scan_type,
            'similarity_score' => $similarity_score,
            'ai_risk_score'    => $ai_risk_score,
            'indicators'       => $indicators_json,
            'scanned_at'       => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Ambil history scan untuk dokumen tertentu
     */
    public function getHistory($biblio_id)
    {
        return $this->db->table('xu_scan_history')
            ->where('biblio_id', $biblio_id)
            ->orderBy('scanned_at', 'DESC')
            ->get()->getResult();
    }
}