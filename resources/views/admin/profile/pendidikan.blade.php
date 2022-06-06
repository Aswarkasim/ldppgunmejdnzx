<form action="/account/profile/pendidikan" method="POST">
@method('PUT')
@csrf

<div class="row">

    <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Perguruan Tnggi S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('perguruan_tinggi_s1') is-invalid @enderror" name="perguruan_tinggi_s1" value="{{isset($profile) ? $profile->perguruan_tinggi_s1 : old('perguruan_tinggi_s1')}}" placeholder="Perguruan Tnggi S1">
        </div>
      </div>
      @error('perguruan_tinggi_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Prodi S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_prodi_s1') is-invalid @enderror" name="nama_prodi_s1" value="{{isset($profile) ? $profile->nama_prodi_s1 : old('nama_prodi_s1')}}" placeholder="Nama Prodi S1">
        </div>
      </div>
      @error('nama_prodi_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>


    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nomot Ijazah S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nomor_ijazah_s1') is-invalid @enderror" name="nomor_ijazah_s1" value="{{isset($profile) ? $profile->nomor_ijazah_s1 : old('nomor_ijazah_s1')}}" placeholder="Nomot Ijazah S1">
        </div>
      </div>
      @error('nomor_ijazah_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">IPK S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('ipk_s1') is-invalid @enderror" name="ipk_s1" value="{{isset($profile) ? $profile->ipk_s1 : old('ipk_s1')}}" placeholder="IPK S1">
        </div>
      </div>
      @error('ipk_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Tanggal Kelulusan S1</label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_kelulusan_s1') is-invalid @enderror" name="tanggal_kelulusan_s1" value="{{isset($profile) ? $profile->tanggal_kelulusan_s1 : old('tanggal_kelulusan_s1')}}" placeholder="Tanggal Kelulusan S1">
        </div>
      </div>
      @error('tanggal_kelulusan_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  
     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Alamat Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_pt_s1') is-invalid @enderror" name="alamat_pt_s1" value="{{isset($profile) ? $profile->alamat_pt_s1 : old('alamat_pt_s1')}}" placeholder="Alamat Perguruan Tinggi">
        </div>
      </div>
      @error('alamat_pt_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Kabupaten/ Kota Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('kabupaten_kota_pt_s1') is-invalid @enderror" name="kabupaten_kota_pt_s1" value="{{isset($profile) ? $profile->kabupaten_kota_pt_s1 : old('kabupaten_kota_pt_s1')}}" placeholder="Kabupaten/ Kota Perguruan Tinggi">
        </div>
      </div>
      @error('kabupaten_kota_pt_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Provinsi Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('provinsi_pt_s1') is-invalid @enderror" name="provinsi_pt_s1" value="{{isset($profile) ? $profile->provinsi_pt_s1 : old('provinsi_pt_s1')}}" placeholder="Kabupaten/ Kota Perguruan Tinggi">
        </div>
      </div>
      @error('provinsi_pt_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    {{-- <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Unggah</label>
        </div>
        <div class="col-md-9">
          <button class="btn btn-primary btn-sm">Unggah KK</button>
          <button class="btn btn-primary btn-sm">Unggah KTP</button>
        </div>
      </div>
    </div> --}}
  </div>
  
  <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Perguruan Tinggi S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('perguruan_tinggi_s2') is-invalid @enderror" name="perguruan_tinggi_s2" value="{{isset($profile) ? $profile->perguruan_tinggi_s2 : old('perguruan_tinggi_s2')}}" placeholder="Perguruan Tinggi S2">
        </div>
      </div>
      @error('perguruan_tinggi_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Prodi S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_prodi_s2') is-invalid @enderror" name="nama_prodi_s2" value="{{isset($profile) ? $profile->nama_prodi_s2 : old('nama_prodi_s2')}}" placeholder="Nama Prodi S2">
        </div>
      </div>
      @error('nama_prodi_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

  
    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nomot Ijazah S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nomor_ijazah_s2') is-invalid @enderror" name="nomor_ijazah_s2" value="{{isset($profile) ? $profile->nomor_ijazah_s2 : old('nomor_ijazah_s2')}}" placeholder="Nomot Ijazah S2">
        </div>
      </div>
      @error('nomor_ijazah_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">IPK S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('ipk_s2') is-invalid @enderror" name="ipk_s2" value="{{isset($profile) ? $profile->ipk_s2 : old('ipk_s2')}}" placeholder="IPK S2">
        </div>
      </div>
      @error('ipk_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Tanggal Kelulusan S2</label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_kelulusan_s2') is-invalid @enderror" name="tanggal_kelulusan_s2" value="{{isset($profile) ? $profile->tanggal_kelulusan_s2 : old('tanggal_kelulusan_s2')}}" placeholder="Tanggal Kelulusan S2">
        </div>
      </div>
      @error('tanggal_kelulusan_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  
     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Alamat Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_pt_s2') is-invalid @enderror" name="alamat_pt_s2" value="{{isset($profile) ? $profile->alamat_pt_s2 : old('alamat_pt_s2')}}" placeholder="Alamat Perguruan Tinggi">
        </div>
      </div>
      @error('alamat_pt_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Kabupaten/ Kota Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('kabupaten_kota_pt_s2') is-invalid @enderror" name="kabupaten_kota_pt_s2" value="{{isset($profile) ? $profile->kabupaten_kota_pt_s2 : old('kabupaten_kota_pt_s2')}}" placeholder="Kabupaten/ Kota Perguruan Tinggi">
        </div>
      </div>
      @error('kabupaten_kota_pt_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Provinsi Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('provinsi_pt_s2') is-invalid @enderror" name="provinsi_pt_s2" value="{{isset($profile) ? $profile->provinsi_pt_s2 : old('provinsi_pt_s2')}}" placeholder="Kabupaten/ Kota Perguruan Tinggi">
        </div>
      </div>
      @error('provinsi_pt_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    {{-- <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Unggah</label>
        </div>
        <div class="col-md-9">
          <button class="btn btn-primary btn-sm">Unggah KK</button>
          <button class="btn btn-primary btn-sm">Unggah KTP</button>
        </div>
      </div>
    </div> --}}


  </div>

  
</div>

<div class="row">
  <div class="col-md-3">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>

</form>

