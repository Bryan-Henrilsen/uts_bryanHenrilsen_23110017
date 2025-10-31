<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'NIM',
        'name',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'angkatan',
    ];

    // generate uuid otomatis saat create
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relasi ke Absensi (1 mahasiswa punya banyak absensi)
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'mahasiswa_id', 'id');
    }

    // Relasi many-to-many jika kamu punya pivot (opsional)
    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id');
    }
}