<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-upload"></i> Import
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/account/serdik/import" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">File Excel</label>
            <input type="file" name="file" class="form-control">
            <p>*Hanya menerima format xls dan xlsx. Ikuti formati berikut sebelum mengupload <a href="/account/serdik/download"><i class="fas fa-download"></i> Download</a></p>
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