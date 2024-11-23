<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/lupa-password', [PasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/lupa-password', [PasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');

