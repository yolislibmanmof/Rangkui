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
            'member_type_id'  => 'required',
            'mPasswd' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('daftar')->with('errors', $this->validator->getErrors())->with('old', $post);
        }

        // Foto WAJIB
        $file = $this->request->getFile('member_image');
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return redirect()->to('daftar')->with('errors', ['member_image' => 'Foto wajib diunggah.'])->with('old', $post);
        }

        // Simpan foto
        $ext = $file->getClientExtension();
        $fotoName = 'member_online_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $path = './uploads/images/persons/';
        if (!is_dir($path)) mkdir($path, 0777, TRUE);
        $file->move($path, $fotoName);

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
            'pin'              => substr(md5(uniqid()), 0, 6),
        ];

        $member = new MembershipModel();
        $ok = $member->insertMember($data);

        if ($ok) {
            return redirect()->to('daftar/sukses');
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