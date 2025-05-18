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
        // $mahasiswa = User::with('mahasiswa')->get();
        // $prodi = Prodi::all()->count();
        // $dosen = User::with('dosen')->get();    
        // $kelas = Kelas::all()->count();
        return view('dashboard');
    }
}