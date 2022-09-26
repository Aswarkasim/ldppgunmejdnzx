<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalUploadParaf">
    Upload
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalUploadParaf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Upload TTD</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
  
        <form action="/account/surat/ppi/upload/paraf" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
        <div class="modal-body">
          <input type="hidden" value="{{$surat->id}}" name="id">
          <input type="file" name="paraf" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div>