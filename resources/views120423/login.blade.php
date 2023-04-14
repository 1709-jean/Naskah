<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <title> Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="../../asset/images/favicon.png">
  <link href="{{asset('panel/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('masuk.css')}}" rel="stylesheet">
  <link href="{{asset('panel/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
  <link href="{{asset('panel/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">

  <script src="{{asset('panel/plugins/common/common.min.js')}}"></script>
  <script src="{{asset('panel/js/custom.min.js')}}"></script>
  <script src="{{asset('panel/js/settings.js')}}"></script>
  <script src="{{asset('panel/js/gleek.js')}}"></script>
  <script src="{{asset('panel/js/styleSwitcher.js')}}"></script>
  <script src="{{asset('panel/plugins/sweetalert/js/sweetalert.min.js')}}"></script>


</head>

<body class="h-100">
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto mt-5">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6" style="background-image: url('{{asset('login.gif')}}');background-size: 100% 100%">
        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">
            <div class="row px-3">
              <label class="mb-1">
                <h6 class="mb-0 text-sm">Email</h6>
              </label>
              <input class="mb-4" type="email" autocomplete="off" autofocus="" id="email" placeholder="Masukkan Email">
            </div>
            <div class="row px-3">
              <label class="mb-1">
                <h6 class="mb-0 text-sm">Password</h6>
              </label>
              <input type="password" id="password" autocomplete="off" name="password" placeholder="Masukkan Password">
            </div>
            <div class="row mb-3 px-3">
              <button type="button" onclick="login()" class="btn btn-blue text-center">Login</button>
            </div>
            <p>Belum ada akun ?<a href="{{route('register')}}"><b>Buat Akun</a></b></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">
  function login() {
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      url: "{{route('userlogin')}}",
      type: 'POST',
      data: {
        '_method': 'POST',
        '_token': '{{ csrf_token() }}',
        'email': email,
        'password': password
      },
      success: function(response) {
        if (response.login_admin) {
          window.location = "{{route('dashboard_admin')}}";
        }
        if (response.login_user) {
          window.location = "{{route('postingan_saya')}}";
        }

        if (response.tidaksesuai) {
          sweetAlert({
            icon: "warning",
            type: "warning",
            title: 'Login gagal',
            text: 'Email/password tidak sesuai',
            showConfirmButton: false,
            timer: 2000
          })
        }

        if (response.belumisi) {
          sweetAlert({
            icon: "warning",
            type: "warning",
            title: ' Email dan password kosong',
            showConfirmButton: false,
            timer: 1500
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
    timer: 2000
  });
</script>
@endif



</html>