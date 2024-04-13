<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }

    public function admin()
    {
        $user = User::where('level', 'admin')->get();
        $level = 'Admin';
        
        return view('user.userDetail', compact('user', 'level'));
    }
    
    public function guru()
    {
        $user = User::where('level', 'guru')->get();
        $level = 'Guru';

        return view('user.userDetail', compact('user', 'level'));
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
        $kelas = new Kelas;
        $kelas->kelas = $request->kelas;
        $kelas->tingkat = $request->tingkat;
        $kelas->save();

        return redirect('kelas')->with('sukses', 'Simpan data berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);

        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        $kelas->kelas = $request->kelas;
        $kelas->tingkat = $request->tingkat;
        $kelas->update();

        return redirect('kelas')->with('sukses', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        $kelas->delete();

        return redirect('kelas')->with('sukses', 'Hapus data berhasil');
    }
}
