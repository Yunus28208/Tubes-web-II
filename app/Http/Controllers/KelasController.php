<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Kelas::with('mataKuliah')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Kelas::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Kelas::with('mataKuliah')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return $kelas;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Kelas::destroy($id);
    }
}
