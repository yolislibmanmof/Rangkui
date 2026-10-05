<?php

namespace App\Modules\Profile\Controllers;

use Config\Services;
use App\Controllers\BaseController;
use App\Modules\Profile\Models\ProfileModel;

class ProfileController extends BaseController
{
    /**
     * Halaman Profile
     */
    public function index()
    {
        $loadModel = new ProfileModel();
        $js        = ["assets/custom/js/modules/profile/profile"];
        $view      = "profile/v_index";
        $title     = "Profile";

        // ✅ AMAN: Ambil user_id dari session, bukan dari input user
        $uid = $this->session->user_id;
        
        if (empty($uid)) {
            slim_alert('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
            return redirect()->to('/login');
        }

        $data = $loadModel->where('user_id', $uid)
            ->orderBy('user_id', 'DESC')
            ->get()
            ->getRow();

        if (!$data) {
            slim_alert('error', 'Data profile tidak ditemukan.');
            return redirect()->to('/login');
        }

        // ✅ FIXED: Gunakan unserialize dengan allowed_classes = false
        // Mencegah Object Injection Attack
        if (!empty($data->social_media)) {
            try {
                // Prioritas: coba JSON decode dulu (lebih aman)
                $decoded = json_decode($data->social_media, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $data->social_media = $decoded;
                } else {
                    // Fallback: unserialize dengan allowed_classes = false
                    // (PHP 7+) - tidak akan instantiate class apapun
                    $data->social_media = unserialize($data->social_media, ['allowed_classes' => false]);
                    if ($data->social_media === false) {
                        $data->social_media = [];
                    }
                }
            } catch (\Throwable $e) {
                log_message('error', 'Failed to decode social_media for user ' . $uid . ': ' . $e->getMessage());
                $data->social_media = [];
            }
        } else {
            $data->social_media = [];
        }

        $content['data'] = $data;
        _render($view, $title, $content, $js);
    }

    /**
     * Simpan Perubahan Profile
     */
    public function save()
    {
        // ✅ FIXED: Gunakan $this->request (CI4 standard)
        $request = $this->request;
        
        if (!$request->is('post')) {
            return redirect()->to('profile')->with('error', 'Method tidak diizinkan');
        }

        $loadModel = new ProfileModel();
        $now = date('Y-m-d');

        // ✅ CRITICAL FIX: Gunakan user_id dari SESSION, bukan dari POST
        // Mencegah IDOR (user A bisa edit profile user B)
        $uid = $this->session->user_id;
        
        if (empty($uid)) {
            slim_alert('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
            return redirect()->to('/login');
        }

        // ✅ Verify bahwa user_id dari POST match dengan session
        // (Double-check untuk mencegah manipulasi)
        $postUserId = $request->getPost('user_id');
        if (!empty($postUserId) && (int) $postUserId !== (int) $uid) {
            log_message('error', 'IDOR attempt: User ' . $uid . ' tried to update user ' . $postUserId);
            slim_alert('error', 'Aksi tidak diizinkan.');
            return redirect()->to('profile');
        }

        // ============================================
        // ✅ VALIDATION RULES (CI4 Standard)
        // ============================================
        $validationRules = [
            'realname' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z\s.\'-]+$/]',
                'errors' => [
                    'required' => 'Nama lengkap wajib diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama maksimal 100 karakter',
                    'regex_match' => 'Nama hanya boleh berisi huruf, spasi, titik, dan apostrof'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[255]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'valid_email' => 'Format email tidak valid',
                    'max_length' => 'Email maksimal 255 karakter'
                ]
            ],
            'user_type' => [
                'label' => 'Tipe User',
                'rules' => 'permit_empty|max_length[50]',
                'errors' => [
                    'max_length' => 'Tipe user maksimal 50 karakter'
                ]
            ],
            'passwd1' => [
                'label' => 'Password Baru',
                'rules' => 'permit_empty|min_length[8]|max_length[255]|matches[passwd2]',
                'errors' => [
                    'min_length' => 'Password minimal 8 karakter',
                    'max_length' => 'Password maksimal 255 karakter',
                    'matches' => 'Konfirmasi password tidak cocok'
                ]
            ],
            'passwd2' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'permit_empty|matches[passwd1]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak cocok'
                ]
            ],
            // Validasi social media sebagai array
            'social' => [
                'label' => 'Social Media',
                'rules' => 'permit_empty',
            ]
        ];

        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();
            $errorMessage = !empty($errors) ? implode('<br>', $errors) : 'Validasi gagal';
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }

        // ============================================
        // ✅ SANITIZE & PREPARE DATA
        // ============================================
        // Tidak perlu escapeString() manual - CI4 Model sudah handle ini
        // Cukup ambil data yang sudah divalidasi
        $data = [
            'realname'    => trim($request->getPost('realname')),
            'email'       => trim(strtolower($request->getPost('email'))),
            'user_type'   => trim($request->getPost('user_type') ?? ''),
            'last_update' => $now,
        ];

        // ✅ FIXED: Gunakan json_encode() yang lebih aman daripada serialize()
        // JSON tidak bisa instantiate object, sehingga immune terhadap Object Injection
        $social = $request->getPost('social');
        if (!empty($social) && is_array($social)) {
            // Sanitasi setiap value social media
            $sanitizedSocial = [];
            foreach ($social as $platform => $url) {
                // Whitelist platform
                $allowedPlatforms = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'github', 'website'];
                if (in_array(strtolower($platform), $allowedPlatforms)) {
                    // Sanitasi URL
                    $cleanUrl = filter_var(trim($url), FILTER_SANITIZE_URL);
                    if (filter_var($cleanUrl, FILTER_VALIDATE_URL) || empty($cleanUrl)) {
                        $sanitizedSocial[strtolower($platform)] = $cleanUrl;
                    }
                }
            }
            // Gunakan JSON (lebih aman dari serialize)
            $data['social_media'] = json_encode($sanitizedSocial);
        } else {
            $data['social_media'] = json_encode([]);
        }

        // ============================================
        // ✅ PASSWORD HANDLING (dengan validasi ketat)
        // ============================================
        $passwd1 = $request->getPost('passwd1');
        $passwd2 = $request->getPost('passwd2');

        if (!empty($passwd1)) {
            // Cek konfirmasi password match
            if ($passwd1 !== $passwd2) {
                slim_alert('error', 'Konfirmasi password tidak cocok.');
                return redirect()->back()->withInput();
            }

            // Cek password complexity
            if (!$this->validatePasswordStrength($passwd1)) {
                slim_alert('error', 'Password harus mengandung minimal 1 huruf besar, 1 huruf kecil, dan 1 angka.');
                return redirect()->back()->withInput();
            }

            // Cek apakah password sama dengan password lama
            $currentUser = $loadModel->where('user_id', $uid)->get()->getRow();
            if ($currentUser && password_verify($passwd1, $currentUser->passwd)) {
                slim_alert('error', 'Password baru tidak boleh sama dengan password lama.');
                return redirect()->back()->withInput();
            }

            // Hash password dengan BCRYPT (cost factor 12 untuk keamanan ekstra)
            $data['passwd'] = password_hash($passwd1, PASSWORD_BCRYPT, ['cost' => 12]);
        }

        // ============================================
        // ✅ DATABASE TRANSACTION
        // ============================================
        $this->db->transBegin();
        
        try {
            $updateResult = $loadModel->update($uid, $data);  // ✅ Pakai $uid dari session
            
            if ($this->db->transStatus() === false || $updateResult === false) {
                $this->db->transRollback();
                // ✅ FIXED: Log message yang benar (sebelumnya salah: "success" padahal gagal)
                $log_message = "Update profile {$data['realname']} (ID: {$uid}) FAILED";
                slim_alert('error', 'Data gagal disimpan. Silakan coba lagi.');
                log_message('error', $log_message);
            } else {
                $this->db->transCommit();
                $log_message = "Update profile {$data['realname']} (ID: {$uid}) SUCCESS";
                slim_alert('success', 'Profile berhasil disimpan.');
                log_message('info', $log_message);
            }
        } catch (\Throwable $e) {
            $this->db->transRollback();
            log_message('error', 'Exception saat update profile user ' . $uid . ': ' . $e->getMessage());
            slim_alert('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
            return redirect()->to('profile');
        }

        // ============================================
        // ✅ AUDIT LOG
        // ============================================
        try {
            if (function_exists('getTypeUser') && method_exists(Services::class, 'writeLog')) {
                Services::writeLog(
                    getTypeUser($this->session->user_type),
                    $this->session->user_id,
                    'User',
                    $log_message
                );
            }
        } catch (\Throwable $e) {
            // Log error tapi jangan block redirect
            log_message('error', 'Failed to write audit log: ' . $e->getMessage());
        }

        return redirect()->to('profile');
    }

    /**
     * ✅ HELPER: Validasi kekuatan password
     */
    private function validatePasswordStrength(string $password): bool
    {
        // Minimal: 1 huruf besar, 1 huruf kecil, 1 angka
        $hasUpperCase = preg_match('/[A-Z]/', $password);
        $hasLowerCase = preg_match('/[a-z]/', $password);
        $hasNumber = preg_match('/[0-9]/', $password);
        
        return $hasUpperCase && $hasLowerCase && $hasNumber;
    }
}