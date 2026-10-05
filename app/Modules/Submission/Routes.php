<?php

$routes->group('unggah', ['namespace' => 'App\Modules\Submission\Controllers'], function ($routes) {
    // Public submission
    $routes->get('', 'SubmissionController::index');
    $routes->post('proses', 'SubmissionController::proses');
    $routes->get('sukses', 'SubmissionController::sukses');
});

$routes->group('submission/admin', ['namespace' => 'App\Modules\Submission\Controllers'], function ($routes) {
    // Admin dashboard
    $routes->get('dashboard', 'AdminDashboard::index');
    $routes->get('approve/(:num)', 'AdminDashboard::approve/$1');
    $routes->post('reject/(:num)', 'AdminDashboard::reject/$1');
    $routes->post('request-revisi/(:num)', 'AdminDashboard::requestRevisi/$1');
});