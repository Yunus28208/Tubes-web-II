@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Data KRS</h1>
        <p class="text-slate-400">Kelola data KRS sistem informasi akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-slate-800 rounded-xl p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-white mb-1">Data KRS</h2>
                <p class="text-slate-400 text-sm">Kelola informasi KRS dalam sistem</p>
            </div>
            <
        </div>

        <!-- Statistics Cards (Optional - you can remove if not needed) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-slate-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-cyan-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total KRS</p>
                    <p class="text-white text-xl font-bold">{{ $krs->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-slate-700 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mahasiswa</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Tahun Ajaran</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Semester</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-600">
                        @foreach ($krs as $item)
                        <tr class="hover:bg-slate-600 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white text-sm font-medium">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $item->mahasiswa->nama ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                        D
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</p>
                                        <p class="text-slate-400 text-sm">{{ $item->jadwal->kelas->mata_kuliah->kode ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-blue-500 rounded flex items-center justify-center text-white text-xs font-bold">
                                        {{ substr($item->jadwal->kelas->kode_kelas ?? 'B', 0, 1) }}
                                    </div>
                                    <span class="text-white">{{ $item->jadwal->kelas->kode_kelas ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $item->tahun_ajaran }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    {{ $item->jadwal->kelas->mata_kuliah->semester }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('admin.krs.destroy', $item->id_krs) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection