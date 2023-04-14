@extends('layout/sbadmin')

@section('title','Postingan Klaim')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Postingan di Klaim
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Jenis Berita</th>
                                <th>Detail Berita</th>
                                <th>Total Klaim</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data as $dt)
                            <?php
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
                                <td>{{$dt->detail_berita}}</td>
                                <td>{{$jml}}</td>
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
                                </td>
                                <td align="center">
                                    @if($dt->status_postingan!=="false")
                                    <a href="{{route('lihat_klaim',$dt->id_postingan)}}" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <span>-</span>
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