<?php

use CodeIgniter\Database\Database;
use CodeIgniter\Session\Session as SessionSession;
use Config\Services;
use Config\Session;

/**
 * ✅ IMPROVED: Debug function dengan better security
 */
if (!function_exists('pd')) {
    /**
     * @param mixed $val
     * @param int $exit
     */
    function pd($val, $exit = 0)
    {
        if (defined('ENVIRONMENT') && ENVIRONMENT !== 'production') {
            echo "<pre>";
            print_r($val);
            echo "</pre>";

            if ($exit == 1) {
                die;
            }
        } else {
            log_message('debug', 'pd() called with: ' . print_r($val, true));
        }
    }
}

/**
 * ✅ IMPROVED: Last query debug dengan better security
 */
if (!function_exists('lq')) {
    function lq()
    {
        if (defined('ENVIRONMENT') && ENVIRONMENT !== 'production') {
            $db = \Config\Database::connect();
            echo $db->getLastQuery();
            exit;
        } else {
            $db = \Config\Database::connect();
            log_message('debug', 'Last query: ' . $db->getLastQuery());
        }
    }
}

/**
 * ✅ REFACTORED: Helper function untuk render (menghilangkan code duplication)
 */
if (!function_exists('_renderTemplate')) {
    /**
     * Internal helper untuk render template
     */
    function _renderTemplate(string $view, string $title, array $content, string $templatePath, array $js = [], array $css = [], bool $loadMenus = true)
    {
        $module = get_current_module();

        // Normalize view path
        $view = str_replace("/", DIRECTORY_SEPARATOR, $view);
        $contentPath = $module . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
        $page = $contentPath . $view;

        $data = [
            'title'   => $title,
            'content' => view($page, $content),
            'css'     => $css,
            'js'      => $js,
        ];

        // Load menus jika diperlukan (admin only)
        if ($loadMenus) {
            $groups_id = session()->get('groups');
            
            if ($groups_id) {
                $db = \Config\Database::connect();
                $list_group = $db->table('group_access')
                    ->where('group_id', $groups_id)
                    ->get()
                    ->getResult();

                $groups = array_column($list_group, 'module_id');
                
                if (!empty($groups)) {
                    $groups_str = "('" . implode("', '", array_map('intval', $groups)) . "')";
                    $data['menus'] = getMenu($groups_str);
                } else {
                    $data['menus'] = [];
                }
            } else {
                $data['menus'] = [];
            }
        }

        echo view($templatePath, $data);
    }
}

if (!function_exists('_render')) {
    function _render(string $view, string $title, array $content, array $js = [], array $css = [])
    {
        _renderTemplate(
            $view,
            $title,
            $content,
            'App\Modules\Template\Views\v_template',
            $js,
            $css,
            true
        );
    }
}

if (!function_exists('_renderView')) {
    function _renderView(string $view, string $title, array $content, array $js = [], array $css = [])
    {
        _renderTemplate(
            $view,
            $title,
            $content,
            'App\Modules\Template\Views\v_beranda',
            $js,
            $css,
            false
        );
    }
}

if (!function_exists('_renderLogin')) {
    function _renderLogin(string $view, string $title, array $content, array $js = [], array $css = [])
    {
        _renderTemplate(
            $view,
            $title,
            $content,
            'App\Modules\Template\Views\v_login',
            $js,
            $css,
            false
        );
    }
}

