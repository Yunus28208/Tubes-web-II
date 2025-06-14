@extends('layouts.app')

@section('page-title', 'Data Kelas')
@section('page-description', 'Kelola data kelas sistem informasi akademik')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .table-row {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .table-row:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateX(2px);
    }
    
    .action-btn {
        transition: all 0.3s ease;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="glass-card rounded-xl p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white mb-2">Data Kelas</h2>
                <p class="text-gray-400">Kelola informasi kelas dalam sistem</p>
            </div>
            <a href="{{ route('admin.kelas.create') }}" 
               class="action-btn bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 px-6 py-3 rounded-xl text-white font-semibold shadow-lg flex items-center gap-3 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Kelas
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Total Kelas</p>
                    <p class="text-2xl font-bold text-white">{{ $kelas->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Kelas Aktif</p>
                    <p class="text-2xl font-bold text-white">{{ $kelas->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Total Ruangan</p>
                    <p class="text-2xl font-bold text-white">{{ $kelas->pluck('ruangan')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Mata Kuliah</p>
                    <p class="text-2xl font-bold text-white">{{ $kelas->pluck('mata_kuliah_id')->unique()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-card rounded-xl overflow-hidden">
        <div class="p-6 border-b border-white/10">
            <h3 class="text-lg font-semibold text-white">Daftar Kelas</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-white/5">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kode Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Ruangan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Dosen Pengampu</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($kelas as $k)
                    <tr class="table-row">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-500/30">
                                {{ $k->kode_kelas }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-white">{{ $k->ruangan }}</div>
                                    <div class="text-sm text-gray-400">Ruang Kelas</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($k->mata_kuliah->nama ?? 'N', 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-white">{{ $k->mata_kuliah->nama ?? '-' }}</div>
                                    <div class="text-sm text-gray-400">
                                        @if($k->mata_kuliah)
                                            {{ $k->mata_kuliah->kode }} - {{ $k->mata_kuliah->sks }} SKS
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="max-w-xs truncate">
                                {{ collect([$k->mata_kuliah->dosen1?->nama, $k->mata_kuliah->dosen2?->nama, $k->mata_kuliah->dosen3?->nama])->filter()->implode(' - ') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.kelas.edit', $k->id_kelas) }}" 
                                   class="action-btn bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 group">
                                    <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.kelas.destroy', $k->id_kelas) }}" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="action-btn bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 group">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 bg-gray-500/20 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-400 font-medium">Tidak ada data kelas</p>
                                    <p class="text-gray-500 text-sm">Mulai dengan menambahkan kelas baru</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
