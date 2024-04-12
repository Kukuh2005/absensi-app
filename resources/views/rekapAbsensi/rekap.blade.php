@extends('layout.app')

@section('title', 'Rekap Absensi')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8 bg-white mb-3">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Rekap Absensi Kelas {{$kelas->kelas}}</h4>
            </div>
        </div>
        <div class="col-md-4 bg-white mb-3">
            <div class="section-header p-3 float-right">
                <a href="/rekap">rekap</a><span> / siswa kelas {{$kelas->kelas}}</span>
            </div>
        </div>

        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-header bg-white">
                    <form class="row" action="/rekap/{{$kelas->id}}/cari" method="get">
                        <div class="col-md-3">
                            <div class="form-group d-flex">
                                <input type="date" class="form-control" name="tanggal" value="{{$tanggal}}" id="tanggal" max="<?php echo date('Y-m-d'); ?>">
                                <div class="btn-group ml-2" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fas fa-search"></i></button>
                                    <button type="button" onclick="print()" class="btn btn-outline-danger"><i
                                            class="fas fa-print"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 30%">Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Guru</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $item)
                                <tr>
                                    @if($item->count() != 0)
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->siswa->nama_siswa}}</td>
                                    <td>{{$item->kelas->kelas}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>1</td>
                                    <td>{{$item->tanggal}}</td>
                                    @endif
                                </tr>
                                @endforeach
                                @if($siswa->count() == 0)
                                <tr>
                                    <td colspan="7">
                                        <p class="text-center">Siswa kelas {{$kelas->kelas}} belum melakukan <span
                                                class="text-primary">absensi</span> pada hari ini</p>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

</script>
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

    function selesai() {
        $(function () {
            swal('Berhasil', 'Absensi berhasil disimpan', 'success', {
                buttons: false,
                timer: 2000,
            });
        });
        setTimeout(function () {
            window.location.href = '/absensi';
        }, 2000);
    }
</script>
<script>
    function print() {
        var tanggal = document.getElementById('tanggal').value;

        window.open('/rekap/{{$kelas->id}}/' + tanggal + '/print', '_blank');
    }
</script>
@endpush
