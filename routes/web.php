<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Rutas de los controladores

Route::resource("images", \App\Http\Controllers\ImageController::class)
->middleware("auth");

Route::get('user-index', [\App\Http\Controllers\ImageController::class, 'user_index'])->name('user-index');

Route::resource("likes", \App\Http\Controllers\LikeController::class)
->middleware("auth");

//rutas de ajax post y get

Route::post('store', [\App\Http\Controllers\LikeController::class, 'store'])->name('like.store');
Route::post('destroy', [\App\Http\Controllers\LikeController::class, 'destroy'])->name('like.destroy');