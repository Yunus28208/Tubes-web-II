@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h2>

        <!-- {{-- User --}}
        <div class="mb-4">
            <label for="user_id" class="block mb-1">User</label>
            <select name="user_id" id="user_id" class="w-full px-5 py-3 rounded-lg bg-red-800 text-white" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div> -->

        {{-- userName --}}
        <div class="mb-4">
            <label for="username" class="block mb-1">Username</label>
            <input type="text" id="username" name="username" placeholder="Username"
                class="w-full px-5 py-3 rounded-lg bg-red-800 text-white placeholder-white" required>
        </div>

        {{-- Nama --}}
        <div class="mb-4">
            <label for="nama" class="block mb-1">Nama Mahasiswa</label>
            <input type="text" id="nama" name="nama" placeholder="Nama Mahasiswa"
                class="w-full px-5 py-3 rounded-lg bg-red-800 text-white placeholder-white" required>
        </div>

        {{-- NIM --}}
        <div class="mb-4">
            <label for="nim" class="block mb-1">NIM</label>
            <input type="text" id="nim" name="nim" placeholder="NIM"
                class="w-full px-5 py-3 rounded-lg bg-red-800 text-white placeholder-white" required>
        </div>

        {{-- Angkatan --}}
        <div class="mb-4">
            <label for="angkatan" class="block mb-1">Angkatan</label>
            <input type="text" id="angkatan" name="angkatan" placeholder="Angkatan"
                class="w-full px-5 py-3 rounded-lg bg-red-800 text-white placeholder-white" required>
        </div>

        {{-- Prodi --}}
        <div class="mb-6">
            <label for="prodi" class="block mb-1">Prodi</label>
            <select name="prodi_id" id="prodi" class="w-full px-5 py-3 rounded-lg bg-red-800 text-white" required>
                <option value="" disabled selected>Select Prodi</option>
                @foreach ($prodi as $prodis)
                    <option value="{{ $prodis->id }}" {{ old('prodi_id') == $prodis->id ? 'selected' : '' }}>
                        {{ $prodis->nama }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id')
                <div class="text-red-300 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('mahasiswa.index') }}" class="bg-white text-red-800 border border-red-500 px-4 py-2 rounded hover:bg-red-100 transition">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition flex items-center gap-2">
                <i class="ph ph-floppy-disk text-white"></i>
                <span>Save</span>
            </button>
        </div>

    </form>
</div>
@endsection