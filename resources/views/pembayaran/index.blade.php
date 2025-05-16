@extends('layouts.app')

@section('content')
<div class="w-full p-6 bg-gradient-to-br from-gray-900 via-black to-red-900 min-h-screen text-white rounded-r-xl">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Pembayaran</h2>
    </div>

    <!-- Tabel Data Pembayaran -->
    <div class="overflow-auto rounded-md shadow-md bg-gray-200 text-gray-900">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Nama Mahasiswa</th>
                    <th class="border border-gray-400 px-4 py-2">Jenis Pembayaran</th>
                    <th class="border border-gray-400 px-4 py-2">Nominal</th>
                    <th class="border border-gray-400 px-4 py-2">Semester / Bulan</th>
                    <th class="border border-gray-400 px-4 py-2">Status</th>
                    <th class="border border-gray-400 px-4 py-2">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1,7) as $i)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $i }}.</td>
                    <td class="border border-gray-400 px-4 py-2">Yunus Syahrul Mubarok</td>
                    <td class="border border-gray-400 px-4 py-2">SPP</td>
                    <td class="border border-gray-400 px-4 py-2 text-right">Rp 1.500.000</td>
                    <td class="border border-gray-400 px-4 py-2">Ganjil</td>
                    <td class="border border-gray-400 px-4 py-2 text-center">
                        <span class="px-2 py-1 rounded-full bg-green-600 text-white font-semibold text-xs">Lunas</span>
                    </td>
                    <td class="border border-gray-400 px-4 py-2 text-center">
                        <button class="text-red-700 hover:text-red-900" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 21M5 7l14 14"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
