<?php

$routes->group('unggah', ['namespace' => 'App\Modules\Submission\Controllers'], function ($routes) {
    // Public submission
    $routes->get('', 'SubmissionController::index');
    $routes->post('proses', 'SubmissionController::proses', ['filter' => 'csrf']);
    $routes->get('sukses', 'SubmissionController::sukses');
});

$routes->group('submission/admin', ['namespace' => 'App\Modules\Submission\Controllers', 'filter' => 'auth'], function ($routes) {
    // Admin dashboard
    $routes->get('dashboard', 'AdminDashboard::index');
    $routes->post('approve/(:num)', 'AdminDashboard::approve/$1', ['filter' => 'csrf']);
    $routes->post('reject/(:num)', 'AdminDashboard::reject/$1', ['filter' => 'csrf']);
    $routes->post('request-revisi/(:num)', 'AdminDashboard::requestRevisi/$1', ['filter' => 'csrf']);
});