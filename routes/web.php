<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ServiceAPIController;

//ROUTE HOME
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{location}', [HomeController::class, 'index'])->name('home.location');

// SERVICES API
Route::prefix('service/api')->group(function () {
    Route::get('/getcity', [ServiceAPIController::class, 'getCity']);
});


// route group for middleware guest
Route::group(['middleware' => 'guest'], function () {

    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);

    // REGISTER
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    // LUPA PASSWORD
    Route::get('/lupa-password', [PasswordController::class, 'showForgetPassword'])->name('password.request');
    Route::post('/lupa-password', [PasswordController::class, 'sendResetLink'])->name('password.email');

    // RESET PASSWORD
    Route::get('/reset-password/{token}', [PasswordController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');

    // Google Login
    Route::post('/auth/google/redirect', [OauthController::class, 'redirectGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [OauthController::class, 'callbackGoogle']);

    // DiAKun Login
    Route::post('/auth/diakun/redirect', [OauthController::class, 'redirectDiakun'])->name('auth.diakun');
    Route::get('/auth/diakun/callback/{token}', [OauthController::class, 'callbackDiakun']);
});


// Route Group for Middleware Auth
route::group(['middleware' => 'auth'], function () {

    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout']);
});

// ROUTE EVENT DETAILS
Route::get('/events/{id}', [EventController::class, 'showEventDetails'])->name('events.show');
// Route::get('/main/event-details/{id}', [EventController::class, 'showEventDetails'])->name('events.show');

// ROUTE SEARCH
Route::get('/search', [SearchController::class, 'search'])->name('search');
