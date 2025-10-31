@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <h2>Tambah Mata Kuliah</h2>

    <form action="{{ route('matakuliah.store') }}" method="POST" class="mt-3">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Kode Mata Kuliah</label>
            <input type="text" name="kode" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" class="form-control" required>
        </div>

        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection