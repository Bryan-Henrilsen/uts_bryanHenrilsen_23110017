@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Absensi - {{ $matakuliah->nama_matakuliah }}</h3>
    <p><b>Tanggal:</b> {{ $tanggal }}</p>

    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensis as $index => $absen)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $absen->mahasiswa->name }}</td>
                <td>{{ $absen->mahasiswa->NIM }}</td>
                <td>{{ $absen->mahasiswa->jurusan }}</td>
                <td>
                    @switch($absen->status_absen)
                        @case('H') <span class="badge bg-success">Hadir</span> @break
                        @case('A') <span class="badge bg-danger">Absen</span> @break
                        @case('I') <span class="badge bg-warning text-dark">Izin</span> @break
                        @case('S') <span class="badge bg-info text-dark">Sakit</span> @break
                        @default <span class="badge bg-secondary">-</span>
                    @endswitch
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('absensi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
