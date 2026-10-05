<?php

use App\Modules\Beranda\Controllers\BerandaController;

$routes->group('beranda', ['namespace' => 'App\Modules\Beranda\Controllers'], function ($routes) {
    $routes->get('/', [BerandaController::class, 'index']);
    $routes->get('detail/(:any)', 'BerandaController::detail/$1');
    $routes->get('detail-plain/(:num)', 'BerandaController::detail_plain/$1');
    $routes->get('search', 'BerandaController::search');
    $routes->get('author/(:num)', 'BerandaController::author/$1');
    $routes->get('galaxy', 'BerandaController::galaxy');
    $routes->get('galaxy/data', 'BerandaController::galaxy_json');
    $routes->get('rak', 'BerandaController::rak');
    $routes->get('rak/data', 'BerandaController::rak_json');
    $routes->get('ai', 'BerandaController::ai');
    $routes->get('ai/chat', 'BerandaController::ai_chat');
    $routes->post('ai/chat', 'BerandaController::ai_chat');
    $routes->post('counting', 'BerandaController::counting');
});