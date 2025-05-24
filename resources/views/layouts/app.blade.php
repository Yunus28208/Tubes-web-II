<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .sidebar-item:hover {
            transform: translateX(4px);
        }
        
        .active-item {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.3));
            border-left: 3px solid #10b981;
        }
        
        .logo-gradient {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Fix scrolling */
        .main-content {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Custom scrollbar */
        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        
        .main-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .main-content::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.5);
            border-radius: 3px;
        }
        
        .main-content::-webkit-scrollbar-thumb:hover {
            background: rgba(16, 185, 129, 0.7);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 text-white">

    <div class="flex h-screen w-full">

        <!-- Elegant Sidebar -->
        <aside class="w-72 glass-effect shadow-2xl flex flex-col border-r border-white/10 flex-shrink-0">
            <!-- Header Section -->
            <div class="p-8 flex-shrink-0">
                <!-- Logo -->
                <div class="text-center mb-12">
                    <h1 class="text-3xl font-bold logo-gradient mb-2">SIAKAD</h1>
                    <p class="text-sm text-gray-400 font-light">Academic Information System</p>
                    <div class="w-16 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 mx-auto mt-3"></div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{route('admin.dashboard')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('dashboard')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-emerald-400 group-hover:text-emerald-300">
                            <i data-lucide="home"></i>
                        </div>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <a href="{{route('mahasiswa.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('mahasiswa*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-blue-400 group-hover:text-blue-300">
                            <i data-lucide="graduation-cap"></i>
                        </div>
                        <span class="font-medium">Mahasiswa</span>
                    </a>
                    
                    <a href="{{route('dosen.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('dosen*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-purple-400 group-hover:text-purple-300">
                            <i data-lucide="user-check"></i>
                        </div>
                        <span class="font-medium">Dosen</span>
                    </a>
                    
                    <a href="{{route('prodi.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('prodi*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-orange-400 group-hover:text-orange-300">
                            <i data-lucide="building-2"></i>
                        </div>
                        <span class="font-medium">Program Studi</span>
                    </a>
                    
                    <a href="{{route('matakuliah.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('matakuliah*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300">
                            <i data-lucide="book-open"></i>
                        </div>
                        <span class="font-medium">Mata Kuliah</span>
                    </a>
                    
                    <a href="{{route('kelas.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('kelas*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-cyan-400 group-hover:text-cyan-300">
                            <i data-lucide="users"></i>
                        </div>
                        <span class="font-medium">Kelas</span>
                    </a>
                    
                    <a href="{{route('jadwal.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('jadwal*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-pink-400 group-hover:text-pink-300">
                            <i data-lucide="calendar"></i>
                        </div>
                        <span class="font-medium">Jadwal</span>
                    </a>
                    
                    <a href="{{route('krs.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('krs*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-yellow-400 group-hover:text-yellow-300">
                            <i data-lucide="file-text"></i>
                        </div>
                        <span class="font-medium">KRS</span>
                    </a>
                </nav>
            </div>
            
            <!-- Spacer untuk mendorong bottom section ke bawah -->
            <div class="flex-1"></div>
            
            <!-- Bottom Section -->
            <div class="p-6 border-t border-white/10 flex-shrink-0">
                <div class="space-y-2 mb-4">
                    <a href="{{route('profile.admin.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('profile*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-gray-400 group-hover:text-gray-300">
                            <i data-lucide="user"></i>
                        </div>
                        <span class="font-medium">Profile</span>
                    </a>
                    
                    <a href="{{route('user.index')}}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 @if(request()->is('user*')) active-item text-white @endif group">
                        <div class="w-5 h-5 text-red-400 group-hover:text-red-300">
                            <i data-lucide="settings"></i>
                        </div>
                        <span class="font-medium">User Management</span>
                    </a>
                </div>
                
                <!-- User Info Card -->
                <div class="p-4 rounded-xl glass-effect">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center">
                            <i data-lucide="user" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Admin</p>
                            <p class="text-xs text-gray-400">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 main-content">
            <!-- Top Header -->
            <header class="glass-effect border-b border-white/10 p-6 sticky top-0 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-400 mt-1">@yield('page-description', 'Selamat datang di Sistem Informasi Akademik')</p>
                    </div>
                    
                    <!-- Bagian search dan notification sudah dihilangkan -->
                    <div class="flex items-center gap-4">
                        <!-- Area kosong untuk menjaga layout tetap seimbang -->
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Add smooth scrolling and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease-in-out';
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>

</body>
</html>