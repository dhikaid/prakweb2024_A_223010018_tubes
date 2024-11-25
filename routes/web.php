<?php

use App\Http\Controllers\ControllerAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
});


// route group for middleware guest
Route::group(['middleware' => 'guest'], function () {

    // LOGIN
    Route::get('/login', function () {
        return view('auth.login');
    })->middleware('guest')->name('login');
    Route::post('/login', [ControllerAuth::class, 'authenticate']);

    // REGISTER
    Route::get('/register', function () {
        return view('auth.register');
    });
    Route::post('/register', [ControllerAuth::class, 'store']);

    // LOGOUT
    Route::post('/logout', [ControllerAuth::class, 'logout']);

    // LUPA PASSWORD
    Route::get('/lupa-password', [PasswordController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/lupa-password', [PasswordController::class, 'sendResetLink'])->name('password.email');

    // RESET PASSWORD
    Route::get('/reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');
});
