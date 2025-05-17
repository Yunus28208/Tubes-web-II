<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return MataKuliah::with('dosens')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $dosens = Dosen::all();
        return view('matakuliah.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $matkul = MataKuliah::create($request->all());
        if ($request->has('dosen_ids')) {
            $matkul->dosens()->attach($request->dosen_ids);
        }
        return $matkul;
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return MataKuliah::with('dosens')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $matakuliah = MataKuliah::findOrFail($id);
        $dosens = Dosen::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $matkul = MataKuliah::findOrFail($id);
        $matkul->update($request->all());
        if ($request->has('dosen_ids')) {
            $matkul->dosens()->sync($request->dosen_ids);
        }
        return $matkul;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return MataKuliah::destroy($id);
    }
}
