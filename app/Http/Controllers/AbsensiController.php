<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\KRS;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $krs = KRS::with('jadwal.kelas.mata_kuliah')->get();

        // Ambil unik berdasarkan mata kuliah dan kode kelas
        $uniqueKRS = $krs->unique(function ($item) {
            return $item->jadwal->kelas->mata_kuliah->id . '-' . $item->jadwal->kelas->kode_kelas;
        })->values();

        return view('dosen.absensi.index', ['krs' => $uniqueKRS]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $kelas = Kelas::findOrFail($request->kelas_id);

        $krs = KRS::with(['mahasiswa', 'jadwal.kelas'])
            ->whereHas('jadwal.kelas', function ($query) use ($kelas) {
                $query->where('id', $kelas->id);
            })
            ->get();
        return view('dosen.absensi.create', compact('krs','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $krsIds = $request->input('krs_id');
        $tanggalList = $request->input('tanggal');
        $statusList = $request->input('status');

        // Validasi semua baris
        foreach ($krsIds as $index => $krsId) {
            $tanggal = $tanggalList[$index];
            $status = $statusList[$index];

            // Validasi sederhana
            if (!$tanggal || !$status) {
                continue;
            }

            Absensi::create([
                'krs_id' => $krsId,
                'tanggal' => $tanggal,
                'status' => $status,
            ]);
        }

        return redirect()->route('dosen.absensi.index');
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
    public function edit($kelas_id) {

        $krsList = KRS::with(['mahasiswa', 'absensi'])
            ->whereHas('jadwal.kelas', function ($query) use ($kelas_id) {
                $query->where('id', $kelas_id);
            })->get();

        return view('dosen.absensi.edit', compact('krsList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $absensi = Absensi::findOrFail($id);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha' // sesuaikan dengan enum/status kamu
        ]);

        $absensi->update($validated);

        return redirect()->route('dosen.absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Absensi::destroy($id);
    }
}
