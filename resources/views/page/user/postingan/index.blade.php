@extends('layout/sbadmin')

@section('title','Postingan Saya')

@section('content')
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
                                <th>Kategori</th>
                                <th>Detail Berita</th>
                                <th>Jumlah Gambar</th>
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
                                <td>{{$dt->nama_kategori}}</td>
                                <td>{{$dt->detail_berita}}</td>
                                <td>{{$gambar}}</td>
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
                                    <!-- <a href="{{route('delete_postingan',$dt->id_postingan)}}?clear_first={{md5($dt->id_postingan)}}" class="btn btn-sm btn-success text-white" onclick="return confirm('Apakah anda ingin Menyelesaikan Postingan Sendiri? Semua Klaim Postingan akan otomatis di Tolak')">
                                        <i class="fa fa-check"></i>
                                    </a> -->
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