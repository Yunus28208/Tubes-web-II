@extends('layouts.dosen')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route("khs.store") }}" method="POST">
        @csrf
    <table class="min-w-full border-collapse">
    <thead>
        <tr>
            <th class="px-4 py-2 border">No</th>
            <th class="px-4 py-2 border">Nama Mahasiswa</th>
            <th class="px-4 py-2 border">NIM</th>
            <th class="px-4 py-2 border">Mata Kuliah</th>
            <th class="px-4 py-2 border">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($krs as $k)
        <tr class="@if($loop->even) bg-black-100 @endif">
            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border">{{ $k->mahasiswa->nama ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $k->mahasiswa->nim ?? '-' }}</td>
            <input type="hidden" name="krs_id[]" value="{{ $k->id }}">
            <td class="px-4 py-2 border">{{ $k->jadwal->kelas->mata_kuliah->nama ?? '-' }}</td>
                <td>
                    <select name="nilai[]" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
                        <option value="">Input Nilai</option>
                        @php
                            $k->khs->nilai ?? ''; 
                        @endphp
                        @foreach (['A', 'B', 'C', 'D', 'E'] as $nilai)
                            <option value="{{ $nilai }}" {{ $k->khs->nilai === $nilai ? 'selected' : '' }}>
                                {{ $nilai }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
        Simpan
    </button>
</form>
</div>
@endsection
