<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KelolaPesananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('index');
});

Route::get('/menu', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('index');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
  
Route::get('/','App\Http\Controllers\HomeController@home');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');

Route::get('/kelola-pesanan', [KelolaPesananController::class, 'index'])->name('kelola-pesanan');
Route::get('/tambah-pesanan', [KelolaPesananController::class, 'tambah'])->name('tambah-pesanan');
Route::post('/kelola-pesanan/add', [KelolaPesananController::class, 'store'])->name('kelola-pesanan.store');
Route::get('/kelola-pesanan/{pesanan}/edit', [KelolaPesananController::class, 'edit'])->name('kelola-pesanan.edit');
Route::put('/kelola-pesanan/{pesanan}', [KelolaPesananController::class, 'update'])->name('kelola-pesanan.update');
Route::delete('/kelola-pesanan/{pesanan}', [KelolaPesananController::class, 'destroy'])->name('kelola-pesanan.destroy');
Route::patch('/kelola-pesanan/{id}/update-payment-status', [KelolaPesananController::class, 'updatePaymentStatus'])->name('kelola-pesanan.update-payment-status');

Route::resource('blog', BlogController::class);