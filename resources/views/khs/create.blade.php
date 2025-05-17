@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('khs.store') }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Input Nilai</h2>

        <select name="krs_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">-- Pilih Mahasiswa & Matakuliah --</option>
            @foreach($mahasiswa as $m)
                @foreach($m->krs as $k)
                    <option value="{{ $k->id }}">
                        {{ $m->nama }} - {{ $k->kelas->mataKuliah->nama ?? '-' }}
                    </option>
                @endforeach
            @endforeach
        </select>

        <input type="number" name="nilai" placeholder="Nilai Angka" min="0" max="100" step="1" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Simpan
        </button>
    </form>
</div>
@endsection
