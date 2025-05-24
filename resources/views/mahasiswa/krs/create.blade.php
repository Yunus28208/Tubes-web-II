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
                    <div class="flex items-center gap-6 mb-8">
                        <div class="header-icon w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center pulse-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-4xl font-bold gradient-text mb-2">Tambah KRS</h2>
                            <p class="text-gray-300 text-lg">Pilih mata kuliah untuk semester ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="luxury-border">
            <div class="content-inner p-8">
                <div class="luxury-table rounded-3xl overflow-hidden">
                    <table class="min-w-full border-collapse">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-4 text-center font-bold text-lg relative" style="width: 10%;">No</th>
                                <th class="px-6 py-4 text-left font-bold text-lg relative" style="width: 35%;">Matakuliah</th>
                                <th class="px-6 py-4 text-center font-bold text-lg relative" style="width: 15%;">SKS</th>
                                <th class="px-6 py-4 text-center font-bold text-lg relative" style="width: 15%;">Kelas</th>
                                <th class="px-6 py-4 text-center font-bold text-lg relative" style="width: 20%;">Jam</th>
                                <th class="px-6 py-4 text-center font-bold text-lg relative" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item)
                            <tr class="table-row @if($loop->even) bg-gray-50/50 @else bg-white/30 @endif border-b border-gray-200/30">
                                <td class="px-6 py-4 text-center text-gray-800 font-semibold" style="width: 10%;">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-left text-gray-800 font-semibold" style="width: 35%;">{{ $item->kelas->mata_kuliah->nama ?? '-' }}</td>
                                <td class="px-6 py-4 text-center text-gray-800 font-semibold" style="width: 15%;">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gradient-to-r from-red-100 to-red-200 text-red-800 font-bold">
                                        {{ $item->kelas->mata_kuliah->sks ?? '-' }} SKS
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-800 font-semibold" style="width: 15%;">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 font-bold">
                                        {{ $item->kelas->kode_kelas ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-800 font-semibold" style="width: 20%;">
                                    <div class="flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $item->jam_mulai }}-{{ $item->jam_selesai }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center" style="width: 15%;">
                                    <form action="{{ route('krs.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="jadwal_id" value="{{ $item->id }}">
                                        <button type="submit" class="premium-button text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 flex items-center gap-2 mx-auto">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Tambah
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

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
</div>
@endsection