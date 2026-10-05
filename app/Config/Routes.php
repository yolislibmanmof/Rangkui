<?php

use App\Modules\Login\Controllers\Login;
use App\Controllers\InstallController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===== 🌲 EMERALD FOREST: Installer Routes =====
// Aktif HANYA saat folder admin/ masih ada (belum install)
// Setelah install selesai, folder admin/ dihapus otomatis → blok ini non-aktif
if (file_exists(ROOTPATH . 'admin/conf.inc.php')) {
    $routes->get('/', [InstallController::class, 'install']);
    $routes->get('install/fresh', [InstallController::class, 'fresh']);
    $routes->post('install/fresh', [InstallController::class, 'fresh']);
    $routes->get('install/upgrade', [InstallController::class, 'upgrade']);
    $routes->post('install/upgrade', [InstallController::class, 'upgrade']);
    $routes->get('install/type-installation', [InstallController::class, 'type']);
    $routes->post('install/process', [InstallController::class, 'process']);
    
    // Stop loading routes aplikasi normal saat installer aktif
    return;
}

// ===== 🌲 Routes Aplikasi Normal =====

/**
 * Route untuk Login & Logout
 */
$routes->get('login', [Login::class, 'index']);
$routes->post('login/auth', [Login::class, 'login']);
$routes->get('logout', [Login::class, 'logout']);

/**
 * OAI PMH
 */
$routes->get('oai', 'OaiPmhController::index');
$routes->get('persetujuan/(:segment)', '\App\Modules\Bibliography\Controllers\ApprovalController::approvePublic/$1');
$routes->post('persetujuan/act', '\App\Modules\Bibliography\Controllers\ApprovalController::actPublic');
$routes->get('information', "\App\Modules\info\Controllers\InfoController::index");

$routes->setTranslateURIDashes(true);

// Route home - gunakan controller Beranda secara langsung
$routes->get('/', '\App\Modules\Beranda\Controllers\BerandaController::index');

// Directory for modules
$modulesPath = APPPATH . 'Modules/';

// Debug: Print path and check if directory exists
if (!is_dir($modulesPath)) {
    die('Modules directory does not exist: ' . $modulesPath);
}

$dirs = scandir($modulesPath);
foreach ($dirs as $module) {
    if ($module === '.' || $module === '..' || !is_dir($modulesPath . $module)) {
        continue;
    }

    $routesFile = $modulesPath . $module . '/Routes.php';
    if (file_exists($routesFile)) {
        include $routesFile;
    }
}

// ===== 🌲 ROUTE UNGGAH MANDIRI (PUBLIK) =====
$routes->get('unggah', '\App\Modules\Submission\Controllers\SubmissionController::index');
$routes->post('unggah/proses', '\App\Modules\Submission\Controllers\SubmissionController::proses');
$routes->get('unggah/sukses', '\App\Modules\Submission\Controllers\SubmissionController::sukses'); 
$routes->post('submission/extract-ai', '\App\Modules\Submission\Controllers\SubmissionController::extract_ai');

// Dashboard Submission Admin
$routes->get('submission/dashboard', '\App\Modules\Submission\Controllers\AdminDashboard::index');
$routes->get('submission/approve/(:num)', '\App\Modules\Submission\Controllers\AdminDashboard::approve/$1');
$routes->post('submission/reject/(:num)', '\App\Modules\Submission\Controllers\AdminDashboard::reject/$1');
$routes->post('submission/requestRevisi/(:num)', '\App\Modules\Submission\Controllers\AdminDashboard::requestRevisi/$1');
$routes->post('admin-dashboard/delete/(:num)', '\App\Modules\Submission\Controllers\AdminDashboard::delete/$1');