@extends('layout.app')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 bg-white mb-3 shadow">
            <div class="section-header p-3">
                <h4 class="card-title text-primary font-weight-bold">Data User</h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-tale mb-2 bg-info">
                <div class="card-body">
                    <h3 class="mb-4 font-weight-bold">Admin</h3>
                    <a href="/admin/detail" class="text-dark btn btn-sm"
                        style="background-color: #77f7d3">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-tale mb-2 bg-primary">
                <div class="card-body">
                    <h3 class="mb-4 font-weight-bold">Guru</h3>
                    <a href="/guru/detail" class="text-dark btn btn-sm"
                        style="background-color: #77f7d3">Detail</a>
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
@endpush