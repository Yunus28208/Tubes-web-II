<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Jadwal::with('kelas')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $matakuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        return view('jadwal.create', compact('matakuliahs', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Jadwal::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Jadwal::with('kelas')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $jadwal = Jadwal::findOrFail($id);
        $matakuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliahs', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return $jadwal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Jadwal::destroy($id);
    }
}
