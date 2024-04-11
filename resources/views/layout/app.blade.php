
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
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
<style>
  .swal-footer {
  text-align: center;
}
</style>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layout.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
            </div>
          </div> -->
          @include('layout.footer')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('template/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('template/js/off-canvas.js')}}"></script>
  <script src="{{asset('template/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('template/js/template.js')}}"></script>
  <script src="{{asset('template/js/settings.js')}}"></script>
  <script src="{{asset('template/js/todolist.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('template/vendors/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{asset('template/vendors/izitoast/js/iziToast.min.js')}}"></script>
  <!-- endinject -->

  @if(session('sukses'))
  <script>
      $(function() {
        swal('Berhasil', '{{session('sukses')}}', 'success', {
          buttons: false,
          timer: 2000,
        });
      });
    </script>
  @endif

  @stack('script')
</body>
</html>