<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceAPIController;
use App\Http\Controllers\DashboardRolesController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardEventsController;
use App\Http\Controllers\DashboardCategoriesController;

// SERVICES API
Route::prefix('service/api')->group(function () {
    Route::get('/getcity', [ServiceAPIController::class, 'getCity']);

    Route::post('/ticket/{ticket:uuid}', [ServiceAPIController::class, 'addTicket'])->middleware('auth');
    Route::get('/ticket/{ticket:uuid}', [ServiceAPIController::class, 'checkTicket'])->middleware('auth');

    Route::post('/transaction/{event:slug}', [PaymentController::class, 'createCharge']);
    Route::post('/transaction/{event:slug}/pay', [PaymentController::class, 'createPay']);

    Route::get('/search', [ServiceAPIController::class, 'searchEvent']);
    Route::post('/api/complete-queue-on-close/{queueUuid}', [QueueController::class, 'completeQueueOnClose']);
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
    //PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update-general', [ProfileController::class, 'updateGeneral'])->name('profile.update.general');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/changerole', [ProfileController::class, 'updateRole'])->name('profile.update.role');
    Route::get('/event/{event:slug}/tickets', [HomeController::class, 'showTicket'])->name('ticket');
    Route::get('/tickets/{payment:uuid}', [TicketController::class, 'index']);
    Route::get('/event/{event:slug}/war', [QueueController::class, 'showWar'])->middleware('war')->name('war');
    Route::post('/event/{event:slug}/war', [QueueController::class, 'postWar'])->middleware(['war', 'waropen'])->name('war');
    Route::get('/event/{event:slug}/queue', [QueueController::class, 'showQueue'])->middleware(['queue', 'waropen'])->name('queue');
    Route::get('/event/{event:slug}/start', [QueueController::class, 'startWar'])->name('start');
    // LOGOUT
    Route::POST('/logout', [AuthController::class, 'logout']);
    // TRANSACTION
    Route::get('/transaction/{payment:uuid}', [PaymentController::class, 'showTransaction']);
});


// DASHBOARD
Route::prefix('dashboard')->middleware(['auth', 'isEOAdmin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::middleware('isAdmin')->group(function () {
        Route::resource('users', DashboardUsersController::class);
        Route::resource('roles', DashboardRolesController::class);
        Route::resource('categories', DashboardCategoriesController::class);
    });
    Route::resource('events', DashboardEventsController::class);
    Route::prefix('events')->group(function () {
        Route::get('{event:uuid}/tickets/create', [DashboardEventsController::class, 'showCreateTicket']);
        Route::post('{event:uuid}/tickets', [DashboardEventsController::class, 'createTicket']);
        Route::get('{event:uuid}/tickets/{ticket:uuid}/edit', [DashboardEventsController::class, 'showEditTicket']);
        Route::put('{event:uuid}/tickets/{ticket:uuid}', [DashboardEventsController::class, 'editTicket']);
        Route::delete('{event:uuid}/tickets/{ticket:uuid}', [DashboardEventsController::class, 'deleteTicket']);
    });
});


//ALL ACCESS
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/callbackmidtrans', [PaymentController::class, 'callbackMidtrans']);
Route::get('/events/{id}', [EventController::class, 'showEventDetails'])->name('events.show');
Route::get('/creators', [HomeController::class, 'showCreators']);
Route::get('/creator/{user:username}', [HomeController::class, 'showDetailCreator']);
Route::get('/events', [HomeController::class, 'showLatestEvent']);
Route::get('/events/{location}', [HomeController::class, 'showLocationEvent']);
Route::get('/search', [HomeController::class, 'showSearch'])->name('search');
Route::get('/event/{event:slug}', [HomeController::class, 'showDetail'])->name('detail');
Route::get('/{location}', [HomeController::class, 'index'])->name('home.location');
