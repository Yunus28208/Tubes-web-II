@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6">Edit Mata Kuliah</h2>

        <input type="text" name="kode" value="{{ old('kode',$matakuliah->kode) }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="nama" value="{{ old('nama',$matakuliah->nama) }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="number" name="sks" value="{{ old('sks',$matakuliah->sks )}}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <select name="semester" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">Pilih Semester</option>
            <option value="ganjil" {{ old('semester', $matakuliah->semester ?? '') == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
            <option value="genap" {{ old('semester', $matakuliah->semester ?? '') == 'genap' ? 'selected' : '' }}>Genap</option>
        </select>

        @foreach(range(1, 3) as $i)
            <label class="block mb-2 font-semibold">Dosen Pengampu {{ $i }}</label>
            <select name="dosen_pengampu_{{ $i }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4">
                <option value="">Pilih Dosen</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->nama }}" 
                        {{ old("dosen_pengampu_$i", $dosen_pengampu[$i - 1] ?? '') == $dosen->nama ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        @endforeach

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Update
        </button>
    </form>
</div>
@endsection
