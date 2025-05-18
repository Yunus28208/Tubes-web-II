@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6">Edit Dosen</h2>


        <input type="text" name="username" value="{{ $dosen->user->username }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="nama" value="{{ $dosen->nama }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="nip" value="{{ $dosen->nip }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="bidang_keahlian" value="{{ $dosen->bidang_keahlian }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <div class="self-end flex gap-2">
            <a href="{{ route('dosen.index') }}"
               class="bg-slate-50 border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                <span>Cancel</span>
            </a>
            <button type="submit"
                class="bg-blue-50 border border-blue-500 text-blue-500 px-3 py-2 flex items-center gap-2 cursor-pointer">
                <i class="ph ph-floppy-disk block text-blue-500"></i>
                <span>Simpan</span>
            </button>
        </div>
    </form>
</div>
@endsection
