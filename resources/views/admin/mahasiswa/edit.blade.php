@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST"
        class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
        @csrf
        @method("PUT")
        
        <div class="grid sm:grid-cols-2 gap-4">

            <div class="flex flex-col gap-2 text-black">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="Username" value="{{ old('username', $mahasiswa->user->username)  }}">
                @error('username')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 text-black">
                <label for="nama">Nama Mahasiswa</label>
                <input type="text" id="nama" name="nama"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="Nama Mahasiswa" value="{{ old('nama', $mahasiswa->nama) }}">
                @error('nama')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4 text-black">
            <div class="flex flex-col gap-2">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="NIM" value="{{ old('nim', $mahasiswa->nim) }}">
                @error('nim')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 text-black">
                <label for="angkatan">Angkatan</label>
                <input type="text" id="angkatan" name="angkatan"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    placeholder="Angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
                @error('angkatan')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col gap-2 text-black">
            <label for="prodi_id">Program Studi</label>
            <select name="prodi_id" id="prodi_id"
                class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                <option value="" disabled {{ old('prodi_id', $mahasiswa->prodi_id) == '' ? 'selected' : '' }}>-- Pilih Prodi --</option>
                @foreach($prodis as $p)
                    <option value="{{ $p->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="self-end flex gap-2">
            <a href="{{ route('mahasiswa.index') }}"
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
