@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6">Edit Absensi</h2>

        <select name="krs_id" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            @foreach($krs as $k)
                <option value="{{ $k->id }}" {{ $absensi->krs_id == $k->id ? 'selected' : '' }}>
                    {{ $k->mahasiswa->nama ?? '-' }} - {{ $k->kelas->mataKuliah->nama ?? '-' }}
                </option>
            @endforeach
        </select>

        <input type="date" name="tanggal" value="{{ $absensi->tanggal }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>

        <select name="status" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
            <option value="Tidak Hadir" {{ $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
            <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
        </select>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Update
        </button>
    </form>
</div>
@endsection
