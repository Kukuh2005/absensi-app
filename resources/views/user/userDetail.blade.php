@extends('layout.app')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8 bg-white mb-3">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Data {{$level}}</h4>
            </div>
        </div>
        <div class="col-md-4 bg-white mb-3">
            <div class="section-header p-3 float-right">
                <a href="/user">user</a><span> / Detail {{$level}}</span>
            </div>
        </div>
        <div class="col-md-12 bg-white shadow">
            <div class="card">
                <div class="card-header bg-white">
                    <button class="btn btn-success btn-sm float-right" data-toggle="modal"
                        data-target="#modal-tambah">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 30%">Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <form action="/user/{{$item->id}}/delete" id="delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <a href="/user/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                            @if(auth()->user()->id != $item->id)
                                            <button type="button" class="btn btn-danger" id="{{$item->username}}" data-id="{{$item->id}}" onclick="confirmDelete(this)">Delete</button>
                                            @endif
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
@include('user.form')
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
    const user = button.getAttribute('id');
    swal({
            title: 'Hapus ' + user + '?',
            text: 'Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
    .then((willDelete) => {
        if (willDelete) {
          const form = document.getElementById('delete-form');
          form.action = '/user/' + id + '/delete';
          form.submit();
        }
    });
}
</script>
<script>
    // Ambil referensi ke elemen input password
    const passwordInput = document.getElementById('password');

    // Tambahkan event listener untuk memeriksa input setiap kali pengguna mengetik
    passwordInput.addEventListener('input', function () {
        // Ambil nilai password dari input
        const password = passwordInput.value;

        // Periksa panjang password
        const isLengthValid = password.length >= 8;

        // Periksa apakah setidaknya satu huruf kapital ada di dalam password
        const hasCapitalLetter = /[A-Z]/.test(password);

        // Jika panjang password tidak mencukupi atau tidak memiliki huruf kapital
        if (!isLengthValid || !hasCapitalLetter) {
            // Tampilkan pesan kesalahan
            document.getElementById('warning-message-password').style.display = 'block';
        } else {
            // Hapus pesan kesalahan jika password valid
            document.getElementById('warning-message-password').style.display = 'none';
        }
    });

</script>
@endpush
