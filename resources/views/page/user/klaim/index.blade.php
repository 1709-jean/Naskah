@extends('layout/sbadmin')

@section('title','Ajuan Klaim Saya')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Ajuan Klaim Saya
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Jenis Berita</th>
                                <th>Detail</th>
                                <th>Jawaban</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data as $dt)
                            <?php
                            $found = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
                                ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                                ->join('postingan_found', 'postingan_found.id_postingan', '=', 'postingan.id_postingan')
                                ->where('postingan_found.id_postingan', $dt->id_postingan)
                                ->first();
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
                                <td>{{$dt->jawaban_klaim}}</td>
                                <td>
                                    @if($dt->status_klaim=="pending")
                                    <span class="badge bg-warning text-white">Klaim Anda <br> sedang di Verifikasi</span>
                                    @elseif($dt->status_klaim=="true")
                                    <span class="badge bg-success text-white">Klaim Anda <br> Di Terima</span>
                                    <br>
                                    <a href="" data-toggle="modal" data-target="#actklaim{{$dt->id_klaim}}" class="btn btn-sm btn-primary text-white "><i class="fa fa-eye "></i></a>
                                    @else
                                    <span class="badge bg-danger text-white">Klaim Anda <br> Di Tolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->status_klaim=="pending")
                                    <a href="{{route('ubah_klaim',$dt->id_klaim)}}" class="btn btn-sm btn-success text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @include('page.user.klaim.detail')
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