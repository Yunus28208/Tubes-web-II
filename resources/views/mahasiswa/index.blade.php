@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md text-white font-semibold shadow">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="overflow-auto rounded-md shadow bg-gray-200 text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-300 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">NIM</th>
                    <th class="px-4 py-2 border">Angkatan</th>
                    <th class="px-4 py-2 border">Prodi</th>
                    <th class="px-4 py-2 border">Akun User</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $mhs->nama }}</td>
                    <td class="px-4 py-2 border">{{ $mhs->nim }}</td>
                    <td class="px-4 py-2 border">{{ $mhs->angkatan }}</td>
                    <td class="px-4 py-2 border">{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $mhs->user->name ?? '-' }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
