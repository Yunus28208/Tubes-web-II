@extends('layouts.dosen')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route("absensi.store") }}" method="POST">
        @csrf
        <h5>Absensi Kelas {{ $kelas->kode_kelas }} - {{ $kelas->mata_kuliah->nama }}</h5>
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
        @foreach ($krs as $k)
        <tr class="@if($loop->even) bg-black-100 @endif">
            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border">{{ $k->mahasiswa->nama ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $k->mahasiswa->nim ?? '-' }}</td>
            <input type="hidden" name="krs_id[]" value="{{ $k->id }}">
                <td>
                    <input type="date" name="tanggal[]" value="{{ date('Y-m-d') }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
                </td>
                <td>
                    <select name="status[]" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
                        <option value="">Pilih Status Kehadiran</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
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
