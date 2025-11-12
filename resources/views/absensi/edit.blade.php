@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Absensi Mahasiswa</h3>

    <form action="{{ route('absensi.update', ['tanggal' => $tanggal, 'mkId' => $matakuliah->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Tanggal Absensi</label>
                <input type="date" name="tanggal_absensi" class="form-control" value="{{ $tanggal }}" readonly>
            </div>

            <div class="col-md-4">
                <label>Mata Kuliah</label>
                <input type="text" class="form-control" value="{{ $matakuliah->nama_matakuliah }}" readonly>
            </div>
        </div>

        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th>Mahasiswa</th>
                    <th width="25%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensis as $index => $absen)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <b>{{ $absen->mahasiswa->name }}</b><br>
                        <small>{{ $absen->mahasiswa->nim }}</small>
                        <input type="hidden" name="absensi_id[]" value="{{ $absen->id }}">
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="status_absen[{{ $absen->id }}]" value="H" {{ $absen->status_absen == 'H' ? 'checked' : '' }}> H
                        </label>
                        <label class="ms-2">
                            <input type="radio" name="status_absen[{{ $absen->id }}]" value="A" {{ $absen->status_absen == 'A' ? 'checked' : '' }}> A
                        </label>
                        <label class="ms-2">
                            <input type="radio" name="status_absen[{{ $absen->id }}]" value="I" {{ $absen->status_absen == 'I' ? 'checked' : '' }}> I
                        </label>
                        <label class="ms-2">
                            <input type="radio" name="status_absen[{{ $absen->id }}]" value="S" {{ $absen->status_absen == 'S' ? 'checked' : '' }}> S
                        </label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary mt-3">Update Absensi</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
