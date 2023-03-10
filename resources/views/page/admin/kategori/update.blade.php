<div class="modal fade text-left" id="edit{{$dt->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Update Data Kategori | {{$dt->nama_kategori}}</h5>
        <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form method="post" action="{{route('updatekategori',$dt->id_kategori)}}">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" value="{{$dt->nama_kategori}}" class="form-control" name="nama_kategori">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
          </button>
          <button class="btn btn-primary ml-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Accept</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>