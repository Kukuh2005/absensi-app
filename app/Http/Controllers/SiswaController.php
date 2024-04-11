<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa', 'kelas'));
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
    public function store(Request $request, $id)
    {
        $siswa = new Siswa;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect('siswa/' . $id . '/detail')->with('sukses', 'Siswa baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas_all = Kelas::all();
        $kelas = Kelas::find($id);
        $siswa = Siswa::where('kelas_id', $id)->get();

        return view('siswa.detailSiswa', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $kelas_id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $kelas_id = Kelas::find($kelas_id);

        return view('siswa.edit', compact('siswa', 'kelas', 'kelas_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, $kelas_id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->update();

        return redirect('siswa/' . $kelas_id . '/detail')->with('sukses', 'Data siswa berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $kelas_id)
    {
        $siswa = Siswa::find($id);

        $siswa->delete();

        return redirect('siswa/' . $kelas_id . '/detail')->with('sukses', 'Data siswa berhasil dihapus.');
    }
}
