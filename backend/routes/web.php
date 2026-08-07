<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;

return function ($router) {

    $router->get(
        '/',
        [HomeController::class, 'index']
    );

    $router->get(
        '/admin/login',
        [LoginController::class, 'index']
    )->middleware('guest');

    $router->post(
        '/admin/login',
        [LoginController::class, 'login']
    )->middleware('guest');

    $router->get(
        '/admin/dashboard',
        [DashboardController::class, 'index']
    )->middleware('auth');

    $router->post(
        '/admin/logout',
        [LoginController::class, 'logout']
    )->middleware('auth');

};