@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8">
    <!-- Header Section -->
    <div class="mb-12">
        <div class="glass-effect rounded-2xl p-8 luxury-shadow">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 gold-gradient rounded-full flex items-center justify-center luxury-shadow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-playfair font-bold bg-gradient-to-r from-gold-300 via-gold-400 to-gold-500 bg-clip-text text-transparent">
                                Selamat Datang
                            </h1>
                            <p class="text-2xl font-playfair text-gold-300 mt-1">
                                [ <span class="font-bold">{{$user->username}}</span> ]
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-2 h-2 gold-gradient rounded-full"></div>
                        <p class="text-slate-300 font-medium">Tahun Ajaran 2025/2026</p>
                        <div class="w-2 h-2 gold-gradient rounded-full"></div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="group cursor-pointer">
                            <div class="glass-effect rounded-xl p-6 border border-gold-500/20 hover:border-gold-400/40 transition-all duration-300 hover:scale-105">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 gold-gradient rounded-lg flex items-center justify-center luxury-shadow">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-gold-300 font-semibold text-lg">Jumlah Mahasiswa</h3>
                                        <p class="text-slate-400 text-sm">Data terkini semester ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group cursor-pointer">
                            <div class="glass-effect rounded-xl p-6 border border-gold-500/20 hover:border-gold-400/40 transition-all duration-300 hover:scale-105">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 gold-gradient rounded-lg flex items-center justify-center luxury-shadow">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-gold-300 font-semibold text-lg">Jumlah Dosen</h3>
                                        <p class="text-slate-400 text-sm">Tenaga pengajar aktif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inspirational Quote -->
                    <div class="relative">
                        <div class="absolute -left-4 -top-2 text-6xl text-gold-500/20 font-playfair">"</div>
                        <blockquote class="text-lg font-playfair italic text-slate-300 leading-relaxed pl-8">
                            Setiap ilmu yang Ibu/Bapak ajarkan hari ini,<br>
                            adalah cahaya yang akan menerangi masa depan banyak generasi.
                        </blockquote>
                        <div class="absolute -right-4 -bottom-2 text-6xl text-gold-500/20 font-playfair">"</div>
                    </div>
                </div>

                <!-- Mascot Image -->
                <div class="flex-shrink-0 relative">
                    <div class="relative">
                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -right-4 w-8 h-8 gold-gradient rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-gold-400 rounded-full opacity-40 animate-pulse delay-1000"></div>
                        
                        <!-- Image container -->
                        <div class="relative p-4">
                            <div class="absolute inset-0 gold-gradient rounded-full opacity-10 blur-xl"></div>
                            <img src="{{ asset('storage/mascot.png') }}" alt="Karakter Mahasiswa" class="relative w-64 md:w-80 drop-shadow-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status - Full Width -->
    <div class="w-full max-w-4xl mx-auto">
        <div class="glass-effect rounded-2xl p-8 border border-gold-500/20 luxury-shadow">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 gold-gradient rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-playfair font-bold text-gold-300">Status Sistem</h3>
                <div class="flex-1 h-px bg-gradient-to-r from-gold-500/50 to-transparent ml-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Server Status -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center luxury-shadow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-2">Server</h4>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-green-400 font-medium">Online</span>
                    </div>
                    <p class="text-slate-400 text-sm">Uptime: 99.9%</p>
                    <p class="text-slate-400 text-sm">Last Check: 2 min ago</p>
                </div>

                <!-- Database Status -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center luxury-shadow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-2">Database</h4>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-green-400 font-medium">Aktif</span>
                    </div>
                    <p class="text-slate-400 text-sm">Connections: 45/100</p>
                    <p class="text-slate-400 text-sm">Response: 12ms</p>
                </div>

                <!-- Backup Status -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center luxury-shadow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-2">Backup</h4>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                        <span class="text-yellow-400 font-medium">Terjadwal</span>
                    </div>
                    <p class="text-slate-400 text-sm">Next: Tonight 02:00</p>
                    <p class="text-slate-400 text-sm">Last: 24 hours ago</p>
                </div>
            </div>

            <!-- Additional System Info -->
            <div class="mt-8 pt-6 border-t border-slate-700/50">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div>
                        <p class="text-2xl font-bold text-gold-300">24/7</p>
                        <p class="text-slate-400 text-sm">Monitoring</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gold-300">256-bit</p>
                        <p class="text-slate-400 text-sm">Encryption</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gold-300">99.9%</p>
                        <p class="text-slate-400 text-sm">Uptime</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gold-300">ISO 27001</p>
                        <p class="text-slate-400 text-sm">Certified</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection