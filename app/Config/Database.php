<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 * 
 * ✅ SECURE: Credentials diambil dari .env file
 * ✅ ENVIRONMENT-AWARE: Konfigurasi berbeda untuk dev/staging/production
 * ✅ BACKWARD-COMPATIBLE: Tidak breaking existing code
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     * 
     * ✅ PERBAIKAN UTAMA:
     * - Credentials diambil dari .env file (tidak hardcoded)
     * - Konfigurasi berbeda berdasarkan environment (dev/staging/prod)
     * - Security hardening untuk production
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        
        // ✅ CREDENTIALS DARI .ENV (WAJIB dikonfigurasi di .env)
        'username'     => '',
        'password'     => '',
        'database'     => '',
        
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        
        // ✅ ENVIRONMENT-AWARE: DBDebug hanya true di development
        'DBDebug'      => (ENVIRONMENT !== 'production'),
        
        'charset'      => 'utf8mb4',
        
        // ✅ FIXED: Gunakan collation yang lebih modern
        'DBCollat'     => 'utf8mb4_unicode_ci',
        
        'swapPre'      => '',
        'encrypt'      => false,
        
        // ✅ ENABLED: Compress untuk menghemat bandwidth
        'compress'     => true,
        
        // ✅ ENVIRONMENT-AWARE: Strict mode di production untuk data integrity
        'strictOn'     => (ENVIRONMENT === 'production'),
        
        'failover'     => [],
        'numberNative' => false,
        
        'port'         => 3306,
        
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
        
        // ✅ TAMBAHAN: Connection pooling & timeout settings
        'connectTimeout' => 5,      // 5 seconds timeout
        'readTimeout'    => 30,     // 30 seconds read timeout
        'writeTimeout'   => 30,     // 30 seconds write timeout
    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     * 
     * ✅ STATUS: Sudah baik, tidak perlu perubahan besar
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',
        'pConnect'    => false,
        'DBDebug'     => false,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        // ============================================
        // ✅ ENVIRONMENT-AWARE CONFIGURATION
        // ============================================
        
        // Testing environment selalu pakai SQLite in-memory
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
            return;
        }

        // ============================================
        // ✅ LOAD CREDENTIALS DARI .ENV FILE
        // ============================================
        
        // Ambil credentials dari .env (CI4 standard)
        $this->default['hostname'] = env('database.default.hostname', 'localhost');
        $this->default['username'] = env('database.default.username', '');
        $this->default['password'] = env('database.default.password', '');
        $this->default['database'] = env('database.default.database', '');
        $this->default['DBDriver'] = env('database.default.DBDriver', 'MySQLi');
        $this->default['DBPrefix'] = env('database.default.DBPrefix', '');
        $this->default['port']     = env('database.default.port', 3306);
        
        // ============================================
        // ✅ VALIDATION: Pastikan credentials ada
        // ============================================
        
        if (ENVIRONMENT !== 'testing') {
            if (empty($this->default['username'])) {
                log_message('warning', 'Database username not configured in .env file');
            }
            if (empty($this->default['database'])) {
                log_message('warning', 'Database name not configured in .env file');
            }
        }

        // ============================================
        // ✅ PRODUCTION-SPECIFIC SECURITY HARDENING
        // ============================================
        
        if (ENVIRONMENT === 'production') {
            // 1. Disable debug mode untuk mencegah informasi sensitif bocor
            $this->default['DBDebug'] = false;
            
            // 2. Enable strict SQL mode untuk data integrity
            $this->default['strictOn'] = true;
            
            // 3. Enable compression untuk menghemat bandwidth
            $this->default['compress'] = true;
            
            // 4. Set shorter timeouts untuk production (fail fast)
            $this->default['connectTimeout'] = 3;
            $this->default['readTimeout'] = 15;
            $this->default['writeTimeout'] = 15;
            
            // 5. Disable persistent connections di production (security risk)
            $this->default['pConnect'] = false;
        }
        
        // ============================================
        // ✅ DEVELOPMENT-SPECIFIC SETTINGS
        // ============================================
        
        if (ENVIRONMENT === 'development') {
            // 1. Enable debug mode untuk troubleshooting
            $this->default['DBDebug'] = true;
            
            // 2. Disable strict mode untuk flexibility
            $this->default['strictOn'] = false;
            
            // 3. Longer timeouts untuk debugging
            $this->default['connectTimeout'] = 10;
            $this->default['readTimeout'] = 60;
            $this->default['writeTimeout'] = 60;
        }

        // ============================================
        // ✅ FAILOVER CONFIGURATION (Optional)
        // ============================================
        
        // Jika ada failover database, load dari .env
        $failoverHost = env('database.default.failover.host', '');
        if (!empty($failoverHost)) {
            $this->default['failover'] = [
                [
                    'hostname' => $failoverHost,
                    'username' => env('database.default.failover.username', $this->default['username']),
                    'password' => env('database.default.failover.password', $this->default['password']),
                    'database' => env('database.default.failover.database', $this->default['database']),
                    'DBDriver' => $this->default['DBDriver'],
                    'DBPrefix' => $this->default['DBPrefix'],
                    'pConnect' => $this->default['pConnect'],
                    'DBDebug'  => $this->default['DBDebug'],
                    'charset'  => $this->default['charset'],
                    'DBCollat' => $this->default['DBCollat'],
                ]
            ];
        }
    }
}