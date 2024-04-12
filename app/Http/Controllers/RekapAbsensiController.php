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
        $tanggal = $now->format('Y-m-d');
        $tanggal_dari = $now->format('Y-m-d');
        $tanggal_sampai = $now->format('Y-m-d');

        $kelas = Kelas::find($kelas_id);
        $siswa = Absensi::where('kelas_id', $kelas_id)->where('tanggal', $tanggal)->get();

        return view('rekapAbsensi.rekap', compact('kelas', 'siswa', 'tanggal_dari', 'tanggal_sampai'));
    }

    public function cari(Request $request, $kelas_id)
    {
        $kelas = Kelas::find($kelas_id);
        $tanggal_dari = $request->tanggal_dari;
        $tanggal_sampai = $request->tanggal_sampai;
        $siswa = Absensi::where('kelas_id', $kelas_id)->whereBetween('tanggal', [$tanggal_dari, $tanggal_sampai])->get();

        
        return view('rekapAbsensi.rekap', compact('kelas', 'siswa', 'tanggal_dari', 'tanggal_sampai'));
    }
    
    public function print(Request $request, $kelas_id, $tanggal_dari, $tanggal_sampai)
    {
        $kelas = Kelas::find($kelas_id);
        $siswa = Absensi::select('siswa_id', 'kelas_id')
                        ->selectRaw('COUNT(CASE WHEN status = "masuk" THEN 1 END) AS masuk_count')
                        ->selectRaw('COUNT(CASE WHEN status = "izin" THEN 1 END) AS izin_count')
                        ->selectRaw('COUNT(CASE WHEN status = "sakit" THEN 1 END) AS sakit_count')
                        ->selectRaw('COUNT(CASE WHEN status = "tanpa keterangan" THEN 1 END) AS tanpa_keterangan_count')
                        ->where('kelas_id', $kelas_id)
                        ->whereBetween('tanggal', [$tanggal_dari, $tanggal_sampai])
                        ->groupBy('siswa_id', 'kelas_id')
                        ->get();

        $pdf = Pdf::loadView('rekapAbsensi.print', compact('kelas', 'siswa', 'tanggal_dari', 'tanggal_sampai'));
        $pdf->setPaper('Landscape');
        return $pdf->stream();
    }

}
