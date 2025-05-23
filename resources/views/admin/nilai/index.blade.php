@extends('layouts.app')

@section('content')
<div class="flex-1 bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl min-h-screen">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Input Nilai Mahasiswa</h2>
    </div>

    <!-- Form Pilihan -->
    <div class="flex gap-4 mb-6">
        <select class="rounded-md p-2 text-gray-900 font-semibold w-1/3" name="kelas" id="kelas">
            <option value="">-- Pilih Kelas --</option>
            <option value="rpl">A</option>
            <option value="sc">B</option>
        </select>

        <select class="rounded-md p-2 text-gray-900 font-semibold w-1/3" name="matkul" id="matkul">
            <option value="">-- Pilih Kefokusan --</option>
            <option value="basis-data">Rekayasa Perangkat Lunak</option>
            <option value="ai">Sistem Cerdas</option>
        </select>
    </div>

    <!-- Tabel Input Nilai -->
    <div class="overflow-auto rounded-md shadow-md bg-gray-200 text-gray-900">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-400 px-4 py-2 text-center">No</th>
                    <th class="border border-gray-400 px-4 py-2">Nama Mahasiswa</th>
                    <th class="border border-gray-400 px-4 py-2 text-center">NIM</th>
                    <th class="border border-gray-400 px-4 py-2 text-center">Nilai UTS</th>
                    <th class="border border-gray-400 px-4 py-2 text-center">Nilai UAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1,7) as $i)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $i }}.</td>
                    <td class="border border-gray-400 px-4 py-2">Yunus Syahrul Mubarok</td>
                    <td class="border border-gray-400 px-4 py-2 text-center">F55123049</td>
                    <td class="border border-gray-400 px-4 py-2 text-center">
                        <input type="number" min="0" max="100" class="w-16 text-center border border-gray-300 rounded-md" />
                    </td>
                    <td class="border border-gray-400 px-4 py-2 text-center">
                        <input type="number" min="0" max="100" class="w-16 text-center border border-gray-300 rounded-md" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Simpan -->
    <div class="mt-6 flex justify-end">
        <button class="bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded-md font-semibold shadow">
            Simpan Nilai
        </button>
    </div>
</div>
@endsection
