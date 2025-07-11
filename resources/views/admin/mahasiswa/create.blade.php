@extends('layouts.app')

@section('page-title', 'Tambah Mahasiswa')
@section('page-description', 'Tambahkan data mahasiswa baru ke sistem')

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
            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">Tambah Mahasiswa Baru</h2>
                <p class="text-gray-400">Lengkapi form di bawah untuk menambahkan mahasiswa</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="glass-card rounded-xl p-8">
        <form action="{{ route('admin.mahasiswa.store') }}" method="POST" class="space-y-6">
            @csrf
            
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
                           value="{{ old('username') }}"
                           required>
                    @error('username')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="nama" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- NIM & Angkatan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="nim" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            NIM
                        </div>
                    </label>
                    <input type="text" 
                           id="nim" 
                           name="nim" 
                           placeholder="Masukkan NIM"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('nim') }}"
                           required>
                    @error('nim')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="angkatan" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Angkatan
                        </div>
                    </label>
                    <input type="text" 
                           id="angkatan" 
                           name="angkatan" 
                           placeholder="Contoh: 2024"
                           class="form-input w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                           value="{{ old('angkatan') }}"
                           required>
                    @error('angkatan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Program Studi -->
            <div class="space-y-2">
                <label for="prodi_id" class="block text-sm font-medium text-gray-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Program Studi
                    </div>
                </label>
                <div class="relative">
                    <select name="prodi_id" 
                            id="prodi_id" 
                            class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none appearance-none pr-10"
                            required>
                        <option value="" disabled selected class="bg-gray-800 text-gray-400">Pilih Program Studi</option>
                        @foreach ($prodi as $prodis)
                            <option value="{{ $prodis->id_prodi }}" 
                                    {{ old('prodi_id') == $prodis->id_prodi ? 'selected' : '' }}
                                    class="bg-gray-800 text-white py-2">
                                {{ $prodis->nama }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Custom dropdown arrow -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                @error('prodi_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-white/10">
                <a href="{{ route('admin.mahasiswa.index') }}" 
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
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
