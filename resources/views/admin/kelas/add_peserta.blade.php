<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalAddPeserta">
  <i class="fas fa-plus"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalAddPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/account/kelas/peserta/create" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">No.UKG</label>
            <input type="hidden" name="kelas_id" value="{{request()->segment(3)}}">
            <input type="text" name="no_ukg" class="form-control" placeholder="Masukkan No. UKG/Peg.ID">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>