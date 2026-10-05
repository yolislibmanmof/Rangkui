<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class FingerprintModel extends BaseModel
{
    protected $table         = 'xu_fingerprint';
    protected $primaryKey    = 'fingerprint_id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Simpan atau Update fingerprint (Upsert)
     */
    public function saveFingerprint($biblio_id, array $data)
    {
        $existing = $this->db->table('xu_fingerprint')->where('biblio_id', $biblio_id)->get()->getRow();

        if ($existing) {
            $data['last_scanned'] = date('Y-m-d H:i:s');
            $data['scan_count'] = (int)$existing->scan_count + 1;
            return $this->db->table('xu_fingerprint')->where('biblio_id', $biblio_id)->update($data);
        } else {
            $data['biblio_id'] = $biblio_id;
            $data['first_scanned'] = date('Y-m-d H:i:s');
            $data['last_scanned'] = date('Y-m-d H:i:s');
            $data['scan_count'] = 1;
            return $this->db->table('xu_fingerprint')->insert($data);
        }
    }

    /**
     * Ambil fingerprint dokumen
     */
    public function getByBiblio($biblio_id)
    {
        return $this->db->table('xu_fingerprint')->where('biblio_id', $biblio_id)->get()->getRow();
    }
}