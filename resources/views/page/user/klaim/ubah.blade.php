@extends('layout/sbadmin')

@section('title','Form Ubah Klaim')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <label>Form Ubah Klaim | Pengakuan Kepemilikan Barang/Informasi Mengenai Barang
                </label>
                <hr>
                <div class="form-validation mt-3">
                    <form class="" action="{{route('update_klaim',$id_klaim)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> <i class="fa fa-info"></i> Panduan pengisian detail dan gambar</strong>
                                    <br>
                                    <ol type="1">
                                        <li>1. Pastikan barang tersebut adalah <b>milik anda</b>, karena Foto Profile Anda dapat dilihat oleh pembuat berita.</li>
                                        <li>2. Silahkan jawab pertanyaan sesuai yang Anda <b>ketahui</b> tentang barang tersebut.</li>
                                        <li>3. Silahkan unggah gambar dengan Tetap <b>menjaga data privasi Anda.</b></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @if($data->jenis_berita=="found")
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Pertanyaan :</b>
                                <br>
                                <?php
                                $array = explode(PHP_EOL, $found->pertanyaan);
                                $total = count($array);
                                foreach ($array as $item) {
                                    echo "<span>" . $item . "</span><br>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Jawaban</b>
                                <textarea class="form-control" rows="6" name="jawaban_klaim" required="">{{$data->jawaban_klaim}}</textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Detail Berita</b>
                                <br>
                                <?php
                                $array = explode(PHP_EOL, $data->detail_berita);
                                $total = count($array);
                                foreach ($array as $item) {
                                    echo "<span>" . $item . "</span><br>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Tempat Penemuan / Informasi Jawaban Anda</b>
                                <textarea class="form-control" rows="6" name="jawaban_klaim" required="">{{$data->jawaban_klaim}}</textarea>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <img src="{{asset('klaim')}}/{{$data->gambar_klaim}}" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"><a href="#">Konfirmasi</a> <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                    <input type="checkbox" required="" class="css-control-input" id="val-terms" name="val-terms" value="1"> <span class="css-control-indicator"></span> &nbsp; Klaim ini saya isi dengan sesuai dan benar.</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 ml-auto">
                                <button type="submit" class="btn form-control btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection