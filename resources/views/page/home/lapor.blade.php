<div class="modal fade" id="laporkan{{$dt->id_postingan}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporkan Postingan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Apakah konten menyinggung SARA dan seksualitas? Jika YA silahkan Klik Laporkan!</label>
                            <input type="" hidden="" id="id_postingan-{{$dt->id_postingan}}" name="">
                            <textarea class="form-control " rows="5" id="keterangan-{{$dt->id_postingan}}" placeholder="Konten mengandung SARA."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-{{$dt->id_postingan}}" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary more">Laporkan</button> -->
                <button type="button" class="btn btn-primary more" more_id="{{$dt->id_postingan}}">Laporkan</button>
            </div>
        </div>
    </div>
</div>