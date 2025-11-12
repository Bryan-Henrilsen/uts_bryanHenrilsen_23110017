@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Absensi</h2>
        <div class="d-flex gap-1">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">List Mahasiswa</a>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-primary">List Mata Kuliah</a>
            <a href="{{ route('absensi.create') }}" class="btn btn-primary">+ Input Absensi</a>
        </div>
    </div>
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
                    <a href="{{ route('absensi.show', ['tanggal' => $p->tanggal_absensi, 'mkId' => $p->matakuliah_id]) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('absensi.edit', ['tanggal' => $p->tanggal_absensi, 'mkId' => $p->matakuliah_id]) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('absensi.destroy', ['tanggal' => $p->tanggal_absensi, 'mkId' => $p->matakuliah_id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus absensi ini?')">Delete</button>
                    </form>
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
