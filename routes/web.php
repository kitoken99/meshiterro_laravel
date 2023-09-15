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
Route::get('/', [\App\Http\Controllers\HomesController::class, 'top']);
Route::get('/about', [\App\Http\Controllers\HomesController::class, 'about']);

Route::group(['middleware' => 'guest'], function(){
  Route::get('/users/sign_up', [\App\Http\Controllers\RegisterController::class, 'create'])
    ->name('sign_up');

  Route::post('/users/sign_up', [\App\Http\Controllers\RegisterController::class,'store']);

  Route::get('/users/sign_in', [\App\Http\Controllers\LoginController::class, 'index'])
  ->name('sign_in');

  Route::post('/users/sign_in', [\App\Http\Controllers\LoginController::class,'authenticate']);
});

Route::group(['middleware' => 'auth'], function(){
  Route::get('users/sign_out', [\App\Http\Controllers\LoginController::class, 'logout'])
      ->name("sign_out");

  Route::get('post_images', [\App\Http\Controllers\PostImagesController::class, 'index']);
  Route::get('post_image/new', [\App\Http\Controllers\PostImagesController::class, 'new']);
  Route::get('post_image/{id}', [\App\Http\Controllers\PostImagesController::class, 'show']);
  Route::post('post_image/store', [\App\Http\Controllers\PostImagesController::class, 'store']);
  Route::post('post_image/{id}', [\App\Http\Controllers\PostImagesController::class, 'destroy']);

  Route::get('user/{id}', [\App\Http\Controllers\UsersController::class, 'show']);
  Route::get('user/edit/{id}', [\App\Http\Controllers\UsersController::class, 'edit']);
  Route::post('user/{id}', [\App\Http\Controllers\UsersController::class, 'update']);

  Route::post('post_image/{id}/post_comments', [\App\Http\Controllers\PostCommentsController::class, 'create']);
  Route::post('post_image/{id}/favorites/create', [\App\Http\Controllers\FavoritesController::class, 'create']);
  Route::post('post_image/{id}/favorites/destroy', [\App\Http\Controllers\FavoritesController::class, 'destroy']);
});
