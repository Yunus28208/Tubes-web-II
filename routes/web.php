<?php

use Illuminate\Support\Facades\Route;


// Login
Route::get('/login', function () {
    return view('auth.login');
});

// Register
Route::get('/register', function () {
    return view('auth.register');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Mahasiswa
Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
});
Route::get('/mahasiswa/tambah', function () {
    return view('mahasiswa.create');
});
Route::get('/mahasiswa/edit/{id}', function ($id) {
    return view('mahasiswa.edit', ['id' => $id]);
});

// Kelas
Route::get('/kelas', function () {
    return view('kelas.index');
});
Route::get('/kelas/tambah', function () {
    return view('kelas.create');
});
Route::get('/kelas/edit/{id}', function ($id) {
    return view('kelas.edit', ['id' => $id]);
});

// Nilai
Route::get('/nilai', function () {
    return view('nilai.index');
});

// Pembayaran
Route::get('/pembayaran', function () {
    return view('pembayaran.index');
});
Route::get('/pembayaran/tambah', function () {
    return view('pembayaran.create');
});
Route::get('/pembayaran/edit/{id}', function ($id) {
    return view('pembayaran.edit', ['id' => $id]);
});






