@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="container mt-4">
    <h3>Tambah Mahasiswa</h3>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="NIM" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Sistem dan Teknologi Informasi">Sistem dan Teknologi Informasi</option>
                <option value="Kewirausahaan">Kewirausahaan</option>
                <option value="Bisnis Digital">Bisnis Digital</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Angkatan</label>
            <input type="number" name="angkatan" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
