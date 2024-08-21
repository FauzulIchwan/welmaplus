<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuUtamaController;
use App\Http\Controllers\MenuWelmaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuObligasiController;
use App\Http\Controllers\MenuPortofolioController;

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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
  Route::resource('menu', MenuUtamaController::class);
  Route::resource('admin', AdminController::class);
  Route::resource('welma', MenuWelmaController::class);
  Route::resource('obligasi', MenuObligasiController::class);
  Route::resource('portofolio', menuPortofolioController::class);
  Route::get('obligasi/{id}/konfirmasi', [MenuObligasiController::class, 'konfirmasi'])->name('obligasi.konfirmasi');
  Route::get('obligasi/{id}/verifikasi', [MenuObligasiController::class, 'verifikasi'])->name('obligasi.verifikasi');
  Route::get('order/{id}', [MenuObligasiController::class, 'detailorder'])->name('detailorder');
  Route::post('/check-pin', [MenuObligasiController::class, 'checkPin'])->name('check.pin');
  Route::post('/change-status/{id}/{status}', [AdminController::class, 'changestatus'])->name('changeStatus');
});