@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Nilai Mahasiswa</h2>
        <a href="{{ route('khs.create') }}" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md text-white font-semibold shadow">
            + Input Nilai
        </a>
    </div>

    <div class="overflow-auto rounded-md shadow bg-gray-200 text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-300 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Mahasiswa</th>
                    <th class="px-4 py-2 border">Mata Kuliah</th>
                    <th class="px-4 py-2 border">Nilai</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khs as $item)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $item->krs->mahasiswa->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $item->krs->kelas->mataKuliah->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border text-center">{{ $item->nilai }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('khs.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('khs.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
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