if (!function_exists('get_current_module')) {
    /**
     * ✅ TRIPLE-LAYER DETECTION: Router + Backtrace + Caching
     */
    function get_current_module(): string
    {
        static $cachedModule = null;
        
        if ($cachedModule !== null) {
            return $cachedModule;
        }

        // === STRATEGI 1: Dari Router ===
        try {
            $router = Services::router();
            if ($router) {
                $controller = $router->controllerName();
                if (!empty($controller)) {
                    $parts = explode('\\', $controller);
                    if (isset($parts[2]) && ($parts[1] ?? '') === 'Modules') {
                        $cachedModule = 'App\\Modules\\' . $parts[2];
                        return $cachedModule;
                    }
                }
            }
        } catch (\Throwable $e) {
            // Router gagal, lanjut ke strategi 2
        }

        // === STRATEGI 2: Dari debug_backtrace (PALING RELIABLE) ===
        try {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 30);
            foreach ($trace as $frame) {
                if (!isset($frame['class'])) continue;
                
                $class = $frame['class'];
                if (preg_match('/^App\\\\Modules\\\\([^\\\\]+)\\\\Controllers\\\\/', $class, $matches)) {
                    $cachedModule = 'App\\Modules\\' . $matches[1];
                    return $cachedModule;
                }
            }
        } catch (\Throwable $e) {
            // Backtrace gagal, lanjut ke strategi 3
        }

        // === STRATEGI 3: Fallback ke Beranda ===
        log_message('warning', 'get_current_module: fallback to Beranda module');
        $cachedModule = 'App\\Modules\\Beranda';
        return $cachedModule;
    }
}

if (!function_exists('buildHierarchy')) {
    function buildHierarchy($elements, $parentId = 0)
    {
        $branch = [];

        foreach ($elements as $element) {
            if ((int)$element['parent_id'] === (int)$parentId) {
                $children = buildHierarchy($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}

if (!function_exists('getTypeUser')) {
    function getTypeUser($type)
    {
        $type = (int) $type;
        
        return match($type) {
            1 => "Administrator",
            2 => "Pustakawan",
            3 => "Staff Perpustakaan",
            4 => "Mahasiswa",
            5 => "Dosen",
            default => "Pengguna tidak dikenal",
        };
    }
}

if (!function_exists('formatSizeUnits')) {
    function formatSizeUnits($bytes)
    {
        $bytes = (int) $bytes;
        
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }
}

if (!function_exists('cleanUri')) {
    function cleanUri($uri)
    {
        $uri = strtolower($uri);
        $uri = preg_replace('/[\s_]+/', '-', $uri);
        $uri = preg_replace('/[^a-z0-9\-]/', '', $uri);
        $uri = preg_replace('/-+/', '-', $uri);
        $uri = trim($uri, '-');
        
        return $uri;
    }
}

/**
 * ✅ CRITICAL FIX: Encryption dengan BASE64URL (URL-safe)
 * 
 * Output hanya mengandung: A-Za-z0-9-_ (TIDAK ADA +, /, atau =)
 * Sehingga aman untuk digunakan di URL tanpa 403 Forbidden
 * 
 * Backward-compatible: bisa decrypt data lama (standard base64 dan legacy)
 */
function slim_encrypt($data)
{
    if ($data === null || $data === '') {
        return '';
    }

    $key = env('encryption.key', '');
    if (empty($key)) {
        log_message('warning', 'slim_encrypt: encryption.key not configured in .env, using fallback');
        $key = 'slim_key_fallback_' . md5(FCPATH);
    }

    try {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);

        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);

        $combined = $iv . $encrypted;
        $hash = hash_hmac('sha256', $combined, $key, true);
        $final = $combined . $hash;

        // ✅ BASE64URL: ganti + jadi -, / jadi _, hapus padding =
        return rtrim(strtr(base64_encode($final), '+/', '-_'), '=');
    } catch (\Throwable $e) {
        log_message('error', 'slim_encrypt failed: ' . $e->getMessage());
        return _slim_encrypt_legacy($data);
    }
}

/**
 * Legacy encryption untuk backward compatibility
 */
function _slim_encrypt_legacy($data)
{
    $key = 'slim_key';
    $data = $key . ',' . $data;
    $data = base64_encode($data);
    $data = rawurlencode($data);
    $data = rawurlencode($data);
    return $data;
}

/**
 * ✅ CRITICAL FIX: Decryption dengan support BASE64URL dan standard base64
 * Menangani 3 format:
 * 1. Base64URL baru (tanpa +/=)
 * 2. Standard base64 lama (dengan +/=)
 * 3. Legacy format (slim_key,{id})
 */
function slim_decrypt($data)
{
    if ($data === null || $data === '') {
        return null;
    }

    // ✅ COBA 1: Decrypt dengan method baru (OpenSSL - support base64url + standard)
    $result = _slim_decrypt_openssl($data);
    if ($result !== null && $result !== '' && is_numeric($result)) {
        return $result;
    }

    // ✅ COBA 2: Decrypt dengan method lama (legacy format)
    $legacy = _slim_decrypt_legacy($data);
    if ($legacy !== null && $legacy !== '' && is_numeric($legacy)) {
        return $legacy;
    }

    // ✅ COBA 3: Jika data sudah numeric (ID langsung tanpa encrypt)
    if (is_numeric($data) && (int)$data > 0) {
        return (int)$data;
    }

    log_message('warning', 'slim_decrypt: failed to decrypt (length=' . strlen($data) . ', preview=' . substr($data, 0, 30) . ')');
    return null;
}

/**
 * ✅ FIXED: OpenSSL decryption yang menerima BASE64URL dan standard base64
 * 
 * - Base64URL: karakter - dan _ (tanpa padding =)
 * - Standard base64: karakter + dan / (dengan padding =)
 * 
 * Fungsi ini otomatis mendeteksi dan mengkonversi keduanya.
 */
function _slim_decrypt_openssl($data)
{
    try {
        $key = env('encryption.key', '');
        if (empty($key)) {
            $key = 'slim_key_fallback_' . md5(FCPATH);
        }

        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);

        // ✅ NORMALISASI: base64url → base64 standard
        $b64 = strtr($data, '-_', '+/');

        // Kembalikan padding = jika hilang
        $pad = strlen($b64) % 4;
        if ($pad) {
            $b64 .= str_repeat('=', 4 - $pad);
        }

        // Decode base64
        $decoded = base64_decode($b64, true);
        if ($decoded === false || strlen($decoded) < $ivLength + 32) {
            return null;
        }

        // Extract IV, encrypted data, dan hash
        $iv = substr($decoded, 0, $ivLength);
        $hash = substr($decoded, -32);
        $encrypted = substr($decoded, $ivLength, -32);

        // Verify integrity (HMAC)
        $combined = $iv . $encrypted;
        $expectedHash = hash_hmac('sha256', $combined, $key, true);

        if (!hash_equals($expectedHash, $hash)) {
            return null;  // Data tampered atau key berbeda
        }

        // Decrypt
        $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);

        return $decrypted !== false ? $decrypted : null;
    } catch (\Throwable $e) {
        return null;
    }
}

