<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCopy">
  <i class="fas fa-copy"></i> Copy
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCopy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"></div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salin Data Kelengkapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/account/kelengkapan/copy" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="">File Excel</label>
            <input type="file" name="file" class="form-control">
            <p>*Hanya menerima format xls dan xlsx. Ikuti formati berikut sbelum mengupload <a href=""><i class="fas fa-download"></i> Download</a></p>
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

 
