<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900 text-white">

    <div class="flex min-h-screen w-full">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-100 text-gray-900 shadow-xl flex flex-col justify-between">
            <div class="p-6">
                <h1 class="text-2xl font-extrabold text-center text-red-800 mb-10">SIAKAD</h1>
                <nav class="space-y-3 text-sm font-semibold">
                    <a href="/dashboard" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('dashboard')) bg-red-800 text-white @endif">
                        🏠 Dashboard
                    </a>
                    <a href="/mahasiswa" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('mahasiswa*')) bg-red-800 text-white @endif">
                        👨‍🎓 Mahasiswa
                    </a>
                    <a href="/dosen" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('dosen*')) bg-red-800 text-white @endif">
                        👨‍🏫 Dosen
                    </a>
                    <a href="/prodi" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('prodi*')) bg-red-800 text-white @endif">
                        🏷️ Prodi
                    </a>
                    <a href="/matakuliah" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('matakuliah*')) bg-red-800 text-white @endif">
                        📚 Mata Kuliah
                    </a>
                    <a href="/kelas" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('kelas*')) bg-red-800 text-white @endif">
                        🏫 Kelas
                    </a>
                    <a href="/jadwal" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('jadwal*')) bg-red-800 text-white @endif">
                        📆 Jadwal
                    </a>
                    <a href="/krs" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('krs*')) bg-red-800 text-white @endif">
                        📝 KRS
                    </a>
                    <a href="/absensi" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('absensi*')) bg-red-800 text-white @endif">
                        ✅ Absensi
                    </a>
                    <a href="/khs" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('khs*')) bg-red-800 text-white @endif">
                        🧾 KHS
                    </a>
                    <a href="/user" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('user*')) bg-red-800 text-white @endif">
                        🔐 User
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 mt-4 text-left text-red-700 hover:text-red-900">
                            🚪 Logout
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
