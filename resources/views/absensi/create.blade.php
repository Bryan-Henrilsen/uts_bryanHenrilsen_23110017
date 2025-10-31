@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Input Absensi Mahasiswa</h3>

    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Tanggal Absensi</label>
                <input type="date" name="tanggal_absensi" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Mata Kuliah</label>
                <select name="matakuliah_id" class="form-control" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach ($matakuliah as $mk)
                        <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
                    @endforeach
                </select>
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
                @foreach($mahasiswa as $index => $mhs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <b>{{ $mhs->name }}</b><br>
                        <small>{{ $mhs->nim }}</small>
                        <input type="hidden" name="mahasiswa_id[]" value="{{ $mhs->id }}">
                    </td>
                    <td>
                        <label><input type="radio" name="status_absen[{{ $index }}]" value="H" required> H</label>
                        <label class="ms-2"><input type="radio" name="status_absen[{{ $index }}]" value="A"> A</label>
                        <label class="ms-2"><input type="radio" name="status_absen[{{ $index }}]" value="I"> I</label>
                        <label class="ms-2"><input type="radio" name="status_absen[{{ $index }}]" value="S"> S</label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary mt-3">Simpan Absensi</button>
    </form>
</div>
@endsection
