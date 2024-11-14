<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/regist', function () {
    return view('regist');
});

Route::get('/reset-password', function () {
    return view('reset-password');
});

Route::get('/lupa-password', function () {
    return view('lupa-password');
});
