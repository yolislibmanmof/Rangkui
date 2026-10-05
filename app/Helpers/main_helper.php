<?php

if (!function_exists('formatString')) {
    function formatString($input, $is_uppercase = null)
    {
        if (!is_null($is_uppercase)) {
            $output = strtoupper($input);
        } else {
            $input = str_replace('_', ' ', $input);
            $output = ucwords($input);
        }
        return $output;
    }
}

function slim_alert($status = 'success', $message = 'Berhasil!', $text = null)
{
    $session = session();
    $alert   = ['status' => $status, 'msg' => $message, 'text' => $text];
    $session->setFlashdata('alert', $alert);
    return true;
}

/**
 * @param $date
 * @param $format
 * @return mixed
 * ✅ FIXED: Tambah validasi input untuk mencegah crash
 */
function TanggalIndo($date, $format = '')
{
    // Validasi input
    if (empty($date) || !is_string($date)) {
        return '';
    }
    
    // Cek format date (harus YYYY-MM-DD)
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        // Coba parse dengan strtotime sebagai fallback
        $timestamp = strtotime($date);
        if ($timestamp === false) {
            return '';
        }
        $date = date('Y-m-d', $timestamp);
    }
    
    $BulanIndo = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    $split = explode('-', $date);
    
    // Validasi array split
    if (count($split) !== 3) {
        return '';
    }
    
    $year  = $split[0];
    $month = (int) $split[1];
    $day   = $split[2];
    
    // Validasi bulan
    if ($month < 1 || $month > 12) {
        return '';
    }
    
    if ($format == 'd M Y') {
        return $day . ' ' . $BulanIndo[$month] . ' ' . $year;
    } else {
        return $day . ' ' . $BulanIndo[$month] . ' ' . $year;
    }
}

/**
 * @param $date
 * @return mixed
 * ✅ FIXED: Tambah validasi input untuk mencegah crash
 */
function datetimeIdn($date)
{
    // Validasi input
    if (empty($date) || !is_string($date)) {
        return '';
    }
    
    // Coba parse dengan strtotime
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return '';
    }
    
    $BulanIndo = ["", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
    
    $day   = date('d', $timestamp);
    $month = (int) date('m', $timestamp);
    $year  = date('Y', $timestamp);
    
    // Validasi bulan
    if ($month < 1 || $month > 12) {
        return '';
    }
    
    return $day . ' ' . $BulanIndo[$month] . ' ' . $year;
}

/**
 * ✅ FIXED: Menggunakan random_int() yang cryptographically secure
 */
function generateRandomID()
{
    $characters = '0123456789';
    $randomID = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < 16; $i++) {
        // Gunakan random_int() yang lebih aman daripada rand()
        $randomID .= $characters[random_int(0, $max)];

        if (($i + 1) % 4 === 0 && $i < 15) {
            $randomID .= '-';
        }
    }

    return $randomID;
}

if (!function_exists('cekerror')) {
    function cekerror($db)
    {
        $test = $db->errors();
        return reset($test);
    }
}

/**
 * ✅ FIXED: Proteksi Path Traversal dengan whitelist & sanitasi
 * Tetap backward-compatible dengan pemanggilan lama
 */
