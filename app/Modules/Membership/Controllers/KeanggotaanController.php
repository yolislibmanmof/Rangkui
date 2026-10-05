<?php

namespace App\Modules\Membership\Controllers;

use App\Modules\Membership\Models\MembershipModel;
use App\Controllers\BaseController;

class KeanggotaanController extends BaseController
{
    public $viewPath = "Keanggotaan/";
    private $datetime;
    public $options = [];

    public function __construct()
    {
        $this->datetime = date('YmdHis');

        $this->options = [
            'cost' => 12,
        ];
    }

    /**
     * Daftar anggota aktif
     */
    public function index()
    {
        $db    = \Config\Database::connect();
        $view  = $this->viewPath . "v_index";
        $title = "Membership";

        $subquery = $db->table('mst_member_type')
            ->select('member_type_id, member_type_name')
            ->getCompiledSelect();

        $builder = $db->table('member as m');

        $builder->select('m.*, mt.member_type_name');
        
        // PERBAIKAN: Tambahkan 'left' agar anggota tetap muncul 
        // meskipun tipe keanggotaan belum ada di master
        $builder->join(
            "($subquery) as mt",
            'mt.member_type_id = m.member_type_id',
            'left' // <--- KUNCI PERBAIKAN
        );
        
        $builder->where('m.expire_date >=', date('Y-m-d'));

        $content['data'] = $builder->get()->getResult();

        _render($view, $title, $content);
    }

    /**
     * Form tambah anggota
     */
    public function add()
    {
        $membership = new MembershipModel();

        $view  = $this->viewPath . "v_add";
        $title = 'Membership';

        $content = [
            'mst_member_type' => $membership->getMstMemberType()
        ];

        $js = [
            'assets/custom/js/modules/membership/membership',
        ];

        _render($view, $title, $content, $js);
    }

    /**
     * Form edit anggota
     */
    public function edit()
    {
        $membership = new MembershipModel();
        $db         = \Config\Database::connect();

        $subquery = $db->table('mst_member_type')
            ->select('member_type_id, member_type_name')
            ->getCompiledSelect();

        $builder = $db->table('member as m');

        $view  = $this->viewPath . "v_edit";
        $title = 'Membership';

        $builder->select('m.*, mt.member_type_name');
        $builder->join(
            "($subquery) as mt",
            'mt.member_type_id = m.member_type_id'
            
        );
        $builder->where(
            'm.member_id',
            $this->input->getGet('mi')
        );

        $content['mst_data'] = $membership->getMstMemberType();
        $content['data']     = $builder->get()->getRow();

        if ($content['data']) {
            unset($content['data']->mpasswd);
        }

        $js = [
            'assets/custom/js/modules/membership/membership',
        ];

        _render($view, $title, $content, $js);
    }

