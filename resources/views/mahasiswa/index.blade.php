@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Mahasiswa</h2>
        <div class="d-flex gap-1">
            <a href="{{ route('absensi.index') }}" class="btn btn-primary">Halaman Absensi</a>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-primary">List Mata Kuliah</a>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $index => $mhs)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mhs->NIM }}</td>
                <td>{{ $mhs->name }}</td>
                <td>{{ $mhs->jurusan }}</td>
                <td>{{ $mhs->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($mhs->tanggal_lahir)->translatedFormat('j F Y') }}</td>
                <td>{{ $mhs->angkatan }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-muted">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
