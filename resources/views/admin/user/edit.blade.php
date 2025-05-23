@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-gray-900 via-black to-red-900 text-white p-10 flex justify-center items-center">
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white/20 backdrop-blur-xl text-white p-8 rounded-lg shadow max-w-2xl w-full">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6">Edit User</h2>

        <input type="text" name="username" value="{{ $user->name }}" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>

        <select name="role" class="w-full px-5 py-3 rounded-full bg-red-800 text-white mb-4" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
            <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
        </select>

        <button type="submit" class="bg-white text-red-800 font-bold px-8 py-2 rounded-full hover:bg-red-100">
            Update
        </button>
    </form>
</div>
@endsection
