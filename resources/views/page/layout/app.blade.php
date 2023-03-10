<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:image" content="{{asset('logo/logo-true.jpg')}}">
  <title>@yield('title') LOST AND FOUND</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" href="{{asset('logo/logo-true.jpg')}}">
  <!-- Pignose Calender -->
  <!-- Chartist -->
  <link rel="stylesheet" href="asset('panel/plugins/highlightjs/styles/darkula.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/chartist/css/chartist.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
  <link href="{{asset('panel/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('panel/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="{{asset('panel/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
  <!-- Page plugins css -->
  <link href="{{asset('panel/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">

  <link href="{{asset('panel/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('panel/css/check.css')}}" rel="stylesheet">

</head>

<body>
  <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
    <meta content="{{asset('logo/logo-true.jpg')}}" itemprop="url" />
  </div>
  <!--*******************
        Preloader start
        ********************-->
  <div id="preloader">
    <div class="loader">
      <center>Mohon Menunggu ....</center>
    </div>
  </div>

  <div id="main-wrapper">

    <div class="nav-header">
      <div class="brand-logo">
        <a>
          <b class="logo-abbr text-white text-left"></b>
          <span class="logo-compact">
            <h3 class="text text-white text-center">
              {{implode(" ", array_slice(explode(" ", Auth::user()->name),0,1))}}
            </h3>
          </span>
          <span class="brand-title text-center">
            <h3 class="text text-white">{{Auth::user()->name}}</h3>
          </span>
        </a>
      </div>

    </div>
    @include('page/layout/sidebar')
    @include('page/layout/header')
    <div class="content-body">
      <div class="container-fluid">
        <br>
        @yield('content')
      </div>
    </div>
    <div class="footer">
      <div class="copyright">
        <p>Lost And Found | 2023</p>
      </div>
    </div>

  </div>
  <script src="{{asset('panel/plugins/common/common.min.js')}}"></script>
  <script src="{{asset('panel/js/custom.min.js')}}"></script>
  <script src="{{asset('panel/js/settings.js')}}"></script>
  <!-- <script src="{{asset('panel/js/gleek.js')}}"></script> -->
  <script src="{{asset('panel/js/styleSwitcher.js')}}"></script>

  <!-- Chartjs -->
  <script src="{{asset('panel/plugins/chart.js/Chart.bundle.min.js')}}"></script>
  <!-- Circle progress -->
  <script src="{{asset('panel/plugins/circle-progress/circle-progress.min.js')}}"></script>
  <!-- Datamap -->
  <script src="{{asset('panel/plugins/d3v3/index.js')}}"></script>
  <script src="{{asset('panel/plugins/topojson/topojson.min.js')}}"></script>
  <script src="{{asset('panel/plugins/datamaps/datamaps.world.min.js')}}"></script>
  <!-- Morrisjs -->
  <script src="{{asset('panel/plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('panel/plugins/morris/morris.min.js')}}"></script>
  <!-- Pignose Calender -->
  <script src="{{asset('panel/plugins/moment/moment.js')}}"></script>

  <script src="{{asset('panel/plugins/moment/moment.min.js')}}"></script>
  <!-- ChartistJS -->

  <script src="{{asset('panel/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
  <script src="{{asset('panel/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
  <script src="{{asset('panel/plugins/toastr/js/toastr.min.js')}}"></script>
  <script src="{{asset('panel/plugins/toastr/js/toastr.init.js')}}"></script>
  <script src="{{asset('panel/plugins/chartist/js/chartist.min.js')}}"></script>
  <script src="{{asset('panel/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
  <script src="{{asset('panel/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('panel/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('panel/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
  <script src="{{asset('panel/js/dashboard/dashboard-1.js')}}"></script>
  <script src="{{asset('panel/js/plugins-init/chartjs-init.js')}}"></script>
  <script src="{{asset('panel/plugins/highlightjs/highlight.pack.min.js')}}"></script>
  <script src="{{asset('panel/js/customfitur.js')}}"></script>
  <script src="{{asset('panel/js/lapor.js')}}"></script>
  <script src="{{asset('panel/js/multiform.js')}}"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</body>

<!--@include('page/layout/notif')-->
@include('page/layout/customfitur')

</html>