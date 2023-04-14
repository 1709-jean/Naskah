<div class="modal fade" id="actklaim{{$dt->id_klaim}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Klaim Diterima </h5>
                <!-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <p>
                                <b>Klaim di terima oleh Anda
                                    @if($dt->jenis_berita == "lost")
                                    <br>silahkan menghubungi nomor di bawah ini
                                    @else
                                    <br>mohon menunggu untuk dihubungi oleh Pengunggah Berita
                                    <hr>
                                    @endif
                                </b>
                            </p>
                        </div>
                    </div>
                    @if($dt->jenis_berita=="lost")
                    <div class="col-lg-12 text-center">
                        {{$dt->telepon}}
                        <br> Atau bisa <br>
                        <a target="_blank" class="badge bg-success text-white" href="https://wa.me/62{{substr($dt->telepon,1)}}" target="_blank">
                            WhatsApp
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>