    /**
     * Simpan anggota baru
     */
    public function save()
    {
        $post = $this->input->getPost();

        $member_id         = $post['member_id'] ?? '';
        $member_name       = $post['member_name'] ?? '';
        $birth_date        = $post['birth_date'] ?? null;
        $inst_name         = $post['inst_name'] ?? null;
        $member_since_date = $post['member_since_date'] ?? date('Y-m-d');
        $member_type_id    = $post['member_type_id'] ?? '';
        $register_date     = $post['register_date'] ?? date('Y-m-d');
        $pin               = $post['pin'] ?? '';
        $is_pending        = $post['is_pending'] ?? [];
        $expire_date       = $post['expire_date'] ?? null;
        $postal_code       = $post['postal_code'] ?? null;
        $gender            = $post['gender'] ?? 0;
        $member_address    = $post['member_address'] ?? null;
        $member_mail_address = $post['member_mail_address'] ?? null;
        $member_phone      = $post['member_phone'] ?? null;
        $member_fax        = $post['member_fax'] ?? null;
        $member_notes      = $post['member_notes'] ?? null;
        $mPasswd           = $post['mPasswd'] ?? '';
        $member_email      = $post['member_email'] ?? '';

        $currentDate = new \DateTime();
        $currentDate->modify('+1 year');

        $rules = [
            'member_name'    => 'required',
            'member_type_id' => 'required',
            'pin'            => 'required',
            'member_email'   => 'required|valid_email',
            'mPasswd'        => 'required',

            'member_image' => [
                'label' => 'Foto Anggota',
                'rules' => 'if_exist'
                    . '|is_image[member_image]'
                    . '|mime_in[member_image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[member_image,500]'
                    . '|max_dims[member_image,4000,4000]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'validation',
                    \Config\Services::validation()
                );
        }

        if (empty($expire_date)) {
            $expire_date = $currentDate->format('Y-m-d');
        }

        /*
         * Upload foto anggota
         */
        $user = 'var';

        $imageFile = $this->request->getFile('member_image');
        $image     = '';

        if (
            $imageFile &&
            $imageFile->isValid() &&
            !$imageFile->hasMoved()
        ) {
            $filename = $imageFile->getClientName();

            $configImage = $this->_configBerkas(
                $filename,
                $user
            );

            if (!is_dir($configImage['upload_path'])) {
                mkdir(
                    $configImage['upload_path'],
                    0755,
                    true
                );
            }

            $image = $configImage['file_name'];

            $imageFile->move(
                $configImage['upload_path'],
                $image
            );
        }

        /*
         * Enkripsi password
         */
        $encryptedPassword = password_hash(
            $mPasswd,
            PASSWORD_BCRYPT,
            $this->options
        );

        /*
         * Data anggota
         */
        $data = [
            'member_id'           => $member_id,
            'member_name'         => $member_name,
            'birth_date'          => $birth_date,
            'inst_name'           => $inst_name,
            'member_since_date'   => $member_since_date,
            'member_type_id'      => $member_type_id,
            'register_date'       => $register_date,
            'pin'                 => $pin,
            'is_pending'          => !empty($is_pending) ? 1 : 0,
            'expire_date'         => $expire_date,
            'postal_code'         => $postal_code,
            'gender'              => $gender,
            'member_address'      => $member_address,
            'member_mail_address' => $member_mail_address,
            'member_phone'        => $member_phone,
            'member_fax'          => $member_fax,
            'member_notes'        => $member_notes,
            'mpasswd'             => $encryptedPassword,
            'member_email'        => $member_email,
        ];

        if (!empty($image)) {
            $data['member_image'] = $image;
        }

        /*
         * Transaksi dikelola oleh Controller.
         */
        $db = \Config\Database::connect();

        $db->transBegin();

        try {
            $member = new MembershipModel();

            $insertResult = $member->insertMember($data);

            if (
                $insertResult === false ||
                $db->transStatus() === false
            ) {
                $db->transRollback();

                $errors = $member->errors();

                $errorMsg = !empty($errors)
                    ? implode(', ', $errors)
                    : ($db->error()['message'] ?? 'Unknown error');

                log_message(
                    'error',
                    'Insert member failed: ' . $errorMsg
                );

                slim_alert(
                    'Gagal Menambah Membership: ' . $errorMsg,
                    'error'
                );

                return redirect()
                    ->back()
                    ->withInput();
            }

            $db->transCommit();

            slim_alert(
                'Berhasil Menambah Membership',
                'success'
            );
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message(
                'error',
                'Insert member exception: ' . $e->getMessage()
            );

            slim_alert(
                'Gagal Menambah Membership: ' . $e->getMessage(),
                'error'
            );

            return redirect()
                ->back()
                ->withInput();
        }

        return redirect()->to('membership/');
    }

