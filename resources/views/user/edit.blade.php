@extends('layout.app')

@section('title', 'Edit User')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
            @if($user->level == 'admin')
                <h4 class="card-title text-primary font-weight-bold">Edit Data Admin</h4>
            @else
                <h4 class="card-title text-primary font-weight-bold">Edit Data Guru</h4>
            @endif
            </div>
        </div>
        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-body">
                    <form action="/user/{{$user->id}}/update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-sm" name="username" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" class="form-control form-control-sm" name="password_baru" placeholder="Opsional">
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="custom-select" name="level" id="">
                                        <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="guru" {{ $user->level == 'guru' ? 'selected' : '' }}>Guru</option>    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="/{{$user->level}}/detail" class="btn btn-warning btn-sm"><-Kembali</a> 
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
