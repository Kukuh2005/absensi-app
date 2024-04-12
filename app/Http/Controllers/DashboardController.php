<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $user = User::all();
        $guru = User::where('level', 'guru')->get();
        
        return view('dashboard.index', compact('kelas', 'siswa', 'user', 'guru'));
    }
}
