@extends('layout.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Edit Data Siswa</h4>
            </div>
        </div>
        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-body">
                    <form action="/siswa/{{$siswa->id}}/{{$kelas_id->id}}/update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group input-group-sm">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama_siswa" value="{{$siswa->nama_siswa}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label for="kelas">Kelas</label>
                                    <select class="custom-select" name="kelas_id">
                                        @foreach($kelas as $item)
                                        <option value="{{$item->id}}"
                                            {{ $siswa->kelas_id == $item->id ? 'selected' : '' }}>{{$item->kelas}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        value="{{$siswa->tanggal_lahir}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group input-group-sm">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{$siswa->alamat}}">
                                </div>
                            </div>
                        </div>
                        <a href="/siswa/{{$siswa->kelas_id}}/detail" class="btn btn-warning btn-sm"><-Kembali</a> 
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
