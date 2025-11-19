<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PerubahanGajiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/data-pokok-pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::post('/data-pokok-pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/data-pokok-pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');

    Route::get('/data-perubahan-gaji', [PerubahanGajiController::class, 'index'])->name('perubahan-gaji.index');
    Route::get('/data-perubahan-gaji/create', [PerubahanGajiController::class, 'create'])->name('perubahan-gaji.create');
    Route::post('/data-perubahan-gaji', [PerubahanGajiController::class, 'store'])->name('perubahan-gaji.store');

    Route::resource('user', UserController::class);
    Route::resource('golongan', GolonganController::class);

    Route::get('search-pegawai-by-tahun-bulan', [PegawaiController::class, 'searchPegawaiByTahunBulan'])->name('search.pegawai.by.tahun-bulan');
    Route::get('get-pegawai-bulan-lalu-bulan-ini', [PegawaiController::class, 'getPegawaiBulanLaluBulanIni'])->name('get.pegawai.bulan-lalu.bulan-ini');
    Route::get('get-pangkat-by-jenis-pegawai', [ApiController::class, 'getPangkatByJenisPegawai'])->name('get.pangkat.by.jenis-pegawai');
    Route::get('get-masa-by-kode-golongan', [ApiController::class, 'getMasaByKodeGolongan'])->name('get.masa.by.kode-golongan');
    Route::get('get-kelompok-fungsional', [ApiController::class, 'getKelompokFungsional'])->name('get.kelompok-fungsional');
    Route::get('get-struktural', [ApiController::class, 'getStruktural'])->name('get.struktural');
    Route::get('get-sertifikasi', [ApiController::class, 'getSertifikasi'])->name('get.sertifikasi');
    Route::get('get-jabatan-fungsional-by-kelompok-fungsional', [ApiController::class, 'getJabatanFungsionalByKelompokFungsional'])->name('get.jabatan-fungsional.by.kelompok-fungsional');
});



require __DIR__ . '/auth.php';
