@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('krs.store') }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Tambah KRS</h2>

        <select name="mahasiswa_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswa as $m)
                <option value="{{ $m->id }}">{{ $m->nama }} ({{ $m->nim }})</option>
            @endforeach
        </select>

        <select name="kelas_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->kode_kelas }}</option>
            @endforeach
        </select>

        <input type="text" name="tahun_ajaran" placeholder="Tahun Ajaran (contoh: 2024/2025)" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="semester" placeholder="Semester (contoh: Genap)" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Simpan
        </button>
    </form>
</div>
@endsection
