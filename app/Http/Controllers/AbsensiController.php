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
        $tanggal = Carbon::today()->toDateString();

        $siswa = Siswa::where('kelas_id', $kelas_id)->get();

        $exists = Absensi::where('kelas_id', $kelas_id)->where('tanggal', $tanggal)->get();

        if($exists->count() == $siswa->count()){
            $kelas = Kelas::find($kelas_id);
            return redirect('absensi')->with('absensi-complete', 'Siswa kelas ' . $kelas->kelas . ' telah melakukan absensi pada hari ini.');
        }else
        {
            $siswa = Siswa::where('kelas_id', $kelas_id)
              ->whereDoesntHave('absensi', function ($query) use ($tanggal) {
                  $query->where('tanggal', $tanggal);
              })
              ->get();
            $kelas = Kelas::find($kelas_id);
            
            return view('absensi.absensiSiswa', compact('siswa', 'kelas'));
        }
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
        $tanggalSekarang = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        
        $absensi = new Absensi;
        $absensi->siswa_id = $request->siswa_id;
        $absensi->kelas_id = $request->kelas_id;
        $absensi->status = $request->status;
    
        $absensi->tanggal = $tanggalSekarang;
        $absensi->user_id = $request->user_id;
        $absensi->save();;
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
    public function update(Request $request, $kelas_id, $siswa_id)
    {
        $tanggalSekarang = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $siswa = Absensi::where('siswa_id', $siswa_id)->where('tanggal', $tanggalSekarang)->first();
        
        $siswa->status = $request->status_update;
        $siswa->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($siswa_id, $kelas_id)
    {
        $tanggal = Carbon::today()->toDateString();
        $siswa = Absensi::where('siswa_id', $siswa_id)->where('kelas_id', $kelas_id)->where('tanggal', $tanggal)->first();
        $siswa_delete = Absensi::find($siswa->id);

        $siswa_delete->delete();

        return redirect()->back();
    }
}
