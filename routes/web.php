<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImageController;
use \App\Http\Controllers\LikeController;
use \App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Rutas de los controladores

Route::resource("images", ImageController::class)
->middleware("auth");

Route::resource("users", UserController::class)
->middleware("auth");

Route::get('user-index', [ImageController::class, 'user_index'])->name('user-index');

Route::resource("likes", LikeController::class)
->middleware("auth");

//rutas de ajax post y get

Route::post('store', [LikeController::class, 'store'])->name('like.store');
Route::post('destroy', [LikeController::class, 'destroy'])->name('like.destroy');