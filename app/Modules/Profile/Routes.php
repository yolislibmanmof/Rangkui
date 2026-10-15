<?php

$routes->group('profile', ['namespace' => 'App\Modules\Profile\Controllers'], function ($routes) {
    $routes->get('/', 'ProfileController::index');
    $routes->post('save', 'ProfileController::save', ['filter' => 'csrf']);
    $routes->post('upload-avatar', 'ProfileController::uploadAvatar', ['filter' => 'csrf']);

});
