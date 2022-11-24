<?php

use App\Http\Controllers\artikelController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ujkController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('artikel', artikelController::class);
    Route::resource('kategori', kategoriController::class);    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', userController::class);    
    Route::resource('ujk', ujkController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [berandaController::class, 'index']);

Route::get('/{id}', [berandaController::class, 'show'])->name('beranda.show');
