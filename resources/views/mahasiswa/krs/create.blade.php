@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <div class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow  w-full">
        <h2 class="text-2xl font-bold mb-6">Tambah KRS</h2>
        
        <div class="overflow-auto rounded-md shadow bg-gray-200 text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-300 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Matakuliah</th>
                    <th class="px-4 py-2 border">SKS</th>
                    <th class="px-4 py-2 border">Kelas</th>
                    <th class="px-4 py-2 border">Jam</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $item->kelas->mata_kuliah->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->kelas->mata_kuliah->sks ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->kelas->kode_kelas ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->jam_mulai }}-{{ $item->jam_selesai }}</td>
                    <td class="px-4 py-2 border text-center">
                        <form action="{{ route('krs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="jadwal_id" value="{{ $item->id }}">
                            <button type="submit" class="text-blue-600 hover:underline">Tambah</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        <!-- <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Simpan
        </button> -->
    </div>
</div>
@endsection
