<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Siakad Untad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-red-900 to-red-500 min-h-screen flex items-center justify-center">

    <div class="relative w-full max-w-xl p-8 bg-white/20 rounded-2xl backdrop-blur-lg shadow-lg flex flex-col md:flex-row items-center gap-8">
        
        <!-- Logo dan Gambar -->
        <div class="w-full md:w-1/2 flex flex-col items-center">
            <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-16 mb-2">
            <h1 class="text-white font-bold text-2xl">Siakad <span class="block">Untad</span></h1>
            <img src="{{ asset('storage/bg-login.png') }}" alt="Graduation Image" class="mt-4 w-full hidden md:block">
        </div>

        <!-- Form Login -->
        <div class="w-full md:w-1/2">
            <h2 class="text-white text-lg font-semibold mb-4">Login</h2>

            <form action="dashboard" method="POST" class="space-y-4">
                @csrf

                <input type="email" name="email" placeholder="Enter Email" class="w-full px-4 py-2 rounded-md bg-red-800 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-red-400" required>

                <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 rounded-md bg-red-800 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-red-400" required>

                <div>
                    <label for="fokus" class="text-white text-sm">Role : </label>
                    <select name="role" class="w-full bg-red-800 text-white px-4 py-3 rounded-lg focus:outline-none">
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                    @endforeach
                </select>
                </div>

                <button type="submit" class="w-full py-2 bg-white text-red-800 font-semibold rounded-md hover:bg-red-100 transition">Sign In</button>
            </form>

            <p class="text-white text-sm mt-4 text-center">
                Belum mempunyai akun? <a href="#" class="underline">Buat akun</a>
            </p>
        </div>
    </div>

</body>
</html>
