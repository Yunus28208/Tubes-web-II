@extends('layouts.mahasiswa')

@section('content')
    <h1 class="text-xl font-bold mb-4">Nilai Saya</h1>

    <table class="w-full border">
        <thead class="">
            <tr class="bg-red-900 text-white">
                <th class="p-2">Mata Kuliah</th>
                <th class="p-2">Kelas</th>
                <th class="p-2">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($khs as $item)
                <tr class="text-center">
                    <td class="p-2">{{ $item->krs->jadwal->kelas->mata_kuliah->nama ?? '-' }}</td>
                    <td class="p-2">{{ $item->krs->jadwal->kelas->kode_kelas ?? '-' }}</td>
                    <td class="p-2">{{ $item->nilai }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-2">Belum ada nilai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