/**
 * ✅ CRITICAL FIX: Legacy decryption dengan multi-attempt decoding
 * Menangani berbagai level URL encoding (0x, 1x, 2x, 3x)
 */
function _slim_decrypt_legacy($data)
{
    try {
        $attempts = [
            $data,                                           // Sudah di-decode CI4 (paling umum)
            rawurldecode($data),                             // Decode 1x
            rawurldecode(rawurldecode($data)),               // Decode 2x (legacy format)
            rawurldecode(rawurldecode(rawurldecode($data))), // Decode 3x (edge case)
        ];

        foreach ($attempts as $attempt) {
            if (empty($attempt)) continue;

            $decoded = @base64_decode($attempt, true); // strict mode
            if ($decoded === false || empty($decoded)) continue;

            // Cek format legacy: "slim_key,{id_asli}"
            if (strpos($decoded, 'slim_key,') === 0) {
                $parts = explode(',', $decoded, 2);
                if (isset($parts[1]) && is_numeric($parts[1])) {
                    return $parts[1];
                }
            }

            // Fallback: coba explode tanpa prefix
            $parts = explode(',', $decoded, 2);
            if (count($parts) === 2 && is_numeric($parts[1])) {
                return $parts[1];
            }
        }

        return null;
    } catch (\Throwable $e) {
        log_message('error', '_slim_decrypt_legacy failed: ' . $e->getMessage());
        return null;
    }
}

