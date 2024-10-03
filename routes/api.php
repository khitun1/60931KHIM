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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hall', [\App\Http\Controllers\HallControllerApi::class, 'index']);
Route::get('/hall/{id}', [\App\Http\Controllers\HallControllerApi::class, 'show']);
Route::get('/film', [\App\Http\Controllers\FilmControllerApi::class, 'index']);
Route::get('/place', [\App\Http\Controllers\PlaceControllerApi::class, 'index']);
Route::get('/place/{id}', [\App\Http\Controllers\PlaceControllerApi::class, 'show']);
