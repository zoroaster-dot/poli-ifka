<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\suplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\LaporanPembelianController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\LaporanBarangController;
use App\Http\Controllers\LaporanPengirimanController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/signup', [LoginController::class, 'signup'])->name('signup')->middleware('guest');
Route::post('/signup', [LoginController::class, 'signupStore'])->name('signup.store');
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function() { 
    
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/jadwal-periksa', [HomeController::class, 'jadwalperiksa'])->name('jadwalperiksa');
    Route::get('/memeriksa-pasien', [HomeController::class, 'memeriksapasien'])->name('memeriksapasien');
    Route::get('/riwayat-pasien', [HomeController::class, 'riwayatpasien'])->name('riwayatpasien');
    Route::get('/profil', [HomeController::class, 'profil'])->name('profil');

    Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');
    Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');
    Route::get('/poli', [HomeController::class, 'poli'])->name('poli');
    Route::get('/obat', [HomeController::class, 'obat'])->name('obat');

});