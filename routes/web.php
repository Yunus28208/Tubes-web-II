<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;

Route::get('/',[AuthController::class, 'register'])->name('register');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
Route::prefix('dosen')->name('dosen.')->middleware(['auth', 'role:dosen'])->group(function () {
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
        Route::get('/khs/create', [KHSController::class, 'create'])->name('khs.create');
        Route::post('/khs/store', [KHSController::class, 'store'])->name('khs.store');
        Route::get('/khs', [KHSController::class, 'index'])->name('khs.index');
        
        // Absensi
        Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
        Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
        Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::get('/absensi/{kelas_id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
        Route::put('/absensi', [AbsensiController::class, 'update'])->name('absensi.update');
        
        Route::get('/profile', [ProfileController::class, 'dosen'])->name('profile.index');
    });
    
Route::prefix('mahasiswa')->name('mahasiswa.')->middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/krs', [KRSController::class, 'index'])->name('krs.index');
    Route::get('/krs/create', [KRSController::class, 'create'])->name('krs.create');
    Route::post('/krs', [KRSController::class, 'store'])->name('krs.store');
    Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');

    Route::get('/khs/nilaiSaya', [KHSController::class, 'nilaiMahasiswa'])->name('khs.nilaiMahasiswa');

    Route::get('/profile', [ProfileController::class, 'mahasiswa'])->name('profile.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

    // Mata Kuliah
    Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('/matakuliah/{id}', [MataKuliahController::class, 'show'])->name('matakuliah.show');
    Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

    // Jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // Prodi
    Route::get('/prodi', [ProdiController::class, 'index'])->name('admin.prodi.index');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('admin.prodi.create');
    Route::post('/prodi', [ProdiController::class, 'store'])->name('admin.prodi.store');
    Route::get('/prodi/{id}', [ProdiController::class, 'show'])->name('admin.prodi.show');
    Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('admin.prodi.edit');
    Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('admin.prodi.update');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('admin.prodi.destroy');

    // Fakultas
    Route::get('/fakultas', [FakultasController::class, 'index'])->name('admin.fakultas.index');
    Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('admin.fakultas.create');
    Route::post('/fakultas', [FakultasController::class, 'store'])->name('admin.fakultas.store');
    Route::get('/fakultas/{id}', [FakultasController::class, 'show'])->name('admin.fakultas.show');
    Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit'])->name('admin.fakultas.edit');
    Route::put('/fakultas/{id}', [FakultasController::class, 'update'])->name('admin.fakultas.update');
    Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy'])->name('admin.fakultas.destroy');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // KRS
    Route::get('/listKrs', [KRSController::class, 'index'])->name('krs.index');
    Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');

    // KHS

    Route::get('/profile/admin', [ProfileController::class, 'admin'])->name('profile.admin.index');
});