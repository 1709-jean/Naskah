<div class="modal fade text-left" id="detail{{$dt->id_klaim}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Detaill Klaim | {{$dt->name}}</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{route('updatekategori',$dt->id_kategori)}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-6">
                            <div class="form-group">
                                <label>NIK</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{$dt->nik}}</label>
                            </div>
                        </div> -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{$dt->name}}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Foto Profil</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <a href="{{asset('ktp')}}/{{$dt->ktp}}" target="_blank"><img src="{{asset('ktp')}}/{{$dt->ktp}}" class="img-fluid" width="1000" height="1000"></a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jawaban/Informasi Yang Diberikan :</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <?php
                                $array = explode(PHP_EOL, $dt->jawaban_klaim);
                                $total = count($array);
                                foreach ($array as $item) {
                                    echo "<span>" . $item . "</span><br>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Gambar Bukti</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <a href="{{asset('klaim')}}/{{$dt->gambar_klaim}}" target="_blank"><img src="{{asset('klaim')}}/{{$dt->gambar_klaim}}" class="img-fluid" width="1000" height="1000"></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-primary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>