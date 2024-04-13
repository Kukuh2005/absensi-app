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
                                <h3 class="text-primary font-weight-bold">DAFTAR BARU</h3>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="/user/daftar" method="POST" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        name="username" placeholder="Nama" oninput="validasiInput(this)">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Password">
                                    <div id="warning-message-password" style="color: red; display: none;">
                                        Password minimal 8 karakter dan 1 huruf kapital
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-lg" name="level"
                                        id="exampleFormControlSelect2">
                                        <option value="">Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah punya akun ? <a href="/login" class="text-primary">Login</a>
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
    <script src="{{asset('template/js/off-canvas.js')}}"></script>
    <script src="{{asset('template/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('template/js/template.js')}}"></script>
    <script src="{{asset('template/js/settings.js')}}"></script>
    <script src="{{asset('template/js/todolist.js')}}"></script>
    <script src="{{asset('template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('template/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('template/vendors/izitoast/js/iziToast.min.js')}}"></script>

    @if(session('status'))
    <script>
        iziToast.error({
            title: 'Gagal!',
            message: '{{session('
            gagal ')}}',
            position: 'topRight'
        });

    </script>
    @endif

    <script>
        function validasiInput(inputElement) {
            // Membuang karakter angka dari nilai input
            inputElement.value = inputElement.value.replace(/[0-9]/g, '');
        }

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
</body>

</html>
