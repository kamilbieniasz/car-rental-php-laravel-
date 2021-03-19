<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);

Route::get('cars', [CarController::class, 'getAllCars']);

Route::post('register', [UserController::class, 'register']);

Route::post('reservation', [ReservationController::class, 'addReservation']);

Route::post('reservations', [ReservationController::class, 'getUserReservation']);

//Route::delete('reservation/delete', [ReservationController::class, 'deleteUserReservation']);

Route::delete('reservation/{id}',  [ReservationController::class, 'deleteUserReservation']);

Route::post('admin/login', [UserController::class, 'adminLogin']);

