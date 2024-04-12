<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
    <link rel="stylesheet" href="{{asset('template/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('template/vendors/izitoast/css/iziToast.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('template/css/vertical-layout-light/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/fontawesome/css/all.min.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('template/images/favicon.png')}}" />
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h3 class="text-primary font-weight-bold">ABSENSI SEKOLAH</h3>
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form action="/postlogin" method="POST" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="text-center mt-4 font-weight-light">
                  Belum punya akun ? <a href="/daftar" class="text-primary">Daftar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="{{asset('template/js/off-canvas.js')}}"></script>
  <script src="{{asset('template/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('template/js/template.js')}}"></script>
  <script src="{{asset('template/js/settings.js')}}"></script>
  <script src="{{asset('template/js/todolist.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('template/vendors/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{asset('template/vendors/izitoast/js/iziToast.min.js')}}"></script>

  @if(session('gagal'))
  <script>
        iziToast.error({
            title: 'Gagal!',
            message: '{{session('gagal')}}',
            position: 'topRight'
        });
    </script>
    @elseif(session('sukses'))
    <script>
        iziToast.success({
            title: 'Sukses!',
            message: '{{session('sukses')}}',
            position: 'topRight'
        });
    </script>
  @endif
</body>
</html>