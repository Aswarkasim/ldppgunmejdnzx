<form action="/account/profile/instansi" method="POST">
@method('PUT')
@csrf

<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for=""> Angkatan PPG<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('angkatan_id') is-invalid @enderror" name="angkatan_id"  value="{{isset($profile) ? $profile->angkatan_id : old('angkatan_id')}}" placeholder="Angkatan PPG">
        </div>
      </div>
      @error('angkatan_id')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>
    
    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Bidang Studi<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('bidang_studi_id') is-invalid @enderror" name="bidang_studi_id"  value="{{isset($profile) ? $profile->bidang_studi_id : old('bidang_studi_id')}}" placeholder="Bidang Studi">
        </div>
      </div>
      @error('bidang_studi_id')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Instansi<span class="text-danger">*</span></label>
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

   

  </div>

  <div class="col-md-6">


     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">NPSN<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('npsn_sekolah') is-invalid @enderror" name="npsn_sekolah"  value="{{isset($profile) ? $profile->npsn_sekolah : old('npsn_sekolah')}}" placeholder="NPSN">
        </div>
      </div>
      @error('npsn_sekolah')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Jenjang Pendidikan<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('jenjang_pendidikan') is-invalid @enderror" name="jenjang_pendidikan"  value="{{isset($profile) ? $profile->jenjang_pendidikan : old('jenjang_pendidikan')}}" placeholder="Jenjang Pendidikan">
        </div>
      </div>
      @error('jenjang_pendidikan')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Alamat Instansi<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi"  value="{{isset($profile) ? $profile->alamat_instansi : old('alamat_instansi')}}" placeholder="Alamat Instansi">
        </div>
      </div>
      @error('alamat_instansi')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>
    
  </div>

</div>

<div class="row">
  <div class="col-md-3">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>

</form>
