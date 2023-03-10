@extends('page/layout/app')

@section('title',"$tipe")

@section('content')
<div class="row">
  @foreach($data as $dt)
  <?php
  $lost = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
    ->join('postingan_lost', 'postingan_lost.id_postingan', '=', 'postingan.id_postingan')
    ->where('postingan_lost.id_postingan', $dt->id_postingan)
    ->get();
  $found = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
    ->join('postingan_found', 'postingan_found.id_postingan', '=', 'postingan.id_postingan')
    ->where('postingan_found.id_postingan', $dt->id_postingan)
    ->first();
  $gambar = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
    ->join('postingan_gambar', 'postingan_gambar.id_postingan', '=', 'postingan.id_postingan')
    ->where('postingan_gambar.id_postingan', $dt->id_postingan)
    ->get();
  ?>
  @if($dt->jenis_berita == "found")
  <div class="col-lg-12">
    <div class="card border-warning">
      <div class="card-header bg-primary text-white">{{$dt->name}}
        <span class="text" style="float: right;">{{$dt->nama_kategori}} | {{$dt->waktu_berita}} | {{tanggal_indonesia($dt->tanggal_berita)}}</span>
      </div>
      <div class="card-body">
        <h5 class="card-title">Tipe Postingan : Found</h5>
        <p class="card-text">
          Tempat Penemuan : {{$found->penemuan}} <br>
          <!-- {{$dt->detail_berita}} -->
          <?php
          $array = explode(PHP_EOL, $dt->detail_berita);
          $total = count($array);
          foreach ($array as $item) {
            echo "<span>" . $item . "</span><br>";
          }
          ?>
        </p>
        <div class="form-group text-center mt-5">
          @foreach($gambar as $gbr)
          <img src="{{asset('gambar')}}/{{$gbr->gambar}}" width="300" class="img-fluid">
          @endforeach
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-10"></div>
          @if(Auth::user()->level == "User")
          <div class="col-lg-1 text-center">
            <a href="" class="" data-toggle="modal" data-target="#laporkan{{$dt->id_postingan}}">
              <h4 class="text">
                <i class="fa fa-warning"></i> <br>
                <span class="text">Lapor</span>
              </h4>
            </a>
          </div>
          <div class="col-lg-1 text-center">
            @if(Auth::user()->id !== $dt->id)
            <a href="#">
              <h4 class="text">
                <i class="fa fa-check"></i> <br>
                <span class="text">Klaim</span>
              </h4>
            </a>
            @endif
          </div>
          @else
          <div class="col-lg-1 text-center">
            <a href="{{route('delete_postingan',$dt->id_postingan)}}?act={{md5($dt->kode)}}" onclick="return confirm('Lanjut untuk membuang Postingan?')">
              <h4 class="text">
                <i class="fa fa-trash"></i> <br>
                <span class="text">Buang</span>
              </h4>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="col-lg-12">
    <div class="card border-warning">
      <div class="card-header bg-danger text-white">{{$dt->name}}
        <span class="text" style="float: right;">{{$dt->nama_kategori}} | {{$dt->waktu_berita}} | {{tanggal_indonesia($dt->tanggal_berita)}} </span>
      </div>
      <div class="card-body">
        <h5 class="card-title">Tipe Postingan : Lost</h5>
        <p class="card-text">
          <?php $no = 1; ?>
          @foreach($lost as $lst)
          Lokasi {{$no}}. {{$lst->lokasi}} <br>
          <?php $no++; ?>
          @endforeach
          <br>
          <!-- {{$dt->detail_berita}} -->
          <?php
          $array = explode(PHP_EOL, $dt->detail_berita);
          $total = count($array);
          foreach ($array as $item) {
            echo "<span>" . $item . "</span><br>";
          }
          ?>
        </p>
        <div class="form-group text-center mt-5">
          @foreach($gambar as $gbr)
          <img src="{{asset('gambar')}}/{{$gbr->gambar}}" width="300" class="img-fluid">
          @endforeach
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-10"></div>
          @if(Auth::user()->level == "User")
          <div class="col-lg-1 text-center">
            <a href="" class="" data-toggle="modal" data-target="#laporkan{{$dt->id_postingan}}">
              <h4 class="text">
                <i class="fa fa-warning"></i> <br>
                <span class="text">Lapor</span>
              </h4>
            </a>
          </div>
          <div class="col-lg-1 text-center">
            @if(Auth::user()->id !== $dt->id)
            <a href="#">
              <h4 class="text">
                <i class="fa fa-check"></i> <br>
                <span class="text">Klaim</span>
              </h4>
            </a>
            @endif
          </div>
          @else
          <div class="col-lg-1 text-center">
            <a href="{{route('delete_postingan',$dt->id_postingan)}}?act={{md5($dt->kode)}}" onclick="return confirm('Lanjut untuk membuang Postingan?')">
              <h4 class="text">
                <i class="fa fa-trash"></i> <br>
                <span class="text">Buang</span>
              </h4>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endif

  @endforeach
</div>
@endsection