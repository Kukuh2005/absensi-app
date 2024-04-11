<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapAbsensiController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        return view('rekapAbsensi.index', compact('siswa', 'kelas'));
    }

    public function rekap($kelas_id)
    {
        $now = carbon::now();
        $tanggal = $now->year . '-' . $now->month . '-' . $now->day;

        $kelas = Kelas::find($kelas_id);
        $siswa = Absensi::where('kelas_id', $kelas_id)->where('tanggal', $tanggal)->get();

        return view('rekapAbsensi.rekap', compact('kelas', 'siswa'));
    }

    public function cari(Request $request, $kelas_id)
    {
        $kelas = Kelas::find($kelas_id);
        $siswa = Absensi::where('kelas_id', $kelas_id)->where('tanggal', $request->tanggal)->get();
        $tanggal = $request->tanggal;
        
        return view('rekapAbsensi.cari', compact('kelas', 'siswa', 'tanggal'));
    }
    
    public function print(Request $request, $kelas_id, $tanggal)
    {
        $kelas = Kelas::find($kelas_id);
        $siswa = Absensi::where('kelas_id', $kelas_id)->where('tanggal', $tanggal)->get();

        $pdf = Pdf::loadView('rekapAbsensi.print', compact('kelas', 'siswa', 'tanggal'));
        return $pdf->stream();
    }
}
