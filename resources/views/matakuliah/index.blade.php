@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data MataKuliah</h2>
        <div class="d-flex gap-1">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">List Mahasiswa</a>
            <a href="{{ route('absensi.index') }}" class="btn btn-primary">Halaman Absensi</a>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">+ Tambah Matakuliah</a>
        </div>
    </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matakuliah as $index => $mk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mk->kode }}</td>
                        <td>{{ $mk->nama_matakuliah }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST"
                                  class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection