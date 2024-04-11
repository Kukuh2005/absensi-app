@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-3 mb-2">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Kelas</p>
                    <p class="fs-30 mb-2">{{$kelas->count()}}</p>
                    <a href="" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Siswa</p>
                    <p class="fs-30 mb-2">{{$siswa->count()}}</p>
                    <a href="" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Guru</p>
                    <p class="fs-30 mb-2">{{$user->count()}}</p>
                    <a href="" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Total Bookings</p>
                    <p class="fs-30 mb-2">61344</p>
                    <a href="" class="text-white">Lihat detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
