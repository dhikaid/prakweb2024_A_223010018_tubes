<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiCreatorEventController;


Route::prefix('/events')->group(function () {
    Route::get('/', [ApiEventController::class, 'index']);
    Route::get('/search', [ApiEventController::class, 'search']);
    Route::get('/{event:slug}', [ApiEventController::class, 'detail']);
});
Route::prefix('/event-organizers')->group(function () {
    Route::get('/', [ApiCreatorEventController::class, 'index']);
    Route::get('/{user:username}', [ApiCreatorEventController::class, 'show']);
});
