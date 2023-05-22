@extends('layout/sbadmin')

@section('title','Form Tambah Berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <label>Form Tambah Berita
                </label>
                <div class="form-validation mt-3">
                    <form class="" action="{{route('add_postingan')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }} <br>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Jenis Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-3 text-center">
                                LOST
                                <input type="radio" id="btn-lost" value="lost" name="jenis_berita" class="btn mb-1 btn-rounded form-control btn-danger btn-sm">
                            </div>
                            <div class="col-lg-3 text-center">
                                FOUND
                                <input type="radio" id="btn-found" value="found" name="jenis_berita" class="btn mb-1 btn-rounded form-control btn-outline-primary btn-sm">
                            </div>
                        </div>
                        <div class="form-group row" id="form-found1" style="display: none;">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> <i class="fa fa-info"></i> Panduan pemberitahuan pertanyaan validasi kepemilikan</strong>
                                    <br>
                                    <ol type="1">
                                        <li> Berikan pertanyaan yang spesifik terkait barang yang ditemukan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="form-found2" style="display: none;">
                            <label class="col-lg-4 col-form-label" for="val-username">Pertanyaan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="5" id="pertanyaan" name="pertanyaan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" id="form-found3" style="display: none;">
                            <label class="col-lg-4 col-form-label" for="val-username">Tempat Penemuan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="penemuan" id="penemuan" rows="5"></textarea>
                            </div>
                        </div>
                        <!-- 
                        <div class="form-group row" id="panduanlokasi" style="display: none;">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> <i class="fa fa-info"></i> Panduan Lokasi</strong>
                                    <br>
                                    <ol type="1">
                                        <li>Pada form pertama lokasi harap mencantumkan lokasi kota kejadian. Misalnya, <strong>Yogyakarta, Jakarta, Tangerang</strong></li>
                                    </ol>
                                </div>
                            </div>
                        </div> -->

                        @for($i=1; $i<=3; $i++)<div class="form-group row" id="form-lost{{$i}}" style="display: none;">
                            <label class="col-lg-4 col-form-label" for="val-username"> Titik Lokasi {{$i}} <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="" name="lokasi[]" id="lokasi{{$i}}" class="form-control" name="">
                            </div>
                </div>
                @endfor
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-skill">Kategori <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <select class="form-control" name="id_kategori" required="">
                            <option value="">.: PILIH KATEGORI :.</option>
                            @foreach($kategori as $ktg)
                            <option value="{{$ktg->id_kategori}}">{{$ktg->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="alert alert-warning alert-dismissible fade show">

                            <strong> <i class="fa fa-info"></i> Panduan pengisian detail dan gambar</strong>
                            <br>
                            <ol type="1">
                                <li>Harap mencantumkan informasi fisik dengan <b>detail</b>, namun tetap <b>menjaga privasi</b> dari barang/dokumen/hewan tersebut</li>
                                <li> Gambar yang dapat di unggah minimal 1 gambar.</li>
                                <li> Gambar yang dilampirkan harus tetap <b>menjaga privasi</b> dari barang/dokumen/hewan tersebut. Jika ingin memfoto dokumen penting <b>silahkan blur</b> informasi yang mengandung privasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">Detail Berita <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <textarea class="form-control" required="" name="detail_berita" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row" id="after-add-more">
                    <label class="col-lg-4 col-form-label" for="val-username">Gambar <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="file" class="form-control" name="gambar[]" accept=".jpg, .jpeg, .png" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-6">
                        <button type="button" id="add-more" class="btn btn-sm text-white btn-success rounded-pill">
                            <i class="fa fa-plus"></i> Tambah Gambar
                        </button>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Konfirmasi <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <label class="lab">&nbsp; Berita yang saya buat adalah benar.
                            <input type="checkbox" required="">
                            <span class="cekmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-primary" id="submit">Kirim</button>
                    </div>
                </div>
                </form>
                <div class="form-group row" id="copy">
                    <div class="form-group row" id="control-group">
                        <label class="col-lg-4 col-form-label" for="val-username">Gambar <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" name="gambar[]" required="">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-sm btn-danger form-control" id="remove"><i class="ti ti-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection