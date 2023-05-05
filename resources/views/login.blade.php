<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ asset('lf.png') }}">

  <title>Login Lost And Found</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('sbadmin/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('sbadmin/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet"> -->
  <link href="{{asset('home.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('{{asset('login.gif')}}');background-size: 100% 100%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Login Lost And Found</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>

                    <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                    <button type="button" onclick="login()" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!--  <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                  </div>
                  <div class="text-center">
                    Anda belum mempunyai akun?<a class="small" href="{{route('register')}}"> Buat Akun</a>
                  </div>
                </div>
              </div>
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
  <script src="{{asset('sbadmin/plugins/common/common.min.js')}}"></script>
  <script src="{{asset('sbadmin/js/custom.min.js')}}"></script>
  <script src="{{asset('sbadmin/js/settings.js')}}"></script>
  <script src="{{asset('sbadmin/js/gleek.js')}}"></script>
  <script src="{{asset('sbadmin/js/styleSwitcher.js')}}"></script>
  <!-- <script src="{{asset('sbadmin/plugins/toastr/js/toastr.min.js')}}"></script>
  <script src="{{asset('sbadmin/plugins/toastr/js/toastr.init.js')}}"></script> -->
  <script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
  <script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.init.js')}}"></script>

</body>
<script type="text/javascript">
  function login() {
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      url: "{{route('ceklogin')}}",
      type: 'POST',
      data: {
        '_method': 'POST',
        '_token': '{{ csrf_token() }}',
        'email': email,
        'password': password
      },
      success: function(response) {
        if (response.masuk_admin) {
          sweetAlert({
            type: 'success',
            title: '',
            showConfirmButton: false,
            timer: 10
          }, function() {
            window.location = "{{route('dashboard_admin')}}";
          });
        }
        if (response.masuk_user) {
          sweetAlert({
            type: 'success',
            title: '',
            showConfirmButton: false,
            timer: 10
          }, function() {
            window.location = "{{route('postingan_saya')}}";
          })
        }
        if (response.notmasuk) {
          sweetAlert({
            type: "warning",
            title: '',
            text: 'Email atau Password tidak sesuai',
            showConfirmButton: false,
            timer: 1000
          });
        }
        if (response.kosong) {
          sweetAlert({
            type: "warning",
            title: '',
            text: 'Anda belum memasukkan email dan password',
            showConfirmButton: false,
            timer: 500
          });
        }
      }
    });
  }
</script>

@if(session('berhasil_register'))
<script>
  sweetAlert({
    icon: "success",
    type: "success",
    title: 'Berhasil Register.',
    text: "{{session('berhasil_register')}}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif

</body>

</html>