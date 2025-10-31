<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $pertemuan = Absensi::select('tanggal_absensi', 'matakuliah_id')
        ->with('matakuliah')
        ->groupBy('tanggal_absensi', 'matakuliah_id')
        ->orderBy('tanggal_absensi', 'desc')
        ->get();

        return view('absensi.index', compact('pertemuan'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $mahasiswa = Mahasiswa::all();

        return view('absensi.create', compact('matakuliah', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_absensi' => 'required|date',
            'matakuliah_id' => 'required',
            'mahasiswa_id' => 'required|array',
            'status_absen.*' => 'required'
        ]);

        foreach ($request->mahasiswa_id as $index => $mhsId) {
            Absensi::create([
                'tanggal_absensi' => $request->tanggal_absensi,
                'matakuliah_id' => $request->matakuliah_id,
                'mahasiswa_id' => $mhsId,
                'status_absen' => $request->status_absen[$index]
            ]);
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan!');
    }
}
