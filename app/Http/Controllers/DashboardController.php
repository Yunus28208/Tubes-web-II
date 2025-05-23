<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return view('admin.dashboard', compact('user'));
        } elseif ($user->role === 'mahasiswa') {
            return view('mahasiswa.dashboard', compact('user'));
        } elseif ($user->role === 'dosen') {
            return view('dosen.dashboard', compact('user'));
        } else {
            auth()->logout();
            return redirect()->route('auth.login');
        }
    }
}