@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md text-white font-semibold shadow">
            + Tambah Kelas
        </a>
    </div>

    <div class="overflow-auto rounded-md shadow bg-gray-200 text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-300 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Kode Kelas</th>
                    <th class="px-4 py-2 border">Ruangan</th>
                    <th class="px-4 py-2 border">Mata Kuliah</th>
                    <th class="px-4 py-2 border">Dosen</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $k->kode_kelas }}</td>
                    <td class="px-4 py-2 border">{{ $k->ruangan }}</td>
                    <td class="px-4 py-2 border">{{ $k->mata_kuliah->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $k->mata_kuliah->dosen_pengampu }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('kelas.edit', $k->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kelas ini?')">
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
