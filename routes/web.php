<?php

use App\Services\Route;
use App\Controllers\DashboardController;
use App\Controllers\FrontendController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;

Route::get('/', [FrontendController::class, "index"], [AuthMiddleware::class]);
Route::get('/profile', [UserController::class, "index"], [AuthMiddleware::class]);
Route::get('/profile/{id}', [UserController::class, "show"], [AuthMiddleware::class]);
Route::get('/dashboard', [DashboardController::class, "index"]);
