<div class="card">
    <div class="card-body">
        <form action="/account/ppi/bukti/upload" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    
    <input type="hidden" name="id" value="{{$ppi->id}}">
    <div class="row">
     <div class="col-md-6">

  
            
      <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="">File Scan PDF<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-9">
              <input type="file" class="form-control @error('bukti_selesai') is-invalid @enderror" name="bukti_selesai"  value="{{isset($ppi) ? $ppi->bukti_selesai : old('bukti_selesai')}}" required placeholder="Akreditasi Sekolah">
              <small>Hanya menerima format pdf. Maksimal 200 KB</small>
    
              @error('bukti_selesai')
              <div class="invalid-feedback">
              {{$message}}
              </div>
    
              @enderror
              
              @if ($ppi->bukti_selesai != null)
              <div class="alert alert-success"><i class="fas fa-check"></i> Telah diupload</div>
              @endif
            </div>
          </div>
          
        </div>
        
     </div>
     </div>
    
   
    
    <div class="row">
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
    
    </form>
    
        
</div>
</div>
    