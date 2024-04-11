<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\JamPelajaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        return view('absensi.index', compact('siswa', 'kelas'));
    }
    
    public function absensi($kelas_id)
    {
        $siswa = Siswa::where('kelas_id', $kelas_id)->get();
        $kelas = Kelas::find($kelas_id);
        
        return view('absensi.absensiSiswa', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $absensi = new Absensi;
        $absensi->siswa_id = $request->siswa_id;
        $absensi->status = $request->status;

        $tanggalSekarang = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $absensi->tanggal = $tanggalSekarang;

        $absensi->save();

        // Absensi::truncate();
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
