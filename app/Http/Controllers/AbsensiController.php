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

    public function edit($tanggal, $mkId)
    {
        $absensis = Absensi::where('tanggal_absensi', $tanggal)
            ->where('matakuliah_id', $mkId)
            ->with('mahasiswa', 'matakuliah')
            ->get();

        if ($absensis->isEmpty()) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan');
        }

        $matakuliah = Matakuliah::find($mkId);
        $mahasiswas = Mahasiswa::all();

        return view('absensi.edit', compact('absensis', 'matakuliah', 'tanggal', 'mahasiswas'));
    }

    public function update(Request $request, $tanggal, $mkId)
    {
        foreach ($request->absensi_id as $id) {
            $absen = Absensi::find($id);
            if ($absen) {
                $absen->update([
                    'status_absen' => $request->status_absen[$id] ?? $absen->status_absen,
                ]);
            }
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui!');
    }

    public function show($tanggal, $mkId)
    {
        $absensis = Absensi::where('tanggal_absensi', $tanggal)
            ->where('matakuliah_id', $mkId)
            ->with('mahasiswa', 'matakuliah')
            ->get();

        if ($absensis->isEmpty()) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan.');
        }

        $matakuliah = Matakuliah::find($mkId);

        return view('absensi.show', compact('absensis', 'matakuliah', 'tanggal'));
    }

    public function destroy($tanggal, $mkId)
    {
        Absensi::where('tanggal_absensi', $tanggal)
            ->where('matakuliah_id', $mkId)
            ->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
