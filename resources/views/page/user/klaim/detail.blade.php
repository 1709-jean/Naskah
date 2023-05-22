<div class="modal fade" id="actklaim{{$dt->id_klaim}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Klaim Diterima </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <p>
                                <b>Klaim anda di terima oleh pembuat berita
                                    @if($dt->jenis_berita == "found")
                                    ,silahkan menghubungi nomor di bawah ini
                                    @else
                                    ,mohon menunggu untuk dihubungi oleh Pengunggah Berita
                                    @endif
                                </b>
                            </p>
                        </div>
                    </div>
                    @if($dt->jenis_berita=="found")
                    <div class="col-lg-12 text-center">
                        @foreach($namaPembuat as $namap)
                        @if($namap->id_user==$dt->id)
                        {{$namap->telepon}}
                        <br> Atau bisa <br>
                        <a target="_blank" class="badge bg-success text-white" href="https://wa.me/62{{substr($namap->telepon,1)}}" target="_blank">
                            WhatsApp <i class="fa fa-whatsapp"></i>
                        </a>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>