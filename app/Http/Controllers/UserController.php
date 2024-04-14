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
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password_baru);
        $user->level = $request->level;
        $user->save();

        if($request->level == 'admin'){
            return redirect('admin/detail')->with('sukses', 'Simpan data berhasil');   
        }else{
            return redirect('guru/detail')->with('sukses', 'Simpan data berhasil');   
        }

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
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->password_baru == null){
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->update();
        }else{
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password_baru);
            $user->level = $request->level;
            $user->update();
        }

        if($user->level == 'guru'){
            return redirect('guru/detail')->with('sukses', ' Data berhasil update');
        }else{
            return redirect('admin/detail')->with('sukses', ' Data berhasil update');
        }
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
