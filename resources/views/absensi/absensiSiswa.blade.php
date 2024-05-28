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
            @include('absensi.form')
        </div>
        @endforeach
    </div>

    @if($siswa->count() != 0)
    <div class="col-md-12">
        <a href="/absensi" class="btn btn-warning mt-3"><- Kembali</a> 
        <button type="button" onclick="confirmFinish(this)" class="btn btn-primary mt-3">Selesai</button>
    </div>
    @endif
</div>
@endsection

@push('script')
<script>
    $('input[type=radio][name^=status]').change(function () {
    var formData = $(this).closest('form').serialize();
    var url = $(this).closest('form').attr('action');
    var id = $(this).closest('form').attr('id');
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (response) {
            iziToast.success({
                title: 'Berhasil Absensi',
                position: 'topRight'
            });
            document.getElementById('btn-edit' + id).style.display = 'block';
            $('#' + id).find('input').prop('disabled', true);
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
    
    function editAbsensi(id) {
        // Gantikan URL ini dengan URL yang sesuai
        var url = '/absensi/' + id + '/' + {{$kelas->id}} + '/delete';

    $.ajax({
        type: 'GET', // atau 'POST' sesuai kebutuhan
        url: url,
        success: function(response) {
            // Lakukan sesuatu dengan response dari server
            // iziToast.success({
            //     title: 'Silahkan Edit Absensi',
            //     position: 'topRight'
            // });
            $('#' + id).find('input[type=radio]').prop('checked', false);
            $('#' + id).find('input').prop('disabled', false);
        },
        error: function(xhr, status, error) {
            iziToast.error({
                title: 'Gagal Mengedit Absensi',
                message: error,
                position: 'topRight'
            });
        }
    });
}

// Menggunakan jQuery untuk menangani klik pada link dengan ID yang dimulai dengan btn-edit
$(document).on('click', 'a[id^="btn-edit"]', function(e) {
    e.preventDefault(); // Mencegah aksi default link
    var id = $(this).attr('id').replace('btn-edit', '');
    editAbsensi(id);
});

</script>
<script>
    function confirmFinish(id) {
        swal({
                title: 'Absensi Selesai ?',
                text: 'Siswa yang telah diabsen tidak dapat diedit!',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Batal",
                        value: false,
                        visible: true,
                        className: "btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Selesai",
                        value: true,
                        visible: true,
                        className: "btn-primary",
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = '/absensi';
                }            
            });
    }
</script>
@endpush