function authority_type($type)
{
    return match($type) {
        'p' => 'Personal Name',
        'o' => 'Organization Body',
        'c' => 'Conference',
        default => '-',
    };
}

if (!function_exists('getMenu')) {
    /**
     * ✅ CRITICAL FIX: SQL Injection protection menggunakan Query Builder
     */
    function getMenu($groups)
    {
        $db = \Config\Database::connect();
        
        $groupIds = [];
        
        if (is_string($groups)) {
            $groups = str_replace(['(', ')', "'", '"'], '', $groups);
            $groupIds = array_map('intval', array_filter(explode(',', $groups)));
        } elseif (is_array($groups)) {
            $groupIds = array_map('intval', $groups);
        }
        
        if (empty($groupIds)) {
            return [];
        }

        try {
            $builder = $db->table('mst_menu');
            $builder->select('*');
            $builder->groupStart()
                ->whereIn('id', $groupIds)
                ->orGroupStart()
                    ->whereIn('parent_id', $groupIds)
                    ->where('level', 2)
                ->groupEnd()
            ->groupEnd();
            
            $query1 = $builder->getCompiledSelect();
            
            $subBuilder = $db->table('mst_menu');
            $subBuilder->select('id')
                ->whereIn('parent_id', $groupIds)
                ->where('level', 2)
                ->orderBy('parent_id');
            
            $subQuery = $subBuilder->getCompiledSelect();
            
            $builder2 = $db->table('mst_menu');
            $builder2->select('*')
                ->where("parent_id IN ($subQuery)", null, false);
            
            $query2 = $builder2->getCompiledSelect();
            
            $finalQuery = "($query1) UNION ($query2)";
            $result = $db->query($finalQuery)->getResultArray();
            
            $menuItems = $result;
            $list_menu = buildMenuTree($menuItems);
            
            $shortcuts = getShortcut();
            if (!empty($shortcuts) && isset($list_menu[0])) {
                foreach ($shortcuts as $shortcut) {
                    $shortcut->parent_id = 1;
                    $list_menu[0]['children'][] = (array)$shortcut;
                }
            }

            return $list_menu;
        } catch (\Throwable $e) {
            log_message('error', 'getMenu failed: ' . $e->getMessage());
            return [];
        }
    }
}

if (!function_exists('buildMenuTree')) {
    function buildMenuTree($menuItems, $parentId = null)
    {
        $tree = [];
        foreach ($menuItems as $menuItem) {
            if ($menuItem['parent_id'] == $parentId) {
                $children = buildMenuTree($menuItems, $menuItem['id']);
                if ($children) {
                    $menuItem['children'] = $children;
                }
                $tree[] = $menuItem;
            }
        }
        return $tree;
    }
}

if (!function_exists('getShortcut')) {
    function getShortcut()
    {
        $db = \Config\Database::connect();
        $setting = $db->table('setting');

        $old_sc = $setting->where("setting_name", "setiadi_shortcut_1")->get();

        $shortcut = [];

        if ($old_sc->getNumRows() > 0) {
            $old_sc = $old_sc->getRow()->setting_value;

            if (!empty(trim($old_sc))) {
                try {
                    $decoded = json_decode($old_sc, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $shortcut = $decoded;
                    } else {
                        $unserialized = @unserialize($old_sc, ['allowed_classes' => false]);
                        if ($unserialized !== false && is_array($unserialized)) {
                            $shortcut = $unserialized;
                        }
                    }
                } catch (\Throwable $e) {
                    log_message('error', 'getShortcut unserialize failed: ' . $e->getMessage());
                    $shortcut = [];
                }
            }
        }

        return $shortcut;
    }
}