<div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Menambah Data Kategori</h5>
            <button type="button" id="add-more" class="btn btn-sm btn-success rounded-pill">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('addkategori')}}" enctype="multipart/form-data">
                @csrf
                <div class="row" id="after-add-more">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Katgeori</label>
                            <input type="text" class="form-control" required="" name="nama_kategori[]">
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-primary form-control">Tambah</button>
            </form>
            <div class="row" id="copy">
                <div class="row" id="control-group">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Katgeori</label>
                            <input type="text" class="form-control" required="" name="nama_kategori[]">
                            <button class="btn btn-sm btn-danger form-control mt-2" id="remove"><i class="ti ti-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>