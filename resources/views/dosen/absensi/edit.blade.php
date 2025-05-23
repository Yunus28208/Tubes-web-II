@extends('layouts.dosen')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route("absensi.store") }}" method="POST">
        @csrf
        @method('PUT')
    <table class="min-w-full border-collapse">
    <thead>
        <tr>
            <th class="px-4 py-2 border">No</th>
            <th class="px-4 py-2 border">Nama Mahasiswa</th>
            <th class="px-4 py-2 border">NIM</th>
            <th class="px-4 py-2 border">Tanggal</th>
            <th class="px-4 py-2 border">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($krsList as $krs)
        <tr class="@if($loop->even) bg-black-100 @endif">
            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border">{{ $krs->mahasiswa->nama ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $krs->mahasiswa->nim ?? '-' }}</td>
            <input type="hidden" name="krs_id[]" value="{{ $krs->id }}">
            <td>
                <input type="date" name="tanggal[]" value="{{ date('Y-m-d') }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            </td>
            <td>
                <select name="status[]" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
                    @foreach (['Hadir', 'Izin', 'Sakit', 'Alpha'] as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
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
