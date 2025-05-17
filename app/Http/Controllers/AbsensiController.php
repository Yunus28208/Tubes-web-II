<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\KRS;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Absensi::with('krs')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $krs = KRS::with('mahasiswa', 'matakuliah')->get();
        return view('absensi.create', compact('krs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Absensi::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Absensi::with('krs')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $absensi = Absensi::findOrFail($id);
        $krs = KRS::with('mahasiswa', 'matakuliah')->get();
        return view('absensi.edit', compact('absensi', 'krs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());
        return $absensi;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Absensi::destroy($id);
    }
}
