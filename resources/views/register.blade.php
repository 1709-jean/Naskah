<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta property="og:image" content="{{asset('logo/logo-sisampah.svg')}}">
  <title>REGISTER LOST AND FOUND</title>
  <link rel="icon" type="image/png" href="{{asset('thumbnail.png')}}">
  <!-- <link rel="icon" type="image/png" href="{{asset('logo/logo-sisampah.svg')}}"> -->
  <!-- Favicon icon -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
  <link href="{{asset('panel/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('panel/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
  <link href="{{asset('panel/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
  <link href="{{asset('masuk.css')}}" rel="stylesheet">

</head>

<body class="h-100">
  <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
    <meta content="{{asset('logo/logo-sisampah.svg')}}" itemprop="url" />
  </div>
  <div id="preloader">
    <div class="loader">
      <center>Mohon menunggu ...</center>
    </div>
  </div>

  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto mt-5">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6" style="background-image: url('{{asset('register.gif')}}');background-size: 100% 100%;">

        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">

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
                <div class="col-lg-6">
                  <label class="mb-1">
                    <h6 class="mb-0 text-sm">NIK</h6>
                  </label>
                  <input type="number" class="mb-4" required="" value="{{ old('nik') }}" autofocus="" autocomplete="off" placeholder="NIK" name="nik">
                </div>
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
                    <h6 class="mb-0 text-sm">Foto KTP</h6>
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

  <script src="{{asset('panel/plugins/common/common.min.js')}}"></script>
  <script src="{{asset('panel/js/custom.min.js')}}"></script>
  <script src="{{asset('panel/js/settings.js')}}"></script>
  <script src="{{asset('panel/js/gleek.js')}}"></script>
  <script src="{{asset('panel/js/styleSwitcher.js')}}"></script>
  <script src="{{asset('panel/plugins/toastr/js/toastr.min.js')}}"></script>
  <script src="{{asset('panel/plugins/toastr/js/toastr.init.js')}}"></script>

  <script src="{{asset('panel/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
  <script src="{{asset('panel/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
</body>
@if(session('sama'))
<script type="text/javascript">
  sweetAlert({
    icon: 'warning',
    type: 'warning',
    title: 'Emaill/NIK Telah Digunakan',
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif

</html>