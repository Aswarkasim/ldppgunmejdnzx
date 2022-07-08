<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">


          <form action="/account/konfigurasi/update" method="POST">  
            @method('PUT')
          @csrf

          <div class="form-group">
            <label for="">Nama Aplikasi</label>
            <input type="text" class="form-control  @error('app_name') is-invalid @enderror"  name="app_name"  value="{{isset($konfigurasi) ? $konfigurasi->app_name : old('app_name')}}" placeholder="Nama">
             @error('app_name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control  @error('alamat') is-invalid @enderror"  name="alamat"  value="{{isset($konfigurasi) ? $konfigurasi->alamat : old('alamat')}}" placeholder="Alamat">
             @error('alamat')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Kontak 1</label>
            <input type="text" class="form-control  @error('nohp_1') is-invalid @enderror"  name="nohp_1"  value="{{isset($konfigurasi) ? $konfigurasi->nohp_1 : old('nohp_1')}}" placeholder="Kontak 1">
             @error('nohp_1')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

           <div class="form-group">
            <label for="">Kontak 2</label>
            <input type="text" class="form-control  @error('nohp_2') is-invalid @enderror"  name="nohp_2"  value="{{isset($konfigurasi) ? $konfigurasi->nohp_2 : old('nohp_2')}}" placeholder="Kontak 2">
             @error('nohp_2')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror"  name="email"  value="{{isset($konfigurasi) ? $konfigurasi->email : old('email')}}" placeholder="Email">
             @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Maps</label>
            <input type="text" class="form-control  @error('maps') is-invalid @enderror"  name="maps"  value="{{isset($konfigurasi) ? $konfigurasi->maps : old('maps')}}" placeholder="Maps">
             @error('maps')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

       

          <a href="/admin/konfigurasi" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

