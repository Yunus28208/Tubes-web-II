@extends('layouts.app')

@section('content')
<div class="flex-1 bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 rounded-r-xl min-h-screen">

    <!-- Header dan Tombol Add -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Kelas / Kefokusan</h2>
        <button class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md flex items-center gap-2 font-semibold shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add
        </button>
    </div>

    <!-- Tabel Data Kelas -->
    <div class="overflow-auto rounded-md shadow-md bg-gray-200 text-gray-900">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Nama Kelas / Kefokusan </th>
                    <th class="border border-gray-400 px-4 py-2">Dosen Wali / Pembimbing</th>
                    <th class="border border-gray-400 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1,7) as $i)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $i }}.</td>
                    <td class="border border-gray-400 px-4 py-2">Kelas {{ chr(64 + $i) }}</td>
                    <td class="border border-gray-400 px-4 py-2">Dr. Siti Aminah</td>
                    <td class="border border-gray-400 px-4 py-2 text-center space-x-2">
                        <button class="text-red-700 hover:text-red-900" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h6m-6 7h6m-9 2v-6a2 2 0 012-2h2.5M5 21v-4a2 2 0 012-2h4"/>
                            </svg>
                        </button>
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
