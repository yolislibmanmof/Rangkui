<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class ApprovalSettingModel extends BaseModel
{
    protected $table         = 'xu_approval_settings';
    protected $primaryKey    = 'id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil pengaturan approval
     */
    public function getSettings()
    {
        return $this->db->table('xu_approval_settings')->get()->getRow();
    }

    /**
     * Update pengaturan approval
     */
    public function updateSettings(array $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->table('xu_approval_settings')->where('id', 1)->update($data);
    }
}