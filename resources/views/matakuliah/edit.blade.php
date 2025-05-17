@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6">Edit Mata Kuliah</h2>

        <input type="text" name="kode" value="{{ $matakuliah->kode }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="text" name="nama" value="{{ $matakuliah->nama }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="number" name="sks" value="{{ $matakuliah->sks }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
        <input type="number" name="semester" value="{{ $matakuliah->semester }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>

        <label class="block mb-2 font-semibold">Dosen Pengampu</label>
        <select name="dosen_ids[]" multiple class="w-full px-4 py-2 rounded bg-red-800 text-white mb-4">
            @foreach($dosens as $d)
                <option value="{{ $d->id }}" @if(in_array($d->id, $matakuliah->dosens->pluck('id')->toArray())) selected @endif>
                    {{ $d->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Update
        </button>
    </form>
</div>
@endsection
