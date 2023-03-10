@extends('page/layout/app')

@section('title','Data User')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4>Tabel Data User
          </h4>
        </div>
        <div class="table-responsive">
          <table class="table table-borderd table-hover zero-configuration">
            <thead>
              <tr>
                <th>No. </th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>NIK</th>
                <th>No Telepon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach($data as $dt)
              <tr>
                <td>{{$no}}.</td>
                <td>{{$dt->name}}</td>
                <td>{{$dt->email}}</td>
                <td>{{$dt->nik}}</td>
                <td>{{$dt->telepon}}</td>
                <td align="center">
                  <a href="#" onclick="return confirm('Lanjut untuk menghapus User {{$dt->name}}?')" class="btn btn-danger text-white btn-sm">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php $no++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection