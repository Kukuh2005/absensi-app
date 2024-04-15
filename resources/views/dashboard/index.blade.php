@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Selamat datang {{auth()->user()->username}}!</h3>
            <h6 class="font-weight-normal mb-0">Kamu login sebagai <span class="text-primary">{{auth()->user()->level}}</span></h6>
        </div>
        @if(auth()->user()->level == 'admin')
        <div class="col-md-4 mb-2">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Kelas</p>
                    <p class="fs-30 mb-2">{{$kelas->count()}}</p>
                    <a href="/kelas" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Siswa</p>
                    <p class="fs-30 mb-2">{{$siswa->count()}}</p>
                    <a href="/siswa" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Guru</p>
                    <p class="fs-30 mb-2">{{$guru->count()}}</p>
                    <a href="guru/detail" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
