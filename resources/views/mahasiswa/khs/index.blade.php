@extends('layouts.mahasiswa')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

.premium-container {
    font-family: 'Poppins', sans-serif;
}

.floating-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
    pointer-events: none;
}

.particle {
    position: absolute;
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c);
    border-radius: 50%;
    animation: float-particle 25s infinite linear;
    opacity: 0.08;
}

.particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 4s; }
.particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 8s; }
.particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 12s; }
.particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 16s; }
.particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 20s; }
.particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 24s; }
.particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 28s; }
.particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 32s; }

@keyframes float-particle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.08; }
    90% { opacity: 0.08; }
    100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
}

.glass-card {
    backdrop-filter: blur(30px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%, 
        rgba(255, 255, 255, 0.08) 50%, 
        rgba(255, 255, 255, 0.15) 100%);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.15) inset,
        0 2px 4px rgba(255, 255, 255, 0.15) inset;
}

.premium-card {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.premium-card:hover::before {
    left: 100%;
}

.premium-card:hover {
    transform: translateY(-5px) scale(1.01);
    box-shadow: 
        0 40px 80px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(239, 68, 68, 0.3) inset;
}

.gradient-text {
    background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradient-shift 3s ease-in-out infinite;
}

@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.luxury-table {
    backdrop-filter: blur(20px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.95) 0%, 
        rgba(248, 250, 252, 0.95) 50%, 
        rgba(255, 255, 255, 0.95) 100%);
    border: 1px solid rgba(239, 68, 68, 0.2);
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.8) inset;
}

.table-header {
    background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c);
    color: white;
    position: relative;
    overflow: hidden;
}

.table-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    animation: header-shine 3s infinite;
}

@keyframes header-shine {
    0% { left: -100%; }
    100% { left: 100%; }
}

.table-row {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.table-row::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.05), transparent);
    transition: left 0.5s;
}

.table-row:hover::before {
    left: 100%;
}

.table-row:hover {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.08), rgba(220, 38, 38, 0.05));
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(239, 68, 68, 0.2);
}

.sparkle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: #ef4444;
    border-radius: 50%;
    animation: sparkle 2.5s infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 0; transform: scale(0); }
    50% { opacity: 1; transform: scale(1); }
}

.sparkle:nth-child(1) { top: 10%; left: 15%; animation-delay: 0s; }
.sparkle:nth-child(2) { top: 20%; right: 20%; animation-delay: 0.8s; }
.sparkle:nth-child(3) { bottom: 25%; left: 25%; animation-delay: 1.6s; }
.sparkle:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 2.4s; }
.sparkle:nth-child(5) { top: 60%; left: 10%; animation-delay: 3.2s; }
.sparkle:nth-child(6) { top: 70%; right: 30%; animation-delay: 4s; }

.luxury-border {
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    animation: border-flow 4s ease-in-out infinite;
    padding: 4px;
    border-radius: 28px;
}

@keyframes border-flow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.content-inner {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    border-radius: 24px;
}

.pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite alternate;
}

@keyframes pulse-glow {
    0% { 
        box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.3));
    }
    100% { 
        box-shadow: 0 0 40px rgba(239, 68, 68, 0.6);
        filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.6));
    }
}

.header-icon {
    animation: icon-float 3s ease-in-out infinite;
}

@keyframes icon-float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-5px) rotate(5deg); }
}

