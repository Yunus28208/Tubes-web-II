@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan sistem informasi akademik')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
    
    .dashboard-container {
        font-family: 'Poppins', sans-serif;
    }
    
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #10b981, #059669, #047857);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    /* Fix scrolling issues */
    .scrollable-content {
        height: auto;
        overflow-y: visible;
        padding-bottom: 2rem;
    }
</style>

<div class="dashboard-container scrollable-content">
    <!-- Welcome Section -->
    <div class="mb-8">
        <div class="glass-card rounded-2xl p-8 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-0 w-40 h-40 bg-emerald-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-60 h-60 bg-teal-500 rounded-full blur-3xl"></div>
            </div>
            
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Content -->
                <div>
                    <div class="mb-6">
                        <h1 class="text-4xl lg:text-5xl font-bold mb-3">
                            Selamat Datang,
                            <span class="gradient-text block mt-2">{{$user->username}}</span>
                        </h1>
                        <div class="flex items-center gap-3 text-gray-300">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full pulse-animation"></div>
                            <p class="text-lg font-medium">Tahun Ajaran 2025/2026</p>
                        </div>
                    </div>
                    
                    <!-- Quote -->
                    <div class="glass-card rounded-xl p-6 mb-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 text-emerald-400 flex-shrink-0 mt-1">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-200 italic leading-relaxed">
                                    "Setiap ilmu yang Ibu/Bapak ajarkan hari ini, adalah cahaya yang akan menerangi masa depan banyak generasi."
                                </p>
                                <p class="text-emerald-400 text-sm mt-3 font-medium">— Inspirasi Pendidik</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Mascot -->
                <div class="flex justify-center lg:justify-end">
                    <div class="relative">
                        <div class="floating-animation">
                            <img src="{{ asset('storage/mascot.png') }}" alt="Karakter Mahasiswa" class="w-48 h-48 lg:w-64 lg:h-64 object-contain">
                        </div>
                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -right-4 w-8 h-8 bg-emerald-400 rounded-full opacity-60 pulse-animation"></div>
                        <div class="absolute -bottom-2 -left-2 w-6 h-6 bg-teal-400 rounded-full opacity-40 pulse-animation" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Mahasiswa Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <span class="text-2xl">📊</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Total Mahasiswa</h3>
            <p class="text-3xl font-bold text-blue-400 mb-1">{{ $mahasiswaCount }}</p>
            <p class="text-gray-400 text-sm">+12% dari tahun lalu</p>
        </div>
        
        <!-- Dosen Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="text-2xl">👨‍🏫</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Total Dosen</h3>
            <p class="text-3xl font-bold text-purple-400 mb-1">{{$dosenCount}}</p>
            <p class="text-gray-400 text-sm">+3 dosen baru</p>
        </div>
        
        <!-- Mata Kuliah Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-2xl">📚</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Mata Kuliah</h3>
            <p class="text-3xl font-bold text-emerald-400 mb-1">{{$mata_kuliahCount}}</p>
            <p class="text-gray-400 text-sm">Semester aktif</p>
        </div>
        
        <!-- Kelas Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-2xl">🏫</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Total Kelas</h3>
            <p class="text-3xl font-bold text-orange-400 mb-1">{{$kelasCount}}</p>
            <p class="text-gray-400 text-sm">Kelas aktif</p>
        </div>
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-2xl">🏫</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Total Fakultas</h3>
            <p class="text-3xl font-bold text-orange-400 mb-1">{{$fakultasCount}}</p>
        </div>
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-2xl">🏫</span>
            </div>
            <h3 class="text-white font-semibold text-lg mb-2">Total Prodi</h3>
            <p class="text-3xl font-bold text-orange-400 mb-1">{{$prodiCount}}</p>
        </div>
    </div>
    
    <!-- System Status -->
    <div class="glass-card rounded-xl p-6 mb-8">
        <h3 class="text-xl font-semibold text-white mb-6 flex items-center gap-3">
            <div class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            Status Sistem
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <p class="text-white font-semibold">Server Online</p>
                <p class="text-gray-400 text-sm">99.9% Uptime</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <p class="text-white font-semibold">Database</p>
                <p class="text-gray-400 text-sm">Optimal</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <p class="text-white font-semibold">Keamanan</p>
                <p class="text-gray-400 text-sm">Terlindungi</p>
            </div>
        </div>
    </div>
    
    <!-- Footer Info -->
    <div class="glass-card rounded-xl p-6 text-center">
        <p class="text-gray-300 mb-2">Sistem Informasi Akademik</p>
        <p class="text-gray-400 text-sm">© 2025 SIAKAD. Semua hak dilindungi undang-undang.</p>
        <div class="flex justify-center items-center gap-4 mt-4">
            <span class="text-green-400 text-sm">● Online</span>
            <span class="text-gray-400 text-sm">|</span>
            <span class="text-gray-400 text-sm">Versi 2.1.0</span>
            <span class="text-gray-400 text-sm">|</span>
            <span class="text-gray-400 text-sm">Last Update: 24 Mei 2025</span>
        </div>
    </div>
</div>
@endsection