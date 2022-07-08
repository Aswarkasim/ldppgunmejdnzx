<form action="/account/profile/pasfoto" method="POST">
@method('PUT')
@csrf

<input type="hidden" name="id" value="{{$profile->id}}">
<div class="row">
 <div class="col-md-6">
  <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Pas Foto<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="file" class="form-control @error('pasfoto') is-invalid @enderror" name="pasfoto"  value="{{isset($profile) ? $profile->pasfoto : old('pasfoto')}}" required placeholder="Akreditasi Sekolah">
          <small>Pastika foto berukuran 3X4</small>

          @error('pasfoto')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
        
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

