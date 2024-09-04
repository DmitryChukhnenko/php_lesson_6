<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('main', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
})->name('main');

Route::get('/about', function () {
    return view('about', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
})->middleware('auth');
Route::get('/contact', function () {
    return view('contact', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
});
Route::get('/service', function () {
    return view('service', ['phone' => config('top.phone'), 'menu' => config('top.menu')]);
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'post'])->name('login.post');