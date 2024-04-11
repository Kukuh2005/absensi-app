@extends('layout.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Edit Data Kelas</h4>
            </div>
        </div>
        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-body">
                    <form action="/kelas/{{$kelas->id}}/update" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="kelas" value="{{$kelas->kelas}}">
                        </div>
                        <div class="form-group">
                            <label for="tingkat">Tingkat Kelas</label>
                            <select class="custom-select" name="tingkat" id="">
                                <option value="">Pilih tingkat...</option>
                                <option value="I" {{ $kelas->tingkat == "I" ? 'selected' : '' }}>I</option>
                                <option value="II" {{ $kelas->tingkat == "II" ? 'selected' : '' }}>II</option>
                                <option value="III" {{ $kelas->tingkat == "III" ? 'selected' : '' }}>III</option>
                                <option value="IV" {{ $kelas->tingkat == "IV" ? 'selected' : '' }}>IV</option>
                                <option value="V" {{ $kelas->tingkat == "V" ? 'selected' : '' }}>V</option>
                                <option value="VI" {{ $kelas->tingkat == "VI" ? 'selected' : '' }}>VI</option>
                                <option value="VII" {{ $kelas->tingkat == "VII" ? 'selected' : '' }}>VII</option>
                                <option value="VIII" {{ $kelas->tingkat == "VIII" ? 'selected' : '' }}>VIII</option>
                                <option value="IX" {{ $kelas->tingkat == "IX" ? 'selected' : '' }}>IX</option>
                                <option value="X" {{ $kelas->tingkat == "X" ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $kelas->tingkat == "XI" ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $kelas->tingkat == "XII" ? 'selected' : '' }}>XII</option>
                            </select>
                        </div>
                        <a href="/kelas" class="btn btn-warning btn-sm">
                            <-Kembali</a> <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
