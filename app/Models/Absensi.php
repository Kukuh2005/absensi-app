<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'status',
        'tanggal',
        'user_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
