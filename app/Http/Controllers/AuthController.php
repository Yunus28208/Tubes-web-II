<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.register', compact('roles'));
    }

    public function login()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.login', compact('roles'));
    }

    public function store(Request $request)
    {

        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
            // 'role' => $request['role'],
        ]);

        return redirect()->route('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
