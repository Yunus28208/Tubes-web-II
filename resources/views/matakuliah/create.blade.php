@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('matakuliah.store') }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Tambah Mata Kuliah</h2>

        <input type="text" name="kode" placeholder="Kode MK" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="nama" placeholder="Nama Mata Kuliah" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="number" name="sks" placeholder="Jumlah SKS" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <select name="semester" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="">Pilih Semester</option>
            <option value="ganjil">Ganjil</option>
            <option value="genap">Genap</option>
        </select>
        <label class="block mb-2 font-semibold">Dosen Pengampu 1</label>
        <select name="dosen_pengampu_1" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4">
            <option value="">Pilih Dosen</option>
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>

        <label class="block mb-2 font-semibold">Dosen Pengampu 2</label>
        <select name="dosen_pengampu_2" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4">
            <option value="">Pilih Dosen</option>
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>

        <label class="block mb-2 font-semibold">Dosen Pengampu 3</label>
        <select name="dosen_pengampu_3" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4">
            <option value="">Pilih Dosen</option>
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>

        <!-- <label class="block mb-2 font-semibold">Dosen Pengampu</label>
        <select name="dosen_pengampu" multiple class="w-full px-4 py-2 rounded bg-red-800 text-white mb-4">
            @foreach($dosens as $d)
                <option value="{{ $d->id }}">{{ $d->nama }}</option>
            @endforeach
        </select> -->

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Simpan
        </button>
    </form>
</div>
@endsection
