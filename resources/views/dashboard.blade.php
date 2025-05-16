@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-10 flex flex-col justify-between rounded-r-xl">

    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold mb-2">Selamat Datang, [ <span class="text-white font-bold">Yunus</span> ]</h1>
        <p class="text-sm text-gray-300 mb-6">Tahun ajaran 2025/2026</p>

        <div class="flex flex-wrap gap-4 mb-6">
            <button class="bg-white text-red-800 px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition">Jumlah Mahasiswa</button>
            <button class="bg-white text-red-800 px-6 py-3 rounded-lg font-semibold shadow hover:scale-105 transition">Jumlah Dosen</button>
        </div>

        <p class="italic text-sm text-gray-300">
            “Setiap ilmu yang Ibu/Bapak ajarkan hari ini, <br>
            adalah cahaya yang akan menerangi masa depan banyak generasi.”
        </p>
    </div>

    <!-- Image -->
    <div class="flex justify-end mt-10">
        <img src="{{ asset('storage/mascot.png') }}" alt="Karakter Mahasiswa" class="w-52 md:w-64">
    </div>

</div>
@endsection
