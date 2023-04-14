@extends('layout/sbadmin')

@section('title','Data Kategori')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Data Kategori Berita
                        <a href="" data-toggle="modal" data-target="#default" class="btn btn-primary btn-sm" style="float: right;">
                            Tambah Kategori
                        </a>
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderd table-hover zero-configuration">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->nama_kategori}}</td>
                                <td align="center">
                                    <a href="" data-toggle="modal"
                                    data-target="#edit{{$dt->id_kategori}}" class="btn btn-sm text-white btn-success">
                                    <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('deletekategori', $dt->id_kategori) }}" onclick="return confirm('Lanjut Hapus Data {{$dt->nama_kategori}}?')" class="btn btn-sm btn-danger" title='Hapus Data'><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @include('page/admin/kategori/update')
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
@include('page/admin/kategori/tambah')
@endsection

