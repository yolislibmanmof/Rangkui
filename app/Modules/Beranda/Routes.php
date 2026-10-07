<?php

use App\Modules\Beranda\Controllers\BerandaController;

$routes->group('beranda', ['namespace' => 'App\Modules\Beranda\Controllers'], function ($routes) {
    // Beranda publik
    $routes->get('/', [BerandaController::class, 'index']);

    // Detail dokumen (menerima ID ter-enkripsi maupun numerik polos)
    // (:any) DIPERTAHANKAN — aman untuk ID enkripsi legacy ber-format base64/urlencode
    $routes->get('detail/(:any)', 'BerandaController::detail/$1');

    // ✅ FIX: Alias legacy — method detail_plain() TIDAK ADA di controller.
    // Diarahkan ke detail() agar link lama / cache JS lama tidak memicu 404 fatal.
    $routes->get('detail-plain/(:num)', 'BerandaController::detail/$1');

    // Pencarian & profil penulis
    $routes->get('search', 'BerandaController::search');
    $routes->get('author/(:num)', 'BerandaController::author/$1');

    // Galaksi Riset (visualisasi jaringan)
    $routes->get('galaxy', 'BerandaController::galaxy');
    $routes->get('galaxy/data', 'BerandaController::galaxy_json');

    // Rak Virtual 3D
    $routes->get('rak', 'BerandaController::rak');
    $routes->get('rak/data', 'BerandaController::rak_json');

    // ===== RANGKUI AI v3.0 — HYBRID INTELLIGENCE =====
    $routes->get('ai', 'BerandaController::ai');
    $routes->get('ai/chat', 'BerandaController::ai_chat');   
    $routes->post('ai/chat', 'BerandaController::ai_chat');  
    $routes->get('ai/models', 'BerandaController::ai_models');  

    // Counter unduhan dokumen
    $routes->post('counting', 'BerandaController::counting');
});