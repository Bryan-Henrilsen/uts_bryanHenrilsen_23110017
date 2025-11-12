<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';
    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'tanggal_absensi',
        'status_absen'
    ];

    // Relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    // Relasi ke matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id', 'id');
    }

    // Scope untuk mempermudah filter per pertemuan
    public function scopePertemuan($query, $tanggal, $mkId)
    {
        return $query->where('tanggal_absensi', $tanggal)
                    ->where('matakuliah_id', $mkId);
    }
}