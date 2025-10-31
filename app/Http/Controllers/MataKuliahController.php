<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = \App\Models\Matakuliah::all();

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliah,kode',
            'nama_matakuliah' => 'required'
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:matakuliah,kode,' . $id,
            'nama_matakuliah' => 'required'
        ]);

        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil diupdate!');
    }

    public function destroy($id)
    {
        Matakuliah::findOrFail($id)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}
