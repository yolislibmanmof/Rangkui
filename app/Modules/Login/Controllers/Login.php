<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        if ($this->session->has('user_id')) {
            return redirect()->to('/home')->with('info', 'Anda sudah login.');
        }

        _renderLogin("login", "DIFOSS - Login", ['data' => []], [], []);
    }

    public function login()
    {
        if ($this->session->has('user_id')) {
            return redirect()->to('/home');
        }

        if (!$this->request->is('post')) {
            return redirect()->to('/login');
        }

        // ✅ VALIDATION LEBIH LENIENT (tanpa alpha_dash)
        $rules = [
            'username' => 'required|min_length[2]',
            'password' => 'required|min_length[1]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        // ============================================
        // DEBUG MODE (Sementara - hapus setelah berhasil)
        // ============================================
        $debug = false; // Set true untuk debug
        
        if ($debug) {
            echo "<h2>DEBUG LOGIN</h2>";
            echo "Username: " . htmlspecialchars($username) . "<br>";
            echo "Password length: " . strlen($password) . "<br>";
        }

        // ============================================
        // DATABASE LOOKUP
        // ============================================
        $userModel = new LoginModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            if ($debug) die("❌ User tidak ditemukan di database");
            log_message('warning', "Login failed: user not found - {$username}");
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        if ($debug) {
            echo "User ditemukan: ID={$user['user_id']}<br>";
            echo "Hash di DB: " . substr($user['passwd'], 0, 30) . "...<br>";
        }

        // ============================================
        // PASSWORD VERIFICATION
        // ============================================
        $isValid = false;
        
        // Coba bcrypt dulu
        if (password_verify($password, $user['passwd'])) {
            $isValid = true;
            if ($debug) echo "✅ Password valid (bcrypt)<br>";
        }
        // Fallback: coba MD5 (untuk data lama)
        elseif (strlen($user['passwd']) === 32 && md5($password) === $user['passwd']) {
            $isValid = true;
            if ($debug) echo "✅ Password valid (MD5 legacy)<br>";
            
            // Auto-upgrade ke bcrypt
            try {
                $userModel->update($user['user_id'], [
                    'passwd' => password_hash($password, PASSWORD_BCRYPT)
                ]);
                if ($debug) echo "🔄 Password upgraded ke bcrypt<br>";
            } catch (\Throwable $e) {
                // Ignore upgrade error
            }
        }
        // Fallback: coba plain text (sangat tidak recommended)
        elseif ($password === $user['passwd']) {
            $isValid = true;
            if ($debug) echo "✅ Password valid (plain text)<br>";
        }

        if (!$isValid) {
            if ($debug) die("❌ Password tidak cocok");
            log_message('warning', "Login failed: wrong password - {$username}");
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        // ============================================
        // SET SESSION (sederhana, tanpa regenerate dulu)
        // ============================================
        $groups = $this->parseGroups($user['groups'] ?? '');
        
        $sessionData = [
            'user_id'   => (int) $user['user_id'],
            'groups'    => $groups[0] ?? 1,
            'name'      => $user['realname'] ?? 'User',
            'user_type' => (int) ($user['user_type'] ?? 0),
            'username'  => $user['username'],
        ];
        
        session()->set($sessionData);
        
        if ($debug) {
            echo "<h3>Session Data:</h3>";
            echo "<pre>" . print_r($sessionData, true) . "</pre>";
            echo "<a href='/home'>Lanjut ke Home →</a>";
            exit;
        }

        log_message('info', "Login success: {$username}");
        
        return redirect()->to('/home')
            ->with('success', 'Login berhasil! Selamat datang, ' . esc($user['realname'] ?? 'User'));
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('info', 'Anda telah logout.');
    }

    private function parseGroups($groupsData): array
    {
        if (empty($groupsData)) return [1];
        
        // Coba JSON
        $decoded = json_decode($groupsData, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }
        
        // Coba unserialize
        $unserialized = @unserialize($groupsData, ['allowed_classes' => false]);
        if ($unserialized !== false && is_array($unserialized)) {
            return $unserialized;
        }
        
        // Coba numeric
        if (is_numeric($groupsData)) {
            return [(int) $groupsData];
        }
        
        return [1];
    }
}