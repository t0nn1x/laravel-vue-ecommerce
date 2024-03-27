<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::middleware(Admin::class)->group(function () {
            Route::get('/user', [AuthController::class, 'getUser']);
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::apiResource('/proudct', ProductController::class);
        });
    });

Route::post('/login', [AuthController::class, 'login']);
