@extends('layout.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8 bg-white mb-3 ">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Data Siswa</h4>
            </div>
        </div>
        <div class="col-md-4 bg-white mb-3">
            <div class="section-header p-3 float-right">
                <a href="/siswa">siswa</a><span> / siswa kelas {{$kelas->kelas}}</span>
            </div>
        </div>

        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-header bg-white">
                    <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
                    <!-- <button class="btn btn-success btn-sm float-right mr-2">Import Exel</button> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 30%">Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama_siswa}}</td>
                                    <td>{{$item->kelas_id}}</td>
                                    <td>{{$item->tanggal_lahir}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>
                                        <form action="/siswa/{{$item->id}}/{{$kelas->id}}/delete" id="delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <a href="/siswa/{{$item->id}}/{{$kelas->id}}/edit" class="btn btn-warning">Edit</a>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-danger" onclick="confirmDelete(this)" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('siswa.form')
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
<script>
    function confirmDelete(button) {

        event.preventDefault()
        const id = button.getAttribute('data-id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    const form = document.getElementById('delete-form');
                    // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
                    form.action = '/siswa/' + id +'/{{$kelas->id}}/delete';
                    form.submit();
                }
            });
    }
</script>
@endpush