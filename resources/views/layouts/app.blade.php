<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIAKAD | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

    <div class="flex min-h-screen"> <!-- wrapper flex horizontal penuh -->

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-200 px-6 py-8 text-gray-800">
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-center">SIAKAD</h1>
            </div>
            <nav class="space-y-4 text-sm">
                <a href="/dashboard" class="flex items-center gap-2 px-3 py-2 rounded bg-red-800 text-white">
                    🏠 Dashboard
                </a>
                <a href="/mahasiswa" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-200">
                    👨‍🎓 Mahasiswa
                </a>
                <a href="/nilai" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-200">
                    📝 Nilai
                </a>
                <a href="/kelas" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-200">
                    🏫 Kelas
                </a>
                <a href="/pembayaran" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-200">
                    💰 Pembayaran
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>

</body>
</html>
