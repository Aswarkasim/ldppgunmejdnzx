<h4 class="bg-primary p-2"><b>Status</b></h4>
<table class="table">
  <tr>
    <td>Status Keaktifan</td>
    <td>: {{$mahasiswa->keaktifan}}</td>
  </tr>
  <tr>
    <td>Berkas</td>
    <td>: 
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalUploadBuktiBerkas">
        <i class="fas fa-upload"></i> {{$mahasiswa->bukti_keaktifan != null ? 'Lihat' : 'Upload'}}
      </button>
    </td>
  </tr>

</table>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalUploadBuktiBerkas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/account/mahasiswa/biodata/bukti/upload" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="mahasiswa_id" value="{{$mahasiswa->id}}">
        <div class="modal-body">
          <div class="form-group">
            <label for="">File Excel</label>
            <input type="file" name="bukti_keaktifan" required class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">{{$mahasiswa->bukti_keaktifan != null ? 'Ubah' : 'Upload'}}</button>
        </div>
      </form>

      @if ($mahasiswa->bukti_keaktifan != null)
          
      <embed src="/{{$mahasiswa->bukti_keaktifan}}" type="application/pdf" width="100%" height="600px">
        @endif

    </div>
  </div>
</div>