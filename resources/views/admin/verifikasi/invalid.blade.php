<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalUpload{{$berkas_data->id}}">
  Tidak Valid
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalUpload{{$berkas_data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">{{$berkas_data->kelengkapan->name}}</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    

      <form action="/account/verifikasi/invalid/{{$berkas_data->id}}" method="POST" enctype="multipart/form-data">
        {{-- @method('PUT') --}}
        @csrf
      <div class="modal-body">
        <input type="hidden" name="user_id" value="{{$berkas_data->user_id}}">
        <input type="hidden" name="id" value="{{$berkas_data->id}}">
        <textarea name="message" class="form-control" id="" placeholder="Isikan pesan ditolak" required cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>