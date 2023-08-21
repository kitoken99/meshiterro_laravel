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
Route::get('/users/sign_up', [\App\Http\Controllers\RegisterController::class, 'create'])
    ->middleware("guest")
    ->name('sign_up');

Route::post('/users/sign_up', [\App\Http\Controllers\RegisterController::class,'store'])
    ->middleware("guest");

Route::get('/users/sign_in', [\App\Http\Controllers\LoginController::class, 'index'])
    ->middleware("guest")
    ->name('sign_in');

Route::post('/users/sign_in', [\App\Http\Controllers\LoginController::class,'authenticate'])
    ->middleware("guest");

Route::get('users/sign_out', [\App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware("auth")
    ->name("sign_out");

Route::get('/', [\App\Http\Controllers\HomesController::class, 'top']);
