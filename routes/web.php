<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| AUTHENTIKASI (Login/Register)
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Halaman Register (opsional)
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| MANAJEMEN USER
|--------------------------------------------------------------------------
*/

Route::resource('user', UserController::class);

/*
|--------------------------------------------------------------------------
| MANAJEMEN MAHASISWA
|--------------------------------------------------------------------------
*/

Route::resource('mahasiswa', MahasiswaController::class);

/*
|--------------------------------------------------------------------------
| MANAJEMEN DOSEN
|--------------------------------------------------------------------------
*/

Route::resource('dosen', DosenController::class);

/*
|--------------------------------------------------------------------------
| MANAJEMEN PRODI
|--------------------------------------------------------------------------
*/

Route::resource('prodi', ProdiController::class);

/*
|--------------------------------------------------------------------------
| MANAJEMEN MATA KULIAH
|--------------------------------------------------------------------------
*/

Route::resource('matakuliah', MatakuliahController::class);

/*
|--------------------------------------------------------------------------
| MANAJEMEN KELAS
|--------------------------------------------------------------------------
*/

Route::resource('kelas', KelasController::class);

/*
|--------------------------------------------------------------------------
| JADWAL PERKULIAHAN
|--------------------------------------------------------------------------
*/

Route::resource('jadwal', JadwalController::class);

/*
|--------------------------------------------------------------------------
| KRS (Kartu Rencana Studi)
|--------------------------------------------------------------------------
*/

Route::resource('krs', KRSController::class);

/*
|--------------------------------------------------------------------------
| ABSENSI MAHASISWA
|--------------------------------------------------------------------------
*/

Route::resource('absensi', AbsensiController::class);

/*
|--------------------------------------------------------------------------
| KHS (Kartu Hasil Studi)
|--------------------------------------------------------------------------
*/

Route::resource('khs', KHSController::class);

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect('/dashboard'));
