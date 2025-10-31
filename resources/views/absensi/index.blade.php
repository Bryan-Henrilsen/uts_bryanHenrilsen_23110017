@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Data Absensi</h2>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">+ Input Absensi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Mata Kuliah</th>
                <th>Total Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pertemuan as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->tanggal_absensi }}</td>
                <td>{{ $p->matakuliah->nama_matakuliah ?? '-' }}</td>
                <td>{{ \App\Models\Absensi::pertemuan($p->tanggal_absensi, $p->matakuliah_id)->count() }}</td>
                <td>
                    <a href="{{ route('absensi.edit', [$p->tanggal_absensi, $p->matakuliah_id]) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada absensi</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
