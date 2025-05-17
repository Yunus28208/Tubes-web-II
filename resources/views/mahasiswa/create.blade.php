@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h2>

        <select name="user_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>

        <input type="text" name="nama" placeholder="Nama Mahasiswa" class="w-full px-5 py-3 rounded-full bg-red-800 text-white placeholder-white mb-4" required>
        <input type="text" name="nim" placeholder="NIM" class="w-full px-5 py-3 rounded-full bg-red-800 text-white placeholder-white mb-4" required>
        <input type="text" name="angkatan" placeholder="Angkatan" class="w-full px-5 py-3 rounded-full bg-red-800 text-white placeholder-white mb-4" required>

        <select name="prodi_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Simpan
        </button>
    </form>

</div>
@endsection
