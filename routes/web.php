<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return redirect('/matakuliah');
});

// Mata Kuliah CRUD
Route::prefix('matakuliah')->group(function () {
    Route::get('/', [MataKuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('/store', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('/edit/{id}', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::put('/update/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    Route::delete('/delete/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');
});

// Absensi
Route::prefix('absensi')->group(function () {
    Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/store', [AbsensiController::class, 'store'])->name('absensi.store');

    // Edit absensi per pertemuan
    Route::get('/edit/{tanggal}/{mkId}', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/update/{tanggal}/{mkId}', [AbsensiController::class, 'update'])->name('absensi.update');
});
