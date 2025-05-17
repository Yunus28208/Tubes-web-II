<?php

namespace App\Http\Controllers;

use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return KHS::with('krs')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('khs.create', compact('mahasiswa', 'matakuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return KHS::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KHS::with('krs')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $nilai = KHS::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('nilai.edit', compact('nilai', 'mahasiswa', 'matakuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $khs = KHS::findOrFail($id);
        $khs->update($request->all());
        return $khs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return KHS::destroy($id);
    }
}