.grade-badge {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.grade-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.grade-badge:hover::before {
    left: 100%;
}

.grade-badge:hover {
    transform: scale(1.05);
}

.grade-a {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
}

.grade-b {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

.grade-c {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
}

.grade-d {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
}

.grade-e {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
    box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
}

.empty-state {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    border: 2px dashed rgba(239, 68, 68, 0.3);
    border-radius: 20px;
    padding: 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.empty-state::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    animation: empty-shine 3s infinite;
}

@keyframes empty-shine {
    0% { left: -100%; }
    100% { left: 100%; }
}

.stats-card {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 20px;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    transition: left 0.5s;
}

.stats-card:hover::before {
    left: 100%;
}

.stats-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
}
</style>

<div class="premium-container min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 md:p-10 relative overflow-hidden">

    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Background Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-red-400/20 to-red-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-500/20 to-red-700/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-red-400/10 to-red-600/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Sparkles -->
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>

    <!-- Main Content -->
    <div class="relative z-10 max-w-7xl mx-auto space-y-8">
        
        <!-- Header Section -->
        <div class="luxury-border mb-10">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-3xl p-8">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="header-icon w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center pulse-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold gradient-text mb-2">Nilai Saya</h1>
                            <p class="text-gray-300 text-lg">Kartu Hasil Studi - Prestasi Akademik</p>
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="stats-card">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300 text-sm">Total Mata Kuliah</p>
                                    <p class="text-white text-2xl font-bold">{{ count($khs) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="stats-card">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300 text-sm">IPK Semester</p>
                                    <p class="text-white text-2xl font-bold">3.75</p>
                                </div>
                            </div>
                        </div>

                        <div class="stats-card">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300 text-sm">Total SKS</p>
                                    <p class="text-white text-2xl font-bold">24</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="luxury-border">
            <div class="content-inner p-8">
                <div class="luxury-table rounded-3xl overflow-hidden">
                    @forelse ($khs as $item)
                        @if($loop->first)
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead class="table-header">
                                    <tr>
                                        <th class="px-6 py-4 text-left font-bold text-lg relative">Mata Kuliah</th>
                                        <th class="px-6 py-4 text-left font-bold text-lg relative">Kelas</th>
                                        <th class="px-6 py-4 text-center font-bold text-lg relative">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @endif
                        
                        <tr class="table-row @if($loop->even) bg-gray-50/50 @else bg-white/30 @endif border-b border-gray-200/30">
                            <td class="px-6 py-4 text-gray-800 font-semibold">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $item->krs->jadwal->kelas->mata_kuliah->nama ?? '-' }}</div>
                                        <div class="text-sm text-gray-600">Semester {{ $item->krs->jadwal->kelas->mata_kuliah->semester ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-800 font-semibold">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 font-bold">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    {{ $item->krs->jadwal->kelas->kode_kelas ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $nilai = $item->nilai;
                                    $gradeClass = '';
                                    if($nilai >= 85) $gradeClass = 'grade-a';
                                    elseif($nilai >= 70) $gradeClass = 'grade-b';
                                    elseif($nilai >= 60) $gradeClass = 'grade-c';
                                    elseif($nilai >= 50) $gradeClass = 'grade-d';
                                    else $gradeClass = 'grade-e';
                                @endphp
                                <span class="grade-badge {{ $gradeClass }} inline-flex items-center px-4 py-2 rounded-full text-lg font-bold">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    {{ $nilai }}
                                </span>
                            </td>
                        </tr>
                        
                        @if($loop->last)
                                </tbody>
                            </table>
                        </div>
                        @endif
                    @empty
                        <div class="empty-state">
                            <div class="relative z-10">
                                <div class="w-24 h-24 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 pulse-glow">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">Belum Ada Nilai</h3>
                                <p class="text-gray-300 text-lg mb-6">Nilai untuk semester ini belum tersedia.</p>
                                <div class="flex items-center justify-center gap-2 text-red-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-semibold">Tunggu pengumuman dari dosen</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        @if(count($khs) > 0)
        <!-- Grade Legend -->
        <div class="luxury-border">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-3xl p-6">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                        <div class="w-6 h-6 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        Keterangan Nilai
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="flex items-center gap-3">
                            <span class="grade-badge grade-a px-3 py-1 rounded-full text-sm font-bold">A</span>
                            <span class="text-gray-300 text-sm">85 - 100</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="grade-badge grade-b px-3 py-1 rounded-full text-sm font-bold">B</span>
                            <span class="text-gray-300 text-sm">70 - 84</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="grade-badge grade-c px-3 py-1 rounded-full text-sm font-bold">C</span>
                            <span class="text-gray-300 text-sm">60 - 69</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="grade-badge grade-d px-3 py-1 rounded-full text-sm font-bold">D</span>
                            <span class="text-gray-300 text-sm">50 - 59</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="grade-badge grade-e px-3 py-1 rounded-full text-sm font-bold">E</span>
                            <span class="text-gray-300 text-sm">< 50</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
</div>
@endsection
