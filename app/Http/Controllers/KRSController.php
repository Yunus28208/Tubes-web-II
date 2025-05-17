<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return KRS::with(['mahasiswa', 'kelas'])->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.create', compact('mahasiswa', 'matakuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return KRS::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KRS::with(['mahasiswa', 'kelas'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $krs = Krs::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswa', 'matakuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $krs = KRS::findOrFail($id);
        $krs->update($request->all());
        return $krs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return KRS::destroy($id);
    }
}
