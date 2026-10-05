<?php

$routes->group('login', ['namespace' => 'App\Modules\Login\Controllers'], function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->post('auth', 'Login::login');
    $routes->get('logout', 'Login::logout');

    // ===== FITUR: Login Anggota Publik =====
    $routes->get('anggota', 'Anggota::index');
    $routes->post('anggota', 'Anggota::auth');
    $routes->get('anggota/logout', 'Anggota::logout');
    $routes->get('anggota/profil', 'Anggota::profil');
});

// ===== FITUR: Pendaftaran Anggota Online (URL publik bersih: /daftar) =====
$routes->group('daftar', ['namespace' => 'App\Modules\Login\Controllers'], function ($routes) {
    $routes->get('/', 'Register::index');
    $routes->get('cek', 'Register::cek');
    $routes->get('sukses', 'Register::sukses');
    $routes->post('/', 'Register::save');
});