    /**
     * Update data anggota
     */
    public function update()
    {
        $post = $this->input->getPost();

        $original_member_id = $post['original_member_id'] ?? '';
        $member_id          = $post['member_id'] ?? '';
        $member_name        = $post['member_name'] ?? '';
        $birth_date         = $post['birth_date'] ?? null;
        $inst_name          = $post['inst_name'] ?? null;
        $member_since_date  = $post['member_since_date'] ?? null;
        $member_type_id     = $post['member_type_id'] ?? '';
        $register_date      = $post['register_date'] ?? null;
        $pin                = $post['pin'] ?? '';
        $expire_date        = $post['expire_date'] ?? null;
        $is_pending         = $post['is_pending'] ?? [];
        $postal_code        = $post['postal_code'] ?? null;
        $gender             = $post['gender'] ?? 0;
        $member_address     = $post['member_address'] ?? null;
        $member_mail_address = $post['member_mail_address'] ?? null;
        $member_phone       = $post['member_phone'] ?? null;
        $member_fax         = $post['member_fax'] ?? null;
        $member_notes       = $post['member_notes'] ?? null;
        $member_email       = $post['member_email'] ?? '';
        $mPasswd            = $post['mPasswd'] ?? '';

        $memberM = new MembershipModel();

        $member = $memberM->find($original_member_id);

        if (empty($member)) {
            slim_alert(
                'Anggota tidak ditemukan',
                'error'
            );

            return redirect()->to('/membership/');
        }

        $rules = [
            'member_name'    => 'required',
            'member_type_id' => 'required',
            'pin'            => 'required',
            'member_email'   => 'required|valid_email',

            'member_image' => [
                'label' => 'Foto Anggota',
                'rules' => 'if_exist'
                    . '|is_image[member_image]'
                    . '|mime_in[member_image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[member_image,500]'
                    . '|max_dims[member_image,4000,4000]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $data = [
            'member_id'           => $member_id,
            'member_name'         => $member_name,
            'birth_date'          => $birth_date,
            'inst_name'           => $inst_name,
            'member_since_date'   => $member_since_date,
            'member_type_id'      => $member_type_id,
            'register_date'       => $register_date,
            'pin'                 => $pin,
            'expire_date'         => $expire_date,
            'is_pending'          => !empty($is_pending) ? 1 : 0,
            'postal_code'         => $postal_code,
            'gender'              => $gender,
            'member_address'      => $member_address,
            'member_mail_address' => $member_mail_address,
            'member_phone'        => $member_phone,
            'member_fax'          => $member_fax,
            'member_notes'        => $member_notes,
            'member_email'        => $member_email,
        ];

        /*
         * Jika password diisi, update password.
         */
        if (!empty($mPasswd)) {
            $data['mpasswd'] = password_hash(
                $mPasswd,
                PASSWORD_BCRYPT,
                $this->options
            );
        }

        /*
         * Upload foto baru jika ada.
         */
        $imageFile = $this->request->getFile('member_image');

        if (
            $imageFile &&
            $imageFile->isValid() &&
            !$imageFile->hasMoved()
        ) {
            $filename = $imageFile->getClientName();

            $configImage = $this->_configBerkas(
                $filename,
                'var'
            );

            if (!is_dir($configImage['upload_path'])) {
                mkdir(
                    $configImage['upload_path'],
                    0755,
                    true
                );
            }

            $image = $configImage['file_name'];

            $imageFile->move(
                $configImage['upload_path'],
                $image
            );

            $data['member_image'] = $image;
        }

        /*
         * Update menggunakan transaksi.
         */
        $db = \Config\Database::connect();

        $db->transBegin();

        try {
            $memberM
                ->where('member_id', $original_member_id)
                ->set($data);

            $result = $memberM->update();

            if (
                $result === false ||
                $db->transStatus() === false
            ) {
                $db->transRollback();

                $errors = $memberM->errors();

                $errorMsg = !empty($errors)
                    ? implode(', ', $errors)
                    : 'Gagal memperbarui data anggota';

                log_message(
                    'error',
                    'Update member failed: ' . $errorMsg
                );

                slim_alert(
                    $errorMsg,
                    'error'
                );
            } else {
                $db->transCommit();

                slim_alert(
                    'Berhasil Mengubah Data Anggota',
                    'success'
                );
            }
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message(
                'error',
                'Update member exception: ' . $e->getMessage()
            );

            slim_alert(
                'Gagal Mengubah Data Anggota',
                'error'
            );
        }

        return redirect()->to('/membership/');
    }

    /**
     * Daftar anggota kadaluarsa
     */
    public function expMember()
    {
        $db    = \Config\Database::connect();
        $view  = $this->viewPath . "v_expMember";
        $title = "Anggota Kadaluarsa";

        $subquery = $db->table('mst_member_type')
            ->select('member_type_id, member_type_name')
            ->getCompiledSelect();

        $builder = $db->table('member as m');

        $builder->select('m.*, mt.member_type_name');
        $builder->join(
            "($subquery) as mt",
            'mt.member_type_id = m.member_type_id'
        );
        $builder->where(
            'm.expire_date <=',
            date('Y-m-d')
        );

        $content['data'] = $builder->get()->getResult();

        $js = [
            'assets/custom/js/modules/membership/membership',
        ];

        _render($view, $title, $content, $js);
    }

    /**
     * Perpanjang masa berlaku anggota
     */
    public function updateExp()
    {
        $post = $this->input->getPost();

        $member_id = $post['member_id'] ?? '';
        $exp_date  = $post['exp_date'] ?? '';

        $memberM = new MembershipModel();

        $member = $memberM->find($member_id);

        if (empty($member)) {
            slim_alert(
                'Anggota tidak ditemukan',
                'error'
            );

            return redirect()->to('membership/xmember');
        }

        $expirationDate = \DateTime::createFromFormat(
            'Y-m-d',
            $exp_date
        );

        if (
            !$expirationDate ||
            $expirationDate->format('Y-m-d') < date('Y-m-d')
        ) {
            slim_alert(
                'Tanggal tidak valid.',
                'error'
            );

            return redirect()
                ->to('membership/xmember')
                ->with('showModal', 'myModal');
        }

        $db = \Config\Database::connect();

        $db->transBegin();

        try {
            $data = [
                'expire_date' => $exp_date,
                'last_update' => date('Y-m-d H:i:s'),
            ];

            $memberM
                ->where('member_id', $member_id)
                ->set($data);

            $result = $memberM->update();

            if (
                $result === false ||
                $db->transStatus() === false
            ) {
                $db->transRollback();

                slim_alert(
                    'Gagal Mengubah Masa Berlaku Anggota',
                    'error'
                );
            } else {
                $db->transCommit();

                slim_alert(
                    'Berhasil Mengubah Masa Berlaku Anggota',
                    'success'
                );
            }
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message(
                'error',
                'Update expiration exception: ' . $e->getMessage()
            );

            slim_alert(
                'Gagal Mengubah Masa Berlaku Anggota',
                'error'
            );
        }

        return redirect()->to('membership/xmember');
    }

    /**
     * Hapus anggota
     */
    public function delete()
    {
        $member_id = $this->request->getPost('mi');

        $memberM = new MembershipModel();

        $member = $memberM->find($member_id);

        if (empty($member)) {
            slim_alert(
                'Anggota Tidak Ditemukan',
                'error'
            );

            return redirect()->to('membership/');
        }

        $db = \Config\Database::connect();

        $db->transBegin();

        try {
            $result = $memberM->delete($member_id);

            if (
                $result === false ||
                $db->transStatus() === false
            ) {
                $db->transRollback();

                slim_alert(
                    'Gagal Menghapus Anggota',
                    'error'
                );
            } else {
                $db->transCommit();

                slim_alert(
                    'Berhasil Menghapus Anggota',
                    'success'
                );
            }
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message(
                'error',
                'Delete member exception: ' . $e->getMessage()
            );

            slim_alert(
                'Gagal Menghapus Anggota',
                'error'
            );
        }

        return redirect()->to('membership/');
    }

    // ===== FITUR: Pendaftaran Anggota Online (sisi admin) =====
    public function online()
    {
        $db   = \Config\Database::connect();
        $view = $this->viewPath . "v_online";
        $title = "Pendaftaran Online";

        $online = function ($q) { return $q->where('member_category IS NOT NULL', null, false); };

        $content['pending']  = $online($db->table('member')->where('is_pending', 1))->orderBy('input_date', 'DESC')->get()->getResult();
        $content['approved'] = $online($db->table('member')->where('is_pending', 0))->orderBy('last_update', 'DESC')->limit(30)->get()->getResult();
        $content['rejected'] = $online($db->table('member')->where('is_pending', 2))->orderBy('last_update', 'DESC')->limit(30)->get()->getResult();
        $content['settings'] = $db->table('xu_reg_settings')->get()->getRow();

        _render($view, $title, $content);
    }

    public function approve()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getPost('member_id');
        $expire = new \DateTime();
        $expire->modify('+1 year');
        $db->table('member')->where('member_id', $id)->update([
            'is_pending'        => 0,
            'expire_date'       => $expire->format('Y-m-d'),
            'member_since_date' => date('Y-m-d'),
            'approval_note'     => 'Disetujui admin',
            'last_update'       => date('Y-m-d H:i:s'),
        ]);
        slim_alert('success', 'Pendaftaran disetujui — anggota kini AKTIF.');
        return redirect()->to('membership/online');
    }

