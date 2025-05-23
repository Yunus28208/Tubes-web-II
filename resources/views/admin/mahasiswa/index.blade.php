@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}"
            class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md text-white font-semibold shadow transition">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="overflow-x-auto rounded-md shadow bg-white text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-200 text-gray-800">
                <tr>
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Nama</th>
                    <th class="px-4 py-3 border">NIM</th>
                    <th class="px-4 py-3 border">Angkatan</th>
                    <th class="px-4 py-3 border">Prodi</th>
                    <th class="px-4 py-3 border">Username</th>
                    <th class="px-4 py-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                <tr class="@if($loop->even) bg-gray-50 @else @endif">
                    <td class="px-4 py-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border">{{ $mhs->nama }}</td>
                    <td class="px-4 py-3 border">{{ $mhs->nim }}</td>
                    <td class="px-4 py-3 border">{{ $mhs->angkatan }}</td>
                    <td class="px-4 py-3 border">{{ $mhs->prodi->nama ?? '-' }}</td>
                    <td class="px-4 py-3 border">{{ $mhs->user->username ?? '-' }}</td>
                    <td class="px-4 py-3 border text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition">
                                Edit
                            </a>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-600">Tidak ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
