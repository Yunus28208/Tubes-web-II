<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Mahasiswa::with('user', 'prodi')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $prodis = Prodi::all();
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('prodis', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Mahasiswa::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Mahasiswa::with('user', 'prodi')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodis = Prodi::all();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());
        return $mhs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Mahasiswa::destroy($id);
    }
}
