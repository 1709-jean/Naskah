@extends('layout/sbadmin')

@section('title','Lihat Klaim')

@section('content')
<p><a href="{{route('postingan_saya')}}" class="btn btn-sm text-white btn-primary">
        <i class="fa fa-arrow-left"></i></a>
</p>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>User Klaim Postingan
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Detail Berita</th>
                                <th>Jawaban/Informasi</th>
                                <th>Lihat Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}.</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->detail_berita}}</td>
                                <td>{{$dt->jawaban_klaim}}</td>
                                <td align="center">
                                    <a href="" data-toggle="modal" data-target="#detail{{$dt->id_klaim}}" class="btn btn-sm text-white btn-primary">
                                        <i class="fa fa-eye"></i></a>
                                </td>
                                <td align="center">
                                    @if($dt->status_klaim == "pending")
                                    <form method="post" action="{{route('verifikasi_klaim',$dt->id_klaim)}}">
                                        @csrf
                                        <input type="hidden" value="{{$dt->id_postingan}}" name="id_postingan">
                                        <input type="hidden" value="true" name="status" />
                                        <button onclick="return confirm('Lanjut untuk Terima Klaim dari {{$dt->name}}? ini hanya bisa di lakukan 1x dan Klaim lainnya akan otomatis di Tolak')" class="btn btn-sm btn-success text-white">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>

                                    <form method="post" action="{{route('verifikasi_klaim',$dt->id_klaim)}}">
                                        @csrf
                                        <input type="hidden" value="{{$dt->id_postingan}}" name="id_postingan">
                                        <input type="hidden" name="status" value="false">
                                        <button class="btn btn-sm btn-danger text-white ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <style>
                                                    svg {
                                                        fill: #ffffff
                                                    }
                                                </style>
                                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                    @if($dt->status_klaim=="true")
                                    <span class="badge bg-success text-white">Klaim <br> Di Terima</span>
                                    <br>
                                    <a href="" data-toggle="modal" data-target="#actklaim{{$dt->id_klaim}}" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i></a>
                                    @else
                                    <span class="badge bg-danger text-white">Klaim <br> Di Tolak</span>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @include('page.user.postingan_klaim.detail')
                            @include('page.user.postingan_klaim.true')
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