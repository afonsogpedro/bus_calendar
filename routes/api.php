<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CalendarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(function () {
    //Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);

    // passport auth api
    Route::middleware(['auth:api'])->group(function () {
        Route::get('/', [UserController::class, 'user']);
        Route::get('logout', [UserController::class, 'logout']);
        // todos resource route
        //Route::resource('todos', TodoController::class);
    });
});
Route::prefix('bus')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('reservations', [ReservationController::class, 'getReservation']);
        Route::get('disableddays', [CalendarController::class, 'getDisabledDays']);
    });
});
