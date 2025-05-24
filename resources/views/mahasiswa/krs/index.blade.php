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

.premium-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.premium-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.premium-button:hover::before {
    left: 100%;
}

.premium-button:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 15px 30px rgba(239, 68, 68, 0.4);
    background: linear-gradient(135deg, #dc2626, #b91c1c, #991b1b);
}

.delete-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #dc2626, #b91c1c, #991b1b);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 6px 15px rgba(220, 38, 38, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.delete-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.delete-button:hover::before {
    left: 100%;
}

.delete-button:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 12px 25px rgba(220, 38, 38, 0.4);
    background: linear-gradient(135deg, #b91c1c, #991b1b, #7f1d1d);
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

.add-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #ffffff, #f8fafc, #e2e8f0);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.add-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    transition: left 0.5s;
}

.add-button:hover::before {
    left: 100%;
}

.add-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 20px 40px rgba(239, 68, 68, 0.3);
    background: linear-gradient(135deg, #fef2f2, #ffffff, #f8fafc);
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
    <div class="relative z-10 max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="luxury-border mb-10">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-3xl p-8">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-6">
                            <div class="header-icon w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center pulse-glow">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-4xl font-bold gradient-text mb-2">Data KRS</h2>
                                <p class="text-gray-300 text-lg">Kartu Rencana Studi Semester Ini</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('krs.create') }}" class="add-button text-red-800 px-8 py-4 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="font-bold">Tambah KRS</div>
                                <div class="text-sm opacity-70">Pilih Mata Kuliah</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="luxury-border">
            <div class="content-inner p-8">
                <div class="luxury-table rounded-3xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse">
                            <thead class="table-header">
                                <tr>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">No</th>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">Mahasiswa</th>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">Mata Kuliah</th>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">Kelas</th>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">Tahun Ajaran</th>
                                    <th class="px-6 py-4 text-left font-bold text-lg relative">Semester</th>
                                    <th class="px-6 py-4 text-center font-bold text-lg relative">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($krs as $item)
                                <tr class="table-row @if($loop->even) bg-gray-50/50 @else bg-white/30 @endif border-b border-gray-200/30">
                                    <td class="px-6 py-4 text-center text-gray-800 font-semibold">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-semibold">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                            {{ $item->mahasiswa->nama ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-800 font-semibold">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-800 font-semibold">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 font-bold">
                                            {{ $item->jadwal->kelas->kode_kelas ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-800 font-semibold">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gradient-to-r from-green-100 to-green-200 text-green-800 font-bold">
                                            {{ $item->tahun_ajaran }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-800 font-semibold">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gradient-to-r from-orange-100 to-orange-200 text-orange-800 font-bold">
                                            Semester {{ $item->jadwal->kelas->mata_kuliah->semester }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="delete-button text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 flex items-center gap-2 mx-auto">
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
    </div>

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
</div>
@endsection
