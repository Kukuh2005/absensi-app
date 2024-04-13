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
            <a href="/absensi" class="btn btn-warning mt-3">
                <- Kembali</a>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($siswa as $item)
        <div class="col-md-3">
            <form id="myForm{{$item->id}}store" action="/absensi/{{$kelas->id}}/store" method="POST">
                @csrf
                <div class="card card-tale mb-2 mt-4 bg-white shadow">
                    <div class="card-header rounded-pill bg-info" style="margin-top: -20px">
                        <h5 class="text-light">{{$item->nama_siswa}}</h5>
                        <input type="text" value="{{$item->id}}" name="siswa_id" hidden>
                        <input type="text" value="{{$item->kelas_id}}" name="kelas_id" hidden>
                        <input type="text" value="{{auth()->user()->id}}" name="user_id" hidden>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="radio" id="masuk{{$item->id}}" name="status" value="masuk"
                                oninput="absensi({{$item->id}})">
                            <label class="text-dark" for="masuk{{$item->id}}">Masuk</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="izin{{$item->id}}" name="status" value="izin"
                                oninput="absensi({{$item->id}})">
                            <label class="text-dark" for="izin{{$item->id}}">Izin</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="sakit{{$item->id}}" name="status" value="sakit"
                                oninput="absensi({{$item->id}})">
                            <label class="text-dark" for="sakit{{$item->id}}">Sakit</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="tanpa_keterangan{{$item->id}}" name="status"
                                value="tanpa keterangan" oninput="absensi({{$item->id}})">
                            <label class="text-dark" for="tanpa_keterangan{{$item->id}}">Tanpa Keterangan</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>

    @if($siswa->count() != 0)
    <div class="col-md-12">
        <a href="/absensi" class="btn btn-warning mt-3">
            <- Kembali</a> <button type="button" onclick="selesai()" class="btn btn-primary mt-3">Selesai</button>
    </div>
    @endif
</div>
@endsection

@push('script')
<script>
    function absensi(id) {
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

                    document.getElementById('masuk' + id).disabled = true;
                    document.getElementById('izin' + id).disabled = true;
                    document.getElementById('sakit' + id).disabled = true;
                    document.getElementById('tanpa_keterangan' + id).disabled = true;
                },

                error: function (xhr, status, error) {
                    iziToast.error({
                        title: 'Gagal Absensi',
                        message: error,
                        position: 'topRight'
                    });
                }
            });
        });
    }

    function selesai() {
        swal('Berhasil', 'Absensi berhasil disimpan', 'success', {
            buttons: false,
            timer: 2000,
        }).then(() => {
            window.location.href = '/absensi';
        });
    }

</script>
@endpush