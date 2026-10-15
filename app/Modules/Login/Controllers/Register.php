<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Membership\Models\MembershipModel;

class Register extends BaseController
{
    private $options = ['cost' => 12];

    public function index()
    {
        $db = \Config\Database::connect();
        $settings = $db->table('xu_reg_settings')->get()->getRow();

        $view = "register";
        $title = "Pendaftaran Anggota";
        $content['settings'] = $settings;
        $content['types'] = $db->table('mst_member_type')->orderBy('member_type_id', 'ASC')->get()->getResult();
        $content['errors'] = session()->getFlashdata('errors') ?? [];
        $content['old'] = session()->getFlashdata('old') ?? [];

        _renderView($view, $title, $content, [], []);
    }

    // Validasi live: cek email / ID sudah terdaftar atau belum
    public function cek()
    {
        $field = $this->request->getGet('field');
        $value = trim((string) $this->request->getGet('value'));
        $db = \Config\Database::connect();
        $exists = false;

        if ($field === 'email' && $value !== '') {
            $exists = $db->table('member')->where('member_email', $value)->countAllResults() > 0;
        }
        if ($field === 'id' && $value !== '') {
            $exists = $db->table('member')->where('member_id', $value)->countAllResults() > 0;
        }

        return $this->response->setJSON(['exists' => $exists]);
    }

    public function save()
    {
        $post = $this->request->getPost();
        $db = \Config\Database::connect();

        // Cek pendaftaran dibuka
        $settings = $db->table('xu_reg_settings')->get()->getRow();
        if (!$settings || (int) $settings->reg_open === 0) {
            return redirect()->to('daftar')->with('errors', ['umum' => 'Pendaftaran sedang ditutup.']);
        }

        $rules = [
            'member_name'  => 'required',
            'member_id'    => 'required|is_unique[member.member_id]',
            'member_email' => 'required|valid_email|is_unique[member.member_email]',
            'member_phone' => 'required',
            'member_category' => 'required',
            'member_type_id'  => 'required|integer|is_not_unique[mst_member_type.member_type_id]',
            'mPasswd' => 'required|min_length[8]|max_length[72]',
            'member_image' => 'uploaded[member_image]|is_image[member_image]|mime_in[member_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[member_image,2048]|max_dims[member_image,4000,4000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('daftar')->with('errors', $this->validator->getErrors())->with('old', $post);
        }

        // Foto WAJIB
        $file = $this->request->getFile('member_image');
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return redirect()->to('daftar')->with('errors', ['member_image' => 'Foto wajib diunggah.'])->with('old', $post);
        }

        // Validasi MIME server dan gunakan ekstensi berdasarkan isi file, bukan nama dari browser.
        $mime = strtolower((string) $file->getMimeType());
        $allowedMimes = [
            'image/jpeg' => 'jpg',
            'image/jpg'  => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
        ];
        if (!isset($allowedMimes[$mime])) {
            return redirect()->to('daftar')
                ->with('errors', ['member_image' => 'Foto harus berupa JPG, PNG, atau WEBP.'])
                ->with('old', $post);
        }

        $fotoName = 'member_online_' . bin2hex(random_bytes(12)) . '.' . $allowedMimes[$mime];
        $path = FCPATH . 'uploads/images/persons' . DIRECTORY_SEPARATOR;
        if (!is_dir($path) && !mkdir($path, 0755, true) && !is_dir($path)) {
            log_message('error', 'Direktori upload pendaftaran anggota tidak dapat dibuat.');
            return redirect()->to('daftar')
                ->with('errors', ['member_image' => 'Folder penyimpanan foto tidak tersedia.'])
                ->with('old', $post);
        }

        try {
            $file->move($path, $fotoName);
        } catch (\\Throwable $e) {
            log_message('error', 'Gagal menyimpan foto pendaftaran anggota: ' . $e->getMessage());
            return redirect()->to('daftar')
                ->with('errors', ['member_image' => 'Foto gagal disimpan. Silakan coba lagi.'])
                ->with('old', $post);
        }

        // Masa berlaku 1 tahun
        $expire = new \DateTime();
        $expire->modify('+1 year');

        $data = [
            'member_id'        => $post['member_id'],
            'member_name'      => $post['member_name'],
            'member_email'     => $post['member_email'],
            'member_phone'     => $post['member_phone'],
            'member_category'  => $post['member_category'],
            'member_type_id'   => $post['member_type_id'],
            'inst_name'        => $post['inst_name'] ?? '',
            'gender'           => $post['gender'] ?? '',
            'member_address'   => $post['member_address'] ?? '',
            'register_date'    => date('Y-m-d'),
            'member_since_date'=> date('Y-m-d'),
            'expire_date'      => $expire->format('Y-m-d'),
            'is_pending'       => 1,
            'mpasswd'          => password_hash($post['mPasswd'], PASSWORD_BCRYPT, $this->options),
            'member_image'     => $fotoName,
            'pin'              => (string) random_int(100000, 999999),
        ];

        $member = new MembershipModel();
        $ok = $member->insertMember($data);

        if ($ok) {
            return redirect()->to('daftar/sukses');
        }

        // Jangan tinggalkan foto yatim bila penyimpanan data anggota gagal.
        $savedPhoto = $path . $fotoName;
        if (is_file($savedPhoto)) {
            @unlink($savedPhoto);
        }
        return redirect()->to('daftar')->with('errors', ['umum' => 'Gagal menyimpan pendaftaran. Coba lagi.'])->with('old', $post);
    }

    public function sukses()
    {
        $view = "register_sukses";
        $title = "Pendaftaran Terkirim";
        _renderView($view, $title, [], [], []);
    }
}