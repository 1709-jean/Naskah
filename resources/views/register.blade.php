<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Lost And Found</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{asset('sbadmin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('sbadmin/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('sbadmin/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('home.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url('{{asset('register.gif')}}');background-size: 100% 100%;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register Akun Lost And Found</h1>
                            </div>
                            <form enctype="multipart/form-data" action="{{route('daftar_akun')}}" method="post">
                                @csrf
                                <div class="row px-3">
                                    <div class="col-12">
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">NIK</h6>
                                        </label>
                                        <input type="number" class="mb-4" required="" value="{{ old('nik') }}" autofocus="" autocomplete="off" placeholder="NIK" name="nik">
                                    </div> -->
                                    <div class="col-lg-6">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Nama</h6>
                                        </label>
                                        <input type="text" class="mb-4" required="" value="{{ old('name') }}" autofocus="" autocomplete="off" placeholder="Nama Lengkap" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Email</h6>
                                        </label>
                                        <input type="email" class="mb-4" required="" value="{{ old('email') }}" autofocus="" autocomplete="off" placeholder="Email Aktif" name="email">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Telepon</h6>
                                        </label>
                                        <input type="number" minlength="10" class="mb-4" value="{{ old('telepon') }}" required="" autofocus="" autocomplete="off" placeholder="Nomor Handphone" name="telepon">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Foto Profile</h6>
                                        </label>
                                        <input type="file" autocomplete="off" required="" name="foto" class="mb-4">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Password</h6>
                                        </label>
                                        <input type="password" id="password" autocomplete="off" required="" name="password" placeholder="Masukkan Password">
                                    </div>
                                    <div class="col-xl-12 mt-3">
                                        <button class="btn btn-blue text-center form-control mb-3">Buat Akun</button>
                                        <p><a href="{{url('/')}}">Kembali</a></p>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>
<script src="{{asset('sbadmin/plugins/common/common.min.js')}}"></script>
<script src="{{asset('sbadmin/js/custom.min.js')}}"></script>
<script src="{{asset('sbadmin/js/settings.js')}}"></script>
<script src="{{asset('sbadmin/js/gleek.js')}}"></script>
<script src="{{asset('sbadmin/js/styleSwitcher.js')}}"></script>
<script src="{{asset('sbadmin/plugins/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('sbadmin/plugins/toastr/js/toastr.init.js')}}"></script>

<script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
@if(session('sama'))
<script type="text/javascript">
    sweetAlert({
        icon: 'warning',
        type: 'warning',
        title: 'Email Telah Digunakan',
        text: 'Silahkan menggunakan Email lainnya',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

</html>