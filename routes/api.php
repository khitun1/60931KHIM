<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/hallPicture', [\App\Http\Controllers\HallControllerApi::class, 'store']);

});

Route::get('/hall', [\App\Http\Controllers\HallControllerApi::class, 'index']);
Route::get('/hall_total', [\App\Http\Controllers\HallControllerApi::class, 'total']);
Route::get('/hall/{id}', [\App\Http\Controllers\HallControllerApi::class, 'show']);
Route::get('/film', [\App\Http\Controllers\FilmControllerApi::class, 'index']);
Route::get('/film_total', [\App\Http\Controllers\FilmControllerApi::class, 'total']);
Route::get('/place', [\App\Http\Controllers\PlaceControllerApi::class, 'index']);
Route::get('/place/{id}', [\App\Http\Controllers\PlaceControllerApi::class, 'show']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
