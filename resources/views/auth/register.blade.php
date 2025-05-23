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
            <form action="{{ route('auth.register') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="username" placeholder="Username" class="w-full bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">

                <input type="email" name="email" placeholder="Email"
                    class="w-full bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">

                <input type="password" name="password" placeholder="Password"
                    class="w-full bg-red-800 text-white placeholder-white px-4 py-3 rounded-lg focus:outline-none">                

                <!-- <select name="role" class="w-full bg-red-800 text-white px-4 py-3 rounded-lg focus:outline-none">
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                    @endforeach
                </select> -->

                <button type="submit"
                    class="bg-white text-red-700 px-6 py-2 rounded-md font-semibold hover:bg-red-100">Sign up</button>

                <p class="text-sm mt-4">Sudah punya akun? <a href="{{ route('auth.login') }}" class="underline">Login di sini</a></p>
            </form>

        </div>

    </div>

</body>
</html>
