<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

Route::get('/lupa-password', function () {
    return view('auth.lupa-password');
});
