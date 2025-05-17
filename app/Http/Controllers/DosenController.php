<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Dosen::with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Dosen::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Dosen::with('user')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return $dosen;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Dosen::destroy($id);
    }
}
