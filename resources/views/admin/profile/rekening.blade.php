<form action="/account/profile/rekening" method="POST">
@method('PUT')
@csrf

 @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Bank<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <select name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" id="">
                <option value="">-- Nama Bank --</option>
                <option value="BRI" {{$profile->nama_bank == 'BRI' ? 'selected' : ''}}>BRI</option>
                <option value="BNI" {{$profile->nama_bank == 'BNI' ? 'selected' : ''}}>BNI</option>
                
              </select>
          @error('nama_bank')
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
          <label for="">Nama Rekening/Pemilik<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik"  value="{{isset($profile) ? $profile->nama_pemilik : old('nama_pemilik')}}" placeholder="Nama Rekening/Pemilik">
          @error('nama_pemilik')
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
          <label for="">Nomor Rekening<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nomor_rekening') is-invalid @enderror" name="nomor_rekening"  value="{{isset($profile) ? $profile->nomor_rekening : old('nomor_rekening')}}" placeholder="Nomor Rekening">
           @error('nomor_rekening')
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
