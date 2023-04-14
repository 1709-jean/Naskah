@extends('layout/sbadmin')

@section('title','Form Klaim')

@section('content')
@foreach($postingan as $postingan)
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <label>Form Pengakuan Kepemilikan/Informasi Mengenai Barang
                </label>
                <hr>
                <div class="form-validation mt-3">
                    <form class="" action="{{route('ajukan_klaim',$id_postingan)}}" enctype="multipart/form-data" method="post">
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
                        @if($postingan->jenis_berita=="found")
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
                                <textarea class="form-control" rows="6" name="jawaban_klaim" required=""></textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Detail Berita</b>
                                <br>
                                <?php
                                $array = explode(PHP_EOL, $postingan->detail_berita);
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
                                <textarea class="form-control" rows="6" name="jawaban_klaim" required=""></textarea>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <b>Gambar</b>
                                <br>
                                *Opsional, jika anda memiliki gambar untuk memperkuat bukti kepemilikan
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Konfirmasi <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                    Klaim ini saya isi dengan sesuai dan benar.</label> <span class="css-control-indicator"></span> &nbsp;<input type="checkbox" required="" class="css-control-input" id="val-terms" name="val-terms" value="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 ml-auto">
                                @if($cek==NULL)
                                <button type="submit" class="btn form-control btn-primary">Kirim</button>
                                @else
                                <button class="btn btn-sm form-control bg-warning text-white" type="button">Anda telah mengajukan Klaim Berita/Postingan ini</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection