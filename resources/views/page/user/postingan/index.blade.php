@extends('layout/sbadmin')

@section('title','Postingan Saya')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('postingan_saya') }}" method="get">
            @csrf
            <div class="row">
                {{-- <form action="" method="get"></form> --}}
                <div class="col">
                    {{-- <input type="text" class="form-control" placeholder="First name"> --}}
                    <select name="search_jenis_berita" id="" class="form-control">
                        <option value="">Jenis Berita</option>
                        <option value="lost">Lost</option>
                        <option value="found">Found</option>
                    </select>
                </div>
                <div class="col">
                    {{-- <input type="text" class="form-control" placeholder="Last name"> --}}
                    {{-- {{$categories}} --}}
                    <select name="search_kategori_berita" id="" class="form-control">
                        <option value="">Kategori Berita</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id_kategori }}">{{$item->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    {{-- <input type="text" class="form-control" placeholder="Last name"> --}}
                    <select name="search_status_postingan" id="" class="form-control">
                        <option value="">Status Postingan</option>
                        <option value="true">Menunggu Verifikasi</option>
                        <option value="clear first">Selesai Mandiri</option>
                        <option value="clear">Telah Dihapus</option>
                    </select>
                </div>
                <div class="col">
                    {{-- <input type="text" class="form-control" placeholder="Last name"> --}}
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Postingan Saya
                        <a href="{{route('tambah_postingan')}}" class="btn btn-primary btn-sm" style="float: right;">
                            Tambah Postingan
                        </a>
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Jenis Berita</th>
                                <th>Tanggal Berita</th>
                                <th>Kategori</th>
                                <th>Detail Berita</th>
                                <th>Jumlah Gambar</th>
                                <th>Status Klaim</th>
                                <th>Total Klaim</th>
                                <th>Status Postingan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data as $dt)
                            <?php
                            $gambar = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
                                ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                                ->join('postingan_gambar', 'postingan_gambar.id_postingan', '=', 'postingan.id_postingan')
                                ->where('users.id', Auth::user()->id)
                                ->where('postingan_gambar.id_postingan', $dt->id_postingan)
                                ->count();
                            //tambahan
                            $jml = DB::table('postingan')
                                ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                                ->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
                                ->where('klaim.id_postingan', $dt->id_postingan)
                                // ->where('klaim.status_klaim','pending')
                                ->count();
                            $status = DB::table('postingan')
                                ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                                ->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
                                ->where('klaim.id_postingan', $dt->id_postingan)
                                ->where('klaim.status_klaim', 'pending')
                                ->first();
                            $cek = DB::table('postingan')
                                ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                                ->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
                                ->where('klaim.id_postingan', $dt->id_postingan)
                                // ->where('klaim.status_klaim','pending')
                                ->count();
                            ?>
                            <tr>
                                <td>{{$no}}.</td>
                                <td align="center">
                                    @if($dt->jenis_berita=="lost")
                                    <span class="badge text-white bg-danger">LOST</span>
                                    @else
                                    <span class="badge text-white bg-primary">FOUND</span>
                                    @endif
                                </td>
                                <td>{{$dt->tanggal_berita}}</td>
                                <td>{{$dt->nama_kategori}}</td>
                                <td>{{$dt->detail_berita}}</td>
                                <td>{{$gambar}}</td>

                                <td align="center">
                                    @if($dt->status_postingan=="true" OR $dt->status_postingan=="clear")
                                    @if($cek == 0)
                                    <span class="text text-danger">
                                        Belum ada yang <br> Melakukan Klaim / <br>Mengajukan Informasi
                                    </span>
                                    @else
                                    @if($status == NULL)
                                    <span class="text text-success">
                                        <i class="fa fa-check"></i> Sudah di lakukan Verifikasi
                                    </span>
                                    @else
                                    <span class="text text-warning">
                                        <i class="fa fa-spinner"></i> Belum ada Verifikasi
                                    </span>
                                    @endif
                                    @endif
                                    @elseif($dt->status_postingan=="false")
                                    <span class="badge bg-danger text-white">Postingan Melanggar <br> Aturan !</span>
                                    @elseif($dt->status_postingan=="clear first")
                                    <span class="text text-success text-warning">Berita telah Anda <br> selesaikan secara mandiri</span>
                                    @endif
                                    <br>
                                    @if($dt->status_postingan!=="false")
                                    <a href="{{route('lihat_klaim',$dt->id_postingan)}}" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>

                                <td>{{$jml}}</td>

                                <td align="center">
                                    @if($dt->status_postingan=="true")
                                    <span class="badge bg-primary text-white">Aktif</span>
                                    @elseif($dt->status_postingan=="clear")
                                    <span class="badge bg-success text-white">Selesai</span>
                                    @elseif($dt->status_postingan=="false")
                                    <span class="badge bg-danger text-white">Postingan Melanggar <br> Aturan !</span>
                                    @else
                                    <span class="badge bg-warning text-white">Berita telah Anda <br> selesaikan secara mandiri</span>
                                    @endif
                                </td>
                                <td align="center">
                                    @if($dt->status_postingan == "true")
                                    <a href="{{route('ubah_postingan',$dt->id_postingan)}}" class="btn btn-sm btn-warning text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete_postingan',$dt->id_postingan)}}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Apakah anda yakin menghapus Postingan?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{route('delete_postingan',$dt->id_postingan)}}?clear_first={{md5($dt->id_postingan)}}" class="btn btn-sm btn-success text-white" onclick="return confirm('Apakah anda ingin Menyelesaikan Postingan Sendiri? Semua Klaim Postingan akan otomatis di Tolak')">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    @else
                                    <span>
                                        -
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>
@endsection