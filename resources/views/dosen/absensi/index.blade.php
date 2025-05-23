@extends('layouts.dosen')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Absensi</h2>
    </div>

    <div class="overflow-auto rounded-md shadow bg-gray-200 text-gray-900">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-300 text-left">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Kelas</th>
                    <th class="px-4 py-2 border">Mata Kuliah</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($krs as $a)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $a->jadwal->kelas->kode_kelas ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $a->jadwal->kelas->mata_kuliah->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border text-center">
                        <input type="hidden" name="krs_id" value="{{ $a->id }}">
                        <a href="{{ route('absensi.create', ['kelas_id' => $a->jadwal->kelas->id]) }}" class="text-blue-600 hover:underline">Tambah Absensi</a>
                        <a href="{{ route('absensi.edit', ['kelas_id' => $a->jadwal->kelas->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('absensi.destroy', $a->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                            @csrf 
                            @method('DELETE')
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
