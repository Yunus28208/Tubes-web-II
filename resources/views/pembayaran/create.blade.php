@extends('layouts.app')

@section('content')
<div class="flex-1 bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 min-h-screen rounded-r-xl flex items-center justify-center">

    <div class="bg-transparent flex flex-col md:flex-row gap-10 w-full max-w-5xl items-center">
        
        <!-- Form Section -->
        <form action="#" method="POST" class="flex-1 space-y-6">
            @csrf
            <h2 class="text-3xl font-bold mb-6">Tambah Pembayaran</h2>

            <input type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" class="w-full px-6 py-3 rounded-full text-gray-900 placeholder:text-gray-500">

            <select name="jenis" class="w-full px-6 py-3 rounded-full text-gray-900">
                <option value="">-- Jenis Pembayaran --</option>
                <option>SPP</option>
                <option>Ujian Tengah</option>
                <option>KKN</option>
                <option>Praktikum</option>
            </select>

            <input type="number" name="nominal" placeholder="Nominal (Rp)" class="w-full px-6 py-3 rounded-full text-gray-900 placeholder:text-gray-500">

            <input type="text" name="semester" placeholder="Semester / Bulan" class="w-full px-6 py-3 rounded-full text-gray-900 placeholder:text-gray-500">

            <select name="status" class="w-full px-6 py-3 rounded-full text-gray-900">
                <option value="Lunas">Lunas</option>
                <option value="Belum">Belum</option>
            </select>

            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-10 py-3 rounded-full font-semibold">
                Tambahkan
            </button>
        </form>

        <!-- Image -->
        <div class="flex-1">
            <img src="{{ asset('storage/mahasiswa-group.png') }}" alt="Mahasiswa" class="rounded-xl w-full max-w-md">
        </div>
    </div>
</div>
@endsection
