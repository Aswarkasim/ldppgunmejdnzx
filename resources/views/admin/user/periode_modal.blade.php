<!-- Button trigger modal -->
<button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModalPeriodeCreate">
  <i class="fas fa-edit"></i> Ubah Periode Verifikator
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalPeriodeCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Periode</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    

      <form action="/account/user/periode  " method="POST">
        @method('PUT')
        @csrf

      <div class="modal-body">
         <select class="form-control @error('periode_id') is-invalid @enderror" id="periode_id " name="periode_id" required>
            <option value="">Pilih Periode</option>
            @foreach ($periode as $item)
                <option value="{{$item->id}}" >{{$item->jenisPpg->name.' Periode '.$item->name}}</option>
            @endforeach
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>