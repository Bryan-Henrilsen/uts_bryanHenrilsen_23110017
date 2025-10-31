@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Data Mata Kuliah</h4>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">+ Tambah</a>
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