<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('post', [PostController::class, 'index']);
});

Route::post('login', [ApiLoginController::class, 'login']);