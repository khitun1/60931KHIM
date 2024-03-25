<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/films', [\App\Http\Controllers\FilmController::class, 'index']);
Route::get('/films/{id}', [\App\Http\Controllers\FilmController::class, 'show']);
Route::get('/sessions', [\App\Http\Controllers\SessionController::class, 'index']);
Route::get('/hall/{id}', [\App\Http\Controllers\HallController::class, 'show']);
Route::get('/session/create', [\App\Http\Controllers\SessionController::class, 'create'])->middleware('auth');
Route::post('/session', [\App\Http\Controllers\SessionController::class, 'store']);
Route::get('/session/edit/{id}', [\App\Http\Controllers\SessionController::class, 'edit'])->middleware('auth');
Route::post('/session/update/{id}', [\App\Http\Controllers\SessionController::class, 'update'])->middleware('auth');
Route::get('/session/destroy/{id}', [\App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
