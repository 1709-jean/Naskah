<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('lf.png') }}">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="asset('panel/plugins/highlightjs/styles/darkula.css')}}">
    <link rel="stylesheet" href="{{asset('sbadmin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('sbadmin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="{{asset('sbadmin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('sbadmin/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('sbadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('sbadmin/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lost And Found</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if(Auth::user()->level=="Admin")

            <li class="nav-item">
                <a href="{{route('dashboard_admin')}}" aria-expanded="false" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('postingan',['tipe'=>'semua','kategori'=>'semua'])}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-home"></i><span class="nav-text">Semua Postingan</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{route('data_kategori')}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-columns"></i><span class="nav-text">Data Kategori</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('data_user')}}">Data User</a>
                        <a class="collapse-item" href="{{route('data_kategori')}}">Data Kategori</a>
                    </div>
                </div>
            </li> -->

            @else

            <li class="nav-item">
                <a href="{{route('postingan_saya')}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-edit"></i><span class="nav-text">Kelola Postingan Saya</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('postingan',['tipe'=>'semua','kategori'=>'semua'])}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-home"></i><span class="nav-text">Semua Postingan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('klaim_saya')}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-check-square"></i><span class="nav-text">Klaim Saya</span>
                </a>
            </li>


            <!-- <li class="nav-item">
                <a href="{{route('data_klaim')}}" aria-expanded="false" class="nav-link">
                    <i class="fa fa-info"></i><span class="nav-text">Kelola Klaim</span>
                </a>
            </li> -->

            @endif

            <hr class="sidebar-divider d-none d-md-block" style="bottom : 0">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php
                    $namaKategori = DB::table('kategori')->get();
                    if (Auth::user()->level == "User") {
                        $profil = DB::table('biodata')->where('id_user', Auth::user()->id)->first();
                    }
                    ?>
                    <select class="form-control" id="tipe" name="tipe" aria-label="Search Dashboard">
                        <option value="">Jenis Berita</option>
                        <option value="semua" <?php if (!empty($tipe)) {
                                                    if ($tipe == "semua") {
                                                        echo "selected";
                                                    }
                                                } ?>>Semua</option>
                        <option value="lost" <?php if (!empty($tipe)) {
                                                    if ($tipe == "lost") {
                                                        echo "selected";
                                                    }
                                                } ?>>Lost</option>
                        <option value="found" <?php if (!empty($tipe)) {
                                                    if ($tipe == "found") {
                                                        echo "selected";
                                                    }
                                                } ?>>Found</option>
                    </select>
                    <input class="form-control ml-3" type="date" value="{{old('tanggal')}}" id="tanggal" name="tanggal" lass="ml-3" aria-label="Search Dashboard">

                    <select class="form-control ml-3" id="kategori" name="kategori" aria-label="Search Dashboard">
                        <option value="">Kategori Barang</option>
                        <option value="semua" <?php if (!empty($kategori)) {
                                                    if ($kategori == "semua") {
                                                        echo "selected";
                                                    }
                                                } ?>>Semua</option>
                        @foreach($namaKategori as $namak)
                        <option value="{{$namak->nama_kategori}}" <?php if (!empty($kategori)) {
                                                                        if ($kategori == $namak->nama_kategori) {
                                                                            echo "selected";
                                                                        }
                                                                    } ?>>{{$namak->nama_kategori}}</option>
                        @endforeach
                    </select>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none"> </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" id="arrow-hidden">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="buka()">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{asset('sbadmin/profil.png')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" id="anak" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profilku">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('login')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        &copy; <span id="tahun-copyright"></span> Lost And Found
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade text-left" id="profilku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Ubah Profil</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('ubah_user')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
                                </div>
                            </div>
                            @if(Auth::user()->level == "User")
                            <!-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" required="" value="{{$profil->nik}}" name="nik">
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>No Handphone</label>
                                    <input type="text" class="form-control" required="" value="{{$profil->telepon}}" name="telepon">
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password">
                                    <input type="hidden" value="{{Auth::user()->password}}" class="form-control" name="passwordLama">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
                </form>
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
    <!-- <script src="{{asset('sbadmin/js/gleek.js')}}"></script> -->
    <script src="{{asset('sbadmin/js/styleSwitcher.js')}}"></script>
    <!-- Chartjs -->
    <script src="{{asset('sbadmin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('sbadmin/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('sbadmin/plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('sbadmin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('sbadmin/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/moment/moment.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/toastr/js/toastr.init.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="{{asset('sbadmin/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{asset('sbadmin/js/plugins-init/chartjs-init.js')}}"></script>
    <script src="{{asset('sbadmin/plugins/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('sbadmin/js/customfitur.js')}}"></script>
    <script src="{{asset('sbadmin/js/lapor.js')}}"></script>
    <script src="{{asset('sbadmin/js/multiform.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</body>

@include('layout/javascript')

<script>
    function buka() {
        document.getElementById('anak').classList.toggle('show')
    }
</script>

<script>
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById("tahun-copyright").innerHTML = n;
</script>

</body>

</html>