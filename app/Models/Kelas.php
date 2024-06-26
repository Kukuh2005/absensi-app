<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'tingkat',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
