@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .form-input {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(71, 85, 105, 0.5);
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background: rgba(15, 23, 42, 0.7);
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-4 md:p-6 lg:p-8 flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-40 h-40 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-60 h-60 bg-purple-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-emerald-500 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="floating-animation inline-block mb-4">
                <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Edit Jadwal</h1>
            <p class="text-gray-300">Perbarui informasi jadwal perkuliahan</p>
        </div>

        <!-- Form -->
        <div class="glass-card rounded-2xl p-8">
            <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Kelas -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                        Kelas
                    </label>
                    <select name="kelas_id" class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none" required>
                        <option value="" class="bg-slate-800">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}" {{ $jadwal->kelas_id == $k->id_kelas ? 'selected' : '' }} class="bg-slate-800">
                                {{ $k->kode_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Hari
                    </label>
                    <input type="text" name="hari" value="{{ $jadwal->hari }}" class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none" required>
                </div>

                <!-- Jam -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Jam Mulai
                        </label>
                        <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none" required>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Jam Selesai
                        </label>
                        <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none" required>
                    </div>
                </div>

                <!-- Ruangan -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Ruangan
                    </label>
                    <input type="text" name="ruangan" value="{{ $jadwal->ruangan }}" class="form-input w-full px-4 py-3 rounded-xl text-white focus:outline-none" required>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Jadwal
                    </button>
                    
                    <a href="{{ route('jadwal.index') }}" class="bg-slate-600 hover:bg-slate-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection