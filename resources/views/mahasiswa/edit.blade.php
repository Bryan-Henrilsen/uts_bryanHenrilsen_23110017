@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Mahasiswa</h3>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="NIM" class="form-control" value="{{ $mahasiswa->NIM }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $mahasiswa->name }}" required>
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ $mahasiswa->tempat_lahir }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="Sistem dan Teknologi Informasi" {{ $mahasiswa->jurusan == 'Sistem dan Teknologi Informasi' ? 'selected' : '' }}>Sistem dan Teknologi Informasi</option>
                <option value="Kewirausahaan" {{ $mahasiswa->jurusan == 'Kewirausahaan' ? 'selected' : '' }}>Kewirausahaan</option>
                <option value="Bisnis Digital" {{ $mahasiswa->jurusan == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Angkatan</label>
            <input type="number" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
