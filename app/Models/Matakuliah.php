<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'kode',
        'nama_matakuliah'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relasi ke Absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'matakuliah_id', 'id');
    }

    // Relasi many-to-many (opsional)
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'matakuliah_id', 'mahasiswa_id');
    }
}