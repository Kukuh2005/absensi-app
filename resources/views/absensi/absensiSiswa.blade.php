@extends('layout.app')

@section('title', 'Absensi')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Absensi Kelas {{$kelas->kelas}}</h4>
            </div>
        </div>
        <div class="col-md-12">
            @if($siswa->count() == 0)
            <div class="alert alert-danger text-center" role="alert">
                Data Siswa Kosong
            </div>
            <a href="/absensi" class="btn btn-warning mt-3"><- Kembali</a>
            @endif
        </div>
    </div>

    <div class="row">
        @foreach($siswa as $item)
        <div class="col-md-3">
            <form id="myForm{{$item->id}}" action="/absensi/{{$kelas->id}}/store" method="POST">
                @csrf
                <div class="card card-tale mb-2 mt-4 bg-white shadow">
                    <div class="card-header rounded-pill bg-info" style="margin-top: -20px">
                        <h5 class="text-light">{{$item->nama_siswa}}</h5>
                        <input type="text" value="{{$item->id}}" name="siswa_id" hidden>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="radio" id="status{{$item->id}}_masuk" name="status" value="masuk">
                            <label class="text-dark" for="status{{$item->id}}_masuk">Masuk</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="status{{$item->id}}_izin" name="status" value="izin">
                            <label class="text-dark" for="status{{$item->id}}_izin">Izin</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="status{{$item->id}}_sakit" name="status" value="sakit">
                            <label class="text-dark" for="status{{$item->id}}_sakit">Sakit</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="status{{$item->id}}_tanpa_keterangan" name="status"
                                value="tanpa keterangan">
                            <label class="text-dark" for="status{{$item->id}}_tanpa_keterangan">Tanpa
                                Keterangan</label>
                        </div>
                        <div id="alert{{$item->id}}" class="text-success d-none">Absensi Berhasil</div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>

    @if($siswa->count() != 0)
    <div class="col-md-12">
        <a href="/absensi" class="btn btn-warning mt-3"><- Kembali</a>
        <button type="button" onclick="selesai()" class="btn btn-primary mt-3">Selesai</button>
    </div>
    @endif
</div>
@endsection

@push('script')
<script>
$(document).ready(function () {
    $('input[type=radio]').change(function () {
        var formData = $(this).closest('form').serialize();
        var url = $(this).closest('form').attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {
                iziToast.success({
                title: 'Berhasil Absensi',
                position: 'topRight'
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});

function selesai(){
    $(function() {
        swal('Berhasil', 'Absensi berhasil disimpan', 'success', {
          buttons: false,
          timer: 2000,
        });
      });
      setTimeout(function() {
        window.location.href = '/absensi';
      }, 2000);
}
</script>
@endpush