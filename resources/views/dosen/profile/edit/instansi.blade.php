<form action="/account/dosen/instansi" method="POST">
@method('PUT')
@csrf

 @if($errors->any())
        {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
    @endif
    
<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Perguruan Tinggi<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_instansi') is-invalid @enderror" name="nama_instansi"  value="{{isset($profile) ? $profile->nama_instansi : old('nama_instansi')}}" placeholder="Nama Instansi">
        </div>
      </div>
      @error('nama_instansi')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Fakultas<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas"  value="{{isset($profile) ? $profile->fakultas : old('fakultas')}}" placeholder="Instansi">
          @error('fakultas')
            <div class="invalid-feedback">
            {{$message}}
            </div>
          @enderror
        </div>
      </div>
      
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Jurusan<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"  value="{{isset($profile) ? $profile->jurusan : old('jurusan')}}" placeholder="Jurusan">
          @error('jurusan')
            <div class="invalid-feedback">
            {{$message}}
            </div>
          @enderror
        </div>
      </div>
      
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Prodi<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi"  value="{{isset($profile) ? $profile->prodi : old('prodi')}}" placeholder="Prodi">
          @error('prodi')
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
