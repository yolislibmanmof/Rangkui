<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;

class Anggota extends BaseController
{
    public function index()
    {
        if (session()->has('member_id')) {
            return redirect()->to('beranda/anggota')->with('msg', 'Anda sudah login sebagai anggota.');
        }
        $view = "anggota_login";
        $title = "Login Anggota";
        _renderView($view, $title, []);
    }

    public function auth()
    {
        $db  = \Config\Database::connect();
        $id  = trim((string) $this->request->getPost('member_id'));
        $pwd = (string) $this->request->getPost('mpasswd');

        if ($id === '' || $pwd === '') {
            return redirect()->to('anggota')->with('error', 'ID Anggota dan kata sandi wajib diisi.');
        }

        $m = $db->table('member')->where('member_id', $id)->get()->getRow();

        if (!$m) {
            return redirect()->to('anggota')->with('error', 'ID Anggota tidak ditemukan.');
        }

        if ((int) $m->is_pending !== 0) {
            return redirect()->to('anggota')->with('error', 'Akun Anda belum disetujui admin. Silakan tunggu verifikasi.');
        }

        if (strtotime($m->expire_date) < strtotime(date('Y-m-d'))) {
            return redirect()->to('anggota')->with('error', 'Keanggotaan Anda telah kedaluwarsa pada ' . $m->expire_date . '. Silakan hubungi perpustakaan.');
        }

        if (!password_verify($pwd, $m->mpasswd)) {
            return redirect()->to('anggota')->with('error', 'Kata sandi salah.');
        }

        // Login sukses — simpan session anggota
        session()->set('member_id', $m->member_id);
        session()->set('member_name', $m->member_name);
        session()->set('member_email', $m->member_email);
        session()->set('member_category', $m->member_category);

        return redirect()->to('/')->with('msg', 'Selamat datang, ' . $m->member_name . '!');
    }

    public function logout()
    {
        session()->remove(['member_id', 'member_name', 'member_email', 'member_category']);
        return redirect()->to('/')->with('msg', 'Anda telah keluar.');
    }

    public function profil()
    {
        if (!session()->has('member_id')) {
            return redirect()->to('anggota');
        }
        $db = \Config\Database::connect();
        $m = $db->table('member')->where('member_id', session()->get('member_id'))->get()->getRow();

        $view = "anggota_profil";
        $title = "Profil Anggota";
        _renderView($view, $title, ['m' => $m]);
    }
}