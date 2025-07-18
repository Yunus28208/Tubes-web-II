@extends('layouts.app')

@section('page-title', 'Edit Dosen')
@section('page-description', 'Perbarui data dosen dalam sistem')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .form-input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #10b981, #059669);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
</style>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="glass-card rounded-xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">Edit Data Dosen</h2>
                <p class="text-gray-400">Perbarui informasi dosen: <span class="text-emerald-400 font-medium">{{ $dosen->nama }}</span></p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="glass-card rounded-xl p-8">
        <form action="{{ route('admin.dosen.update', $dosen->id_dosen) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Username & Nama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="username" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Username
                        </div>
                    </label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           placeholder="Masukkan username"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('username', $dosen->user->username ?? '') }}"
                           required>
                    @error('username')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="nama" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Nama Lengkap
                        </div>
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           placeholder="Masukkan nama lengkap"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('nama', $dosen->nama) }}"
                           required>
                    @error('nama')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- NIP & Bidang Keahlian -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="nip" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            NIP
                        </div>
                    </label>
                    <input type="text" 
                           id="nip" 
                           name="nip" 
                           placeholder="Masukkan NIP"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('nip', $dosen->nip) }}"
                           required>
                    @error('nip')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="bidang_keahlian" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Bidang Keahlian
                        </div>
                    </label>
                    <input type="text" 
                           id="bidang_keahlian" 
                           name="bidang_keahlian" 
                           placeholder="Contoh: Sistem Informasi"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('bidang_keahlian', $dosen->bidang_keahlian) }}"
                           required>
                    @error('bidang_keahlian')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-white/10">
                <a href="{{ route('admin.dosen.index') }}" 
                   class="btn-secondary px-6 py-3 rounded-xl text-white font-medium flex items-center justify-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Batal
                </a>
                <button type="submit" 
                        class="btn-primary px-6 py-3 rounded-xl text-white font-medium flex items-center justify-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
