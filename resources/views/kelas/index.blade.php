@extends('layout.app')

@section('title', 'Kelas')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Data Kelas</h4>
            </div>
        </div>
        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-header bg-white">
                    <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 30%">Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelas as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->kelas}}</td>
                                    <td>{{$item->tingkat}}</td>
                                    <td>
                                        <form action="/kelas/{{$item->id}}/delete" id="delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <a href="/kelas/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger" id="{{$item->kelas}}" onclick="confirmDelete(this)" data-id="{{$item->id}}">Delete</button>
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
@include('kelas.form')
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
    const kelas = button.getAttribute('id');
    swal({
            title: 'Hapus Kelas ' + kelas + '?',
            text: 'Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
    .then((willDelete) => {
        if (willDelete) {
          const form = document.getElementById('delete-form');
          form.action = '/kelas/' + id + '/delete';
          form.submit();
        }
    });
}
</script>
@endpush