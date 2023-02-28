        <div class="header">
            <div class="header-content clearfix">
                <?php
                $namaKategori = DB::table('kategori')->get();
                if (Auth::user()->level == "User") {
                    $profil = DB::table('biodata')->where('id_user', Auth::user()->id)->first();
                }
                ?>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <select class="form-control" id="tipe" name="tipe" aria-label="Search Dashboard">\
                            <option class="semua">Jenis Berita</option>
                            <option value="semua">Semua</option>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                        <select class="form-control ml-3" id="kategori" name="kategori" aria-label="Search Dashboard">
                            <option value="semua">Kategori Barang</option>
                            <option value="semua">Semua</option>
                            @foreach($namaKategori as $namak)
                            <option value="{{$namak->nama_kategori}}">{{$namak->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{asset('panel/profil.png')}}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#profilku"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="{{route('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" required="" value="{{$profil->nik}}" name="nik">
                                    </div>
                                </div>
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