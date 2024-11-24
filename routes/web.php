<?php

use App\Http\Controllers\ControllerAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [ControllerAuth::class, 'authenticate']);

// Log out
Route::post('/logout', [ControllerAuth::class, 'logout']);

// Register
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [ControllerAuth::class, 'store']);

// Reset password
Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

// lupa password
Route::get('/lupa-password', function () {
    return view('auth.lupa-password');
});