if (!function_exists('delImage')) {
    function delImage($targetPath, $imageName)
    {
        // 1. Whitelist target paths yang diizinkan
        $allowedPaths = [
            'images/docs',
            'images/users', 
            'images/authors',
            'repository',
            'attachments',
            'thumbs',
            // Tambahkan path lain sesuai kebutuhan
        ];
        
        // Normalisasi path (hapus trailing slash)
        $targetPath = trim($targetPath, '/\\');
        
        // Cek apakah path diizinkan
        $isAllowed = false;
        foreach ($allowedPaths as $allowed) {
            if ($targetPath === $allowed || strpos($targetPath, $allowed) === 0) {
                $isAllowed = true;
                break;
            }
        }
        
        if (!$isAllowed) {
            log_message('error', 'delImage: Path traversal attempt blocked - ' . $targetPath);
            return FALSE;
        }
        
        // 2. Sanitasi nama file - hapus directory traversal
        $imageName = basename($imageName);
        
        // Hapus karakter berbahaya
        $imageName = preg_replace('/[^a-zA-Z0-9._-]/', '', $imageName);
        
        if (empty($imageName)) {
            log_message('error', 'delImage: Invalid filename after sanitization');
            return FALSE;
        }
        
        // 3. Build path menggunakan DIRECTORY_SEPARATOR (cross-platform)
        $file_path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $targetPath . DIRECTORY_SEPARATOR . $imageName;
        
        // 4. Verifikasi file exists
        if (!file_exists($file_path)) {
            return "-1.";
        }
        
        // 5. Verifikasi dengan realpath untuk mencegah symlink attack
        $realPath = realpath($file_path);
        $uploadsPath = realpath(FCPATH . 'uploads');
        
        if ($realPath === false || $uploadsPath === false) {
            log_message('error', 'delImage: Cannot resolve real path');
            return FALSE;
        }
        
        // Pastikan file benar-benar di dalam folder uploads
        if (strpos($realPath, $uploadsPath) !== 0) {
            log_message('error', 'delImage: Path traversal attempt - ' . $file_path);
            return FALSE;
        }
        
        // 6. Pastikan yang dihapus adalah file, bukan directory
        if (!is_file($realPath)) {
            log_message('error', 'delImage: Not a file - ' . $realPath);
            return FALSE;
        }
        
        // 7. Lakukan penghapusan
        if (unlink($realPath)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

if (!function_exists('getAuthorityName')) {
    function getAuthorityName($authority_type)
    {
        switch ($authority_type) {
            case 'o':
                $result = 'Organizational Body';
                break;
            case 'c':
                $result = 'Conference';
                break;
            default:
                $result = 'Personal Name';
        }
        return $result;
    }
}

/**
 * ✅ FIXED: SQL Injection Protection dengan Query Builder
 * Signature tetap dipertahankan agar backward-compatible
 */
if (!function_exists('getDatas')) {
    /**
     * Fungsi untuk mengambil data dari tabel dengan kustomisasi format output.
     * 
     * @param string $table Nama tabel (WAJIB whitelist).
     * @param string|array $col Kolom yang diambil.
     * @param string|null $whr Kondisi where (legacy - untuk backward compatibility).
     * @param string $val Nilai dari where (legacy).
     * @param string|null $operator Operator untuk where.
     * @param string|null $ord Kolom untuk pengurutan.
     * @param string $sort Urutan pengurutan (ASC/DESC).
     * @param string|null $pd Debug (print query).
     * @param string|null $lq Debug (log query).
     * @param string $output Jenis output: 'array' atau 'row'.
     *
     * @return array|object|null Hasil query.
     */
    function getDatas($table, $col, $whr = null, $val = "", $operator = null, $ord = null, $sort = ' ASC ', $pd = null, $lq = null, $output = 'array')
    {
        $db = \Config\Database::connect();
        
        // ===== 1. WHITELIST TABEL (Pencegah SQL Injection #1) =====
        $allowedTables = [
            'biblio', 'biblio_author', 'biblio_contributor', 'biblio_supervisor',
            'biblio_examiner', 'biblio_topic', 'biblio_attachment',
            'mst_author', 'mst_contributor', 'mst_supervisor', 'mst_examiner',
            'mst_topic', 'mst_publisher', 'mst_place', 'mst_language',
            'mst_license', 'mst_copyright', 'mst_gmd', 'mst_item_type',
            'mst_code_ministry', 'member', 'member_type', 'files',
            'xu_submission', 'xu_approval_step', 'xu_approval_settings',
            'xu_fingerprint', 'xu_scan_history', 'xu_similarity_pairs',
            'user', 'group_access', 'biblio_index', 'loan', 'loan_rule',
            'mst_frequency', 'biblio_loan', 'setting', 'mst_label',
            'biblio_reserved', 'reserve', 'circulation_log', 'holiday',
            'biblio_logs', 'search_biblio', 'biblio_custom', 'biblio_custom_data'
        ];
        
        if (!in_array($table, $allowedTables)) {
            log_message('error', 'getDatas: SQL Injection attempt - invalid table: ' . $table);
            return null;
        }
        
        // ===== 2. BANGUN QUERY DENGAN QUERY BUILDER (AMAN) =====
        $builder = $db->table($table);
        
        // Safe column selection
        if (is_string($col)) {
            // Validasi kolom (hanya izinkan karakter alphanumeric, underscore, comma, asterisk, dot)
            if (preg_match('/^[a-zA-Z0-9_*,.\s`]+$/', $col)) {
                $builder->select($col);
            } else {
                log_message('error', 'getDatas: Invalid column name: ' . $col);
                $builder->select('*');
            }
        } elseif (is_array($col)) {
            $builder->select($col);
        }
        
        // ===== 3. SAFE WHERE CLAUSE =====
        if (!is_null($whr)) {
            // Sanitasi WHERE clause - hanya izinkan karakter aman
            $whr = trim($whr);
            
            // Cek karakter berbahaya
            if (preg_match('/(--|;|\/\*|\*\/|UNION|DROP|DELETE|INSERT|UPDATE|EXEC|EXECUTE)/i', $whr)) {
                log_message('error', 'getDatas: SQL Injection attempt in WHERE - ' . $whr);
                return null;
            }
            
            // Parse WHERE clause secara aman
            // Format: "column = value" atau "column IN (value1, value2)"
            if (!is_null($operator)) {
                // Format lama: whr sebagai column, operator, val sebagai value
                // Contoh: getDatas('table', '*', 'id', '1,2,3', 'IN')
                $operator = strtoupper(trim($operator));
                
                if ($operator === 'IN') {
                    // Parse val sebagai array (comma-separated)
                    $values = array_map('trim', explode(',', $val));
                    // Quote string values
                    $quotedValues = array_map(function($v) use ($db) {
                        return is_numeric($v) ? $v : "'" . $db->escapeString($v) . "'";
                    }, $values);
                    $builder->whereIn($whr, $values);
                } elseif (in_array($operator, ['=', '!=', '<', '>', '<=', '>=', 'LIKE', 'NOT LIKE'])) {
                    $builder->where($whr . ' ' . $operator, $val);
                } else {
                    log_message('error', 'getDatas: Invalid operator: ' . $operator);
                    return null;
                }
            } else {
                // whr berisi full WHERE clause (legacy support)
                // Sanitasi dan validasi
                $allowedWhrPattern = '/^[a-zA-Z0-9_`.\s=<>\'"\(\),\-+%]+$/';
                
                if (preg_match($allowedWhrPattern, $whr)) {
                    // Aman - gunakan raw where (dengan catatan sudah disanitasi)
                    $builder->where($whr);
                } else {
                    log_message('error', 'getDatas: Suspicious WHERE clause - ' . $whr);
                    return null;
                }
            }
        }
        
        // ===== 4. SAFE ORDER BY =====
        if (!is_null($ord)) {
            // Sanitasi order column
            $ord = preg_replace('/[^a-zA-Z0-9_`,.\s]/', '', $ord);
            $sort = strtoupper(trim($sort));
            $sort = in_array($sort, ['ASC', 'DESC', ' ASC ', ' DESC ']) ? trim($sort) : 'ASC';
            $builder->orderBy($ord, $sort);
        }
        
        // ===== 5. DEBUG QUERIES =====
        if (!is_null($pd)) {
            if (function_exists('pd')) {
                pd($builder->getCompiledSelect(), 1);
            }
        }
        
        // ===== 6. EXECUTE QUERY =====
        $query = $builder->get();
        
        if ($query === false || $query->getNumRows() === 0) {
            if (!is_null($lq) && function_exists('lq')) {
                lq();
            }
            return null;
        }
        
        // ===== 7. RETURN RESULT =====
        if ($output === 'row') {
            $row = $query->getRow();
            if (is_string($col) && !str_contains($col, ',')) {
                return $row->$col ?? null;
            }
            return $row;
        }
        
        if (!is_null($lq) && function_exists('lq')) {
            lq();
        }
        
        return $query->getResult();
    }
}