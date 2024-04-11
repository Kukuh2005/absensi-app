@extends('layout.app')

@section('title', 'Rekap Absensi')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Rekap Absensi</h4>
            </div>
        </div>
        @foreach($kelas as $item)
        @if($item->tingkat == 'I' || $item->tingkat == 'VII' || $item->tingkat == 'X')
        <div class="col-md-3">
            <div class="card card-tale mb-2" style="background-color: #2afa31">
                <div class="card-body">
                    <p class="mb-4">Kelas {{$item->kelas}}</p>
                    <a href="/rekap/{{$item->id}}" class="text-dark btn btn-sm" style="background-color: #77f7d3">Rekap</a>
                </div>
            </div>
        </div>
        @elseif($item->tingkat == 'II' || $item->tingkat == 'VIII' || $item->tingkat == 'XI')
        <div class="col-md-3">
            <div class="card card-tale mb-2" style="background-color: #3217fc">
                <div class="card-body">
                    <p class="mb-4">Kelas {{$item->kelas}}</p>
                    <a href="/rekap/{{$item->id}}" class="text-dark btn btn-sm" style="background-color: #77f7d3">Rekap</a>
                </div>
            </div>
        </div>
        @elseif($item->tingkat == 'III' || $item->tingkat == 'IX' || $item->tingkat == 'XII')
        <div class="col-md-3">
            <div class="card card-tale mb-2" style="background-color: #fc6262">
                <div class="card-body">
                    <p class="mb-4">Kelas {{$item->kelas}}</p>
                    <a href="/rekap/{{$item->id}}" class="text-dark btn btn-sm" style="background-color: #77f7d3">Rekap</a>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="card card-tale mb-2" style="background-color: #fce514">
                <div class="card-body">
                    <p class="mb-4">Kelas {{$item->kelas}}</p>
                    <a href="/rekap/{{$item->id}}" class="text-dark btn btn-sm" style="background-color: #77f7d3">Rekap</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection