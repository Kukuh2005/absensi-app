<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'kelas_id',
        'tanggal_lahir',
        'alamat',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
