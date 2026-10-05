<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class RegistrationSettingModel extends BaseModel
{
    protected $table         = 'xu_reg_settings';
    protected $primaryKey    = 'id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua pengaturan registrasi
     */
    public function getSettings()
    {
        return $this->db->table('xu_reg_settings')->get()->getRow();
    }

    /**
     * Update pengaturan registrasi
     */
    public function updateSettings(array $data)
    {
        $data['last_update'] = date('Y-m-d H:i:s');
        return $this->db->table('xu_reg_settings')->where('id', 1)->update($data);
    }
}