    public function reject()
    {
        $db   = \Config\Database::connect();
        $id   = $this->request->getPost('member_id');
        $note = $this->request->getPost('note') ?? 'Ditolak oleh admin';
        $db->table('member')->where('member_id', $id)->update([
            'is_pending'  => 2,
            'approval_note' => $note,
            'last_update' => date('Y-m-d H:i:s'),
        ]);
        slim_alert('success', 'Pendaftaran ditolak.');
        return redirect()->to('membership/online');
    }

    public function regSettings()
    {
        $db = \Config\Database::connect();
        $view  = $this->viewPath . "v_reg_settings";
        $title = "Pengaturan Pendaftaran";
        $content['settings'] = $db->table('xu_reg_settings')->get()->getRow();
        _render($view, $title, $content);
    }

    public function regSettingsSave()
    {
        $db   = \Config\Database::connect();
        $post = $this->request->getPost();
        $db->table('xu_reg_settings')->where('id', 1)->update([
            'reg_open'        => isset($post['reg_open']) ? 1 : 0,
            'warna_mahasiswa' => $post['warna_mahasiswa'] ?? 'biru',
            'warna_dosen'     => $post['warna_dosen'] ?? 'merah',
            'warna_staff'     => $post['warna_staff'] ?? 'merah',
            'wa_template'     => $post['wa_template'] ?? '',
            'last_update'     => date('Y-m-d H:i:s'),
        ]);
        slim_alert('success', 'Pengaturan pendaftaran disimpan.');
        return redirect()->to('membership/reg-settings');
    }

