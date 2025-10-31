@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
    <h2>Edit Mata Kuliah</h2>

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode Mata Kuliah</label>
            <input type="text" name="kode" class="form-control" value="{{ $matakuliah->kode }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" class="form-control" value="{{ $matakuliah->nama_matakuliah }}" required>
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection