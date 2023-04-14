@extends('layout/sbadmin')

@section('title',"$data->jenis_berita")

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <label>Edit Postingan
                </label>
                <div class="form-validation mt-3">
                    <form class="" action="{{route('update_postingan',$data->id_postingan)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Jenis Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-3 text-center">
                                LOST
                                <input type="radio" disabled="" <?php if ($data->jenis_berita == "lost") {
                                                                    echo "checked";
                                                                } ?> value="lost" class="btn mb-1 btn-rounded form-control btn-danger btn-sm">
                            </div>
                            <div class="col-lg-3 text-center">
                                FOUND
                                <input type="radio" disabled="" value="found" <?php if ($data->jenis_berita == "found") {
                                                                                    echo "checked";
                                                                                } ?> class="btn mb-1 btn-rounded form-control btn-outline-primary btn-sm">
                            </div>
                            <input type="hidden" value="{{$data->jenis_berita}}" name="jenis_berita">
                        </div>
                        @if($data->jenis_berita=="found")
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> <i class="fa fa-info"></i> Panduan pemberitahuan pertanyaan validasi kepemilikan</strong>
                                    <br>
                                    <ol type="1">
                                        <li>1. Berikan pertanyaan yang spesifik terkait barang yang ditemukan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Pertanyaan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="hidden" value="{{$found->id_found}}" name="id_found">
                                <textarea class="form-control" rows="5" name="pertanyaan" required="">{{$found->pertanyaan}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Tempat Penemuan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="penemuan" required="" rows="5">{{$found->penemuan}}</textarea>
                            </div>
                        </div>
                        @endif
                        @if($data->jenis_berita=="lost")
                        <?php $no = 1; ?>
                        @foreach($lost as $lst)
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username"> Titik Lokasi {{$no}} <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="checkbox" checked="" hidden="" value="{{$lst->lokasi}}" name="pilih[]">
                                <input type="hidden" name="lokasi_at[]" value="{{$lst->lokasi}}" class="form-control">
                                <input type="text" name="lokasi[]" value="{{$lst->lokasi}}" class="form-control">
                                <input type="hidden" name="id_lost[]" value="{{$lst->id_lost}}" class="form-control">
                            </div>
                        </div>
                        <?php $no++; ?>
                        @endforeach
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Kategori <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="id_kategori" required="">
                                    <option value="">.: PILIH KATEGORI :.</option>
                                    @foreach($kategori as $ktg)
                                    <option <?php if ($ktg->nama_kategori == $data->nama_kategori) {
                                                echo "selected";
                                            } ?> value="{{$ktg->id_kategori}}">{{$ktg->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> <i class="fa fa-info"></i> Panduan pengisian detail dan gambar</strong>
                                    <br>
                                    <ol type="1">
                                        <li>1. Harap mencantumkan informasi fisik dengan <b>detail</b>, namun tetap <b>menjaga privasi</b> dari barang/dokumen/hewan tersebut</li>
                                        <li>2. Gambar yang dapat di unggah minimal 2 gambar.</li>
                                        <li>3. Gambar yang dilampirkan harus tetap <b>menjaga privasi</b> dari barang/dokumen/hewan tersebut. Jika ingin memfoto dokumen penting <b>silahkan edit blur</b> informasi yang mengandung privasi</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-username">Detail Berita <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" required="" name="detail_berita" rows="5">{{$data->detail_berita}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <div class="col-lg-4"></div> -->
                            @foreach($gambar as $gbr)
                            <div class="col-lg-4">
                                <img src="{{asset('gambar')}}/{{$gbr->gambar}}" class="img-fluid">
                            </div>
                            @endforeach
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
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection