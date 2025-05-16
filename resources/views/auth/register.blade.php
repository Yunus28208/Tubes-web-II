<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | SIAKAD Untad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-red-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-5xl bg-white/20 rounded-3xl shadow-xl backdrop-blur-xl flex flex-col md:flex-row p-10 md:p-16 text-white items-center gap-10">

        <!-- Kiri: Logo dan Gambar -->
        <div class="flex-1 text-center">
            <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-16 mx-auto mb-2">
            <h1 class="text-3xl font-bold">Siakad <br> Untad</h1>
            <img src="{{ asset('storage/bg-login.png') }}" alt="Wisuda" class="mt-6 hidden md:block w-full max-w-sm mx-auto">
        </div>

        <!-- Kanan: Form -->
        <div class="flex-1 w-full">
            <h2 class="text-xl font-semibold mb-6">Sign Up</h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf

                <div class="flex gap-4">
                    <input type="text" name="first_name" placeholder="First Name" class="w-1/2 bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">
                    <input type="text" name="last_name" placeholder="Last Name" class="w-1/2 bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">
                </div>

                <input type="email" name="email" placeholder="Email" class="w-full bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">

                <input type="password" name="password" placeholder="Password" class="w-full bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">

                <button type="submit" class="bg-white text-red-700 px-6 py-2 rounded-md font-semibold hover:bg-red-100">
                    Sign up
                </button>
            </form>
        </div>

    </div>

</body>
</html>
