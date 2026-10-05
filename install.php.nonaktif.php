<?php
session_start();

if (file_exists('install.lock')) {
    die('Akses ditolak. Aplikasi sudah terinstal. Hapus file install.lock jika ingin menginstal ulang.');
}

$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$error = '';
$success = '';

function checkRequirement($condition, $message) {
    $icon = $condition ? '✅' : '❌';
    $class = $condition ? 'text-success' : 'text-danger';
    return "<li class='list-group-item d-flex justify-content-between align-items-center $class'>$icon $message</li>";
}

function sanitizeEnvContent($content) {
    $lines = explode("\n", $content);
    $sanitized = [];
    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || strpos($trimmed, '#') === 0) {
            $sanitized[] = $line;
            continue;
        }
        if (strpos($trimmed, '=') !== false) {
            $parts = explode('=', $trimmed, 2);
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            if (strpos($value, ' ') !== false && $value !== '') {
                $firstChar = substr($value, 0, 1);
                $lastChar = substr($value, -1);
                $alreadyQuoted = ($firstChar === '"' && $lastChar === '"') || ($firstChar === "'" && $lastChar === "'");
                if (!$alreadyQuoted) {
                    $value = '"' . $value . '"';
                }
            }
            $sanitized[] = $key . ' = ' . $value;
        } else {
            $sanitized[] = $line;
        }
    }
    return implode("\n", $sanitized);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $step == 2) {
    $baseUrl = rtrim($_POST['base_url'], '/') . '/';
    $dbHost = $_POST['db_host'];
    $dbName = $_POST['db_name'];
    $dbUser = $_POST['db_user'];
    $dbPass = $_POST['db_pass'];

    // 1. Tes Koneksi Database Awal
    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error = "Koneksi database gagal: " . $e->getMessage();
        $step = 2;
    }

    // 2. Proses Instalasi jika koneksi berhasil
    if (!$error) {
        if (!file_exists('.env.example')) {
            $error = "File .env.example tidak ditemukan. Pastikan paket rilis lengkap.";
        } else {
            $envContent = file_get_contents('.env.example');
            $envContent = preg_replace('/#\s*app\.baseURL\s*=\s*\'\'/', 'app.baseURL = \'' . $baseUrl . '\'', $envContent);
            $envContent = preg_replace('/app\.baseURL\s*=\s*\'.*?\'/', 'app.baseURL = \'' . $baseUrl . '\'', $envContent);
            $envContent = preg_replace('/#\s*database\.default\.hostname\s*=\s*.*/', 'database.default.hostname = ' . $dbHost, $envContent);
            $envContent = preg_replace('/database\.default\.hostname\s*=\s*.*/', 'database.default.hostname = ' . $dbHost, $envContent);
            $envContent = preg_replace('/#\s*database\.default\.database\s*=\s*.*/', 'database.default.database = ' . $dbName, $envContent);
            $envContent = preg_replace('/database\.default\.database\s*=\s*.*/', 'database.default.database = ' . $dbName, $envContent);
            $envContent = preg_replace('/#\s*database\.default\.username\s*=\s*.*/', 'database.default.username = ' . $dbUser, $envContent);
            $envContent = preg_replace('/database\.default\.username\s*=\s*.*/', 'database.default.username = ' . $dbUser, $envContent);
            $envContent = preg_replace('/#\s*database\.default\.password\s*=\s*.*/', 'database.default.password = ' . $dbPass, $envContent);
            $envContent = preg_replace('/database\.default\.password\s*=\s*.*/', 'database.default.password = ' . $dbPass, $envContent);
            $envContent = preg_replace('/#\s*database\.default\.DBDriver\s*=\s*.*/', 'database.default.DBDriver = MySQLi', $envContent);
            $envContent = preg_replace('/#\s*CI_ENVIRONMENT\s*=\s*.*/', 'CI_ENVIRONMENT = development', $envContent);
            
            $envContent = sanitizeEnvContent($envContent);

            if (file_put_contents('.env', $envContent) === false) {
                $error = "Gagal membuat file .env. Periksa hak akses folder root.";
            } else {
                // 3. Eksekusi File SQL menggunakan mysqli::multi_query (Metode Paling Aman)
                $sqlFile = __DIR__ . DIRECTORY_SEPARATOR . 'install.sql';
                $migrationMessage = "";

                if (file_exists($sqlFile)) {
                    try {
                        // Gunakan mysqli karena mendukung eksekusi multi-perintah sekaligus dengan parsing yang benar
                        $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
                        
                        if ($mysqli->connect_error) {
                            throw new Exception("Koneksi gagal: " . $mysqli->connect_error);
                        }

                        $sql = file_get_contents($sqlFile);
                        
                        // Eksekusi semua query sekaligus (mysqli akan menangani titik koma di dalam string dengan benar)
                        if ($mysqli->multi_query($sql)) {
                            do {
                                // Bersihkan hasil query untuk menghindari kebocoran memori
                                if ($result = $mysqli->store_result()) {
                                    $result->free();
                                }
                            } while ($mysqli->more_results() && $mysqli->next_result());
                        }
                        
                        // Cek apakah ada error selama proses multi_query
                        if ($mysqli->error) {
                            throw new Exception($mysqli->error);
                        }

                        $mysqli->close();
                        $migrationMessage = "✅ Database berhasil disiapkan secara otomatis.";
                    } catch (Exception $e) {
                        $migrationMessage = "⚠️ File .env berhasil dibuat, namun eksekusi SQL otomatis gagal. Silakan impor file <code>install.sql</code> secara manual melalui phpMyAdmin. (Detail: " . htmlspecialchars($e->getMessage()) . ")";
                    }
                } else {
                    $migrationMessage = "⚠️ File .env berhasil dibuat. Silakan impor file database (SQL) Anda secara manual melalui phpMyAdmin, atau tambahkan file <code>install.sql</code> di folder root untuk instalasi otomatis.";
                }

                $success = $migrationMessage;
                file_put_contents('install.lock', 'Installed on ' . date('Y-m-d H:i:s'));
                $step = 3;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalasi Rangkui</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; display: flex; align-items: center; padding: 2rem 0; }
        .installer-card { border: none; border-radius: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .installer-header { background: #0d6efd; color: white; padding: 2rem; text-align: center; }
        .installer-header h3 { margin: 0; font-weight: 600; }
        .installer-body { padding: 2rem; }
        .step-indicator { display: flex; justify-content: center; margin-bottom: 2rem; }
        .step-indicator .step { width: 40px; height: 40px; border-radius: 50%; background: #e9ecef; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #6c757d; margin: 0 10px; }
        .step-indicator .step.active { background: #0d6efd; color: white; }
        .step-indicator .step.done { background: #198754; color: white; }
        .step-indicator .line { flex: 1; height: 2px; background: #e9ecef; align-self: center; max-width: 50px; }
        .step-indicator .line.active { background: #0d6efd; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card installer-card">
                    <div class="installer-header">
                        <h3>Instalasi Rangkui</h3>
                        <p class="mb-0 mt-2 opacity-75">Setup Cepat &amp; Mudah</p>
                    </div>
                    <div class="installer-body">
                        <div class="step-indicator">
                            <div class="step <?= $step == 1 ? 'active' : ($step > 1 ? 'done' : '') ?>">1</div>
                            <div class="line <?= $step > 1 ? 'active' : '' ?>"></div>
                            <div class="step <?= $step == 2 ? 'active' : ($step > 2 ? 'done' : '') ?>">2</div>
                            <div class="line <?= $step > 2 ? 'active' : '' ?>"></div>
                            <div class="step <?= $step == 3 ? 'active' : '' ?>">3</div>
                        </div>

                        <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($error) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if ($step == 1): ?>
                            <h5 class="mb-3">Pemeriksaan Sistem</h5>
                            <ul class="list-group mb-4">
                                <?= checkRequirement(version_compare(PHP_VERSION, '8.1.0', '>='), 'PHP 8.1+ (Versi: ' . PHP_VERSION . ')') ?>
                                <?= checkRequirement(extension_loaded('intl'), 'Ekstensi intl') ?>
                                <?= checkRequirement(extension_loaded('mbstring'), 'Ekstensi mbstring') ?>
                                <?= checkRequirement(extension_loaded('pdo_mysql'), 'Ekstensi pdo_mysql') ?>
                                <?= checkRequirement(extension_loaded('mysqli'), 'Ekstensi mysqli (untuk impor database)') ?>
                                <?= checkRequirement(is_writable(__DIR__), 'Folder root dapat ditulis') ?>
                                <?= checkRequirement(is_writable('writable'), 'Folder writable dapat ditulis') ?>
                            </ul>
                            <a href="?step=2" class="btn btn-primary w-100 py-2" <?= (version_compare(PHP_VERSION, '8.1.0', '<') || !is_writable('writable')) ? 'disabled' : '' ?>>Lanjut ke Konfigurasi</a>

                        <?php elseif ($step == 2): ?>
                            <h5 class="mb-3">Konfigurasi Database</h5>
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Base URL Aplikasi</label>
                                    <input type="text" name="base_url" class="form-control" value="http://<?= $_SERVER['HTTP_HOST'] ?><?= str_replace('install.php', '', $_SERVER['REQUEST_URI']) ?>" required>
                                    <div class="form-text">Contoh: http://localhost/rangkui/ atau https://domainanda.com/</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Host Database</label>
                                        <input type="text" name="db_host" class="form-control" value="localhost" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Database</label>
                                        <input type="text" name="db_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="db_user" class="form-control" value="root" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="db_pass" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2">Proses Instalasi</button>
                            </form>
                            <a href="?step=1" class="btn btn-link w-100 mt-2 text-decoration-none">Kembali</a>

                        <?php elseif ($step == 3): ?>
                            <div class="text-center py-4">
                                <div class="mb-4" style="font-size: 4rem;">🎉</div>
                                <h4 class="text-success">Instalasi Berhasil!</h4>
                                <p class="text-muted mb-4"><?= $success ?></p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="public/" class="btn btn-primary px-4">Buka Aplikasi</a>
                                    <a href="public/admin" class="btn btn-outline-secondary px-4">Halaman Admin</a>
                                </div>
                                <p class="text-muted mt-4"><small>Installer telah dikunci otomatis demi keamanan.</small></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>