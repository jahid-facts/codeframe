<?php

use App\Services\Route;
use App\Controllers\DashboardController;
use App\Controllers\FrontendController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;

Route::get('/', [FrontendController::class, "index"], [AuthMiddleware::class]);
Route::get('/dashboard', [DashboardController::class, "index"]);
Route::get('/profile', [UserController::class, "index"], [AuthMiddleware::class]);
Route::get('/profile/{id}', [UserController::class, "show"], [AuthMiddleware::class]);
Route::post('/profile', [UserController::class, "store"], [AuthMiddleware::class]);
Route::put('/profile/{id}', [UserController::class, "update"], [AuthMiddleware::class]);
Route::patch('/profile/{id}', [UserController::class, "edit"], [AuthMiddleware::class]);
Route::delete('/profile/{id}', [UserController::class, "delete"], [AuthMiddleware::class]);
