@extends('layout/sbadmin')

@section('title','Postingan Report')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Postingan | Berita yang di Laporkan oleh User
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
                                <th>Jumlah Melaporkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                           <!--  <?php  
                            $jml = DB::table('postingan')->join('users','users.id','=','postingan.id_user')
                            ->join('kategori','kategori.id_kategori','=','postingan.id_kategori')
                            ->join('lapor','lapor.id_postingan','=','postingan.id_postingan')
                            ->where('lapor.id_postingan',$dt->id_postingan)
                            ->count();
                            ?> -->
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
                                <td>{{$dt->jml}} melaporkan</td>
                                <td>
                                    <a href="{{route('postingan',['tipe'=>$dt->jenis_berita,'kategori'=>$dt->nama_kategori])}}?keyword={{$dt->kode}}" class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <?php $no++ ?>
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

