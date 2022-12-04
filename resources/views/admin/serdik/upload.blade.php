<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalSerdik">
  <i class="fas fa-upload"></i> Import File Sertifikat
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalSerdik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Fil ZIP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/account/serdik/upload" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">File ZIP</label>
            <input type="file" name="serdik" class="form-control">
            <p class="text-info pt-2">*Hanya menerima format ZIP. File sertifikat disatukan dalam format Zip.</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>