    /**
     * Konfigurasi upload berkas/foto
     */
    private function _configBerkas(
        $file,
        $user,
        $ket = null,
        $i = null
    ) {
        $basePath = './uploads/images/persons/';

        /*
         * Pastikan folder utama tersedia.
         */
        if (!is_dir($basePath)) {
            mkdir(
                $basePath,
                0755,
                true
            );
        }

        /*
         * Folder berdasarkan user.
         */
        if (!is_dir($basePath . $user)) {
            mkdir(
                $basePath . $user,
                0755,
                true
            );
        }

        /*
         * Folder berdasarkan keterangan jika digunakan.
         */
        if (!is_null($ket)) {
            if (!is_dir($basePath . $ket)) {
                mkdir(
                    $basePath . $ket,
                    0755,
                    true
                );
            }
        }

        $index = '';

        if (!is_null($i) && $i > 0) {
            $index = $i;
        }

        $ext = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        if (!is_null($ket)) {
            $save =
                'member_' .
                $user .
                '_' .
                $ket .
                '-' .
                $this->datetime .
                $index .
                '.' .
                $ext;

            $uploadPath = $basePath . $ket;
        } else {
            $save =
                'member_' .
                $user .
                '-' .
                $this->datetime .
                $index .
                '.' .
                $ext;

            $uploadPath = $basePath;
        }

        return [
            'upload_path'   => $uploadPath,
            'allowed_types' => 'png|jpg|jpeg|webp',
            'file_name'     => $save,
            'max_size'      => 800,
        ];
    }
}