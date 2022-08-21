<div class="card">
  <div class="card-body">
    @if (Request::is('account/pamong/create'))
          <form action="/account/pamong" method="POST">  
        @else
          <form action="/account/pamong/{{$pamong->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
    <div class="row">
      

      <div class="col-md-6">
        {{-- make form group for fill the namalengkap --}}

         @if($errors->any())
            {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
        @endif

        <div class="form-group">
          <label for="nuptk">NUPTK</label>
          <input type="text" class="form-control  @error('nuptk') is-invalid @enderror" id="nuptk" value="{{isset($pamong) ? $pamong->nuptk : old('nuptk')}}" name="nuptk" placeholder="NUPTK">
           @error('nuptk')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="namalengkap">Nama Lengkap</label>
          <input type="text" class="form-control  @error('namalengkap') is-invalid @enderror" id="namalengkap" value="{{isset($pamong) ? $pamong->namalengkap : old('namalengkap')}}" name="namalengkap" placeholder="Nama Lengkap">
           @error('namalengkap')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nomor_serdik">Nomor Serdik</label>
          <input type="text" class="form-control  @error('nomor_serdik') is-invalid @enderror" id="nomor_serdik" value="{{isset($pamong) ? $pamong->nomor_serdik : old('nomor_serdik')}}" name="nomor_serdik" placeholder="Nomor Serdik">
           @error('nomor_serdik')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

         <div class="form-group">
          <label for="npwp">NPWP</label>
          <input type="text" class="form-control  @error('npwp') is-invalid @enderror" id="npwp" value="{{isset($pamong) ? $pamong->npwp : old('npwp')}}" name="npwp" placeholder="NPWP">
           @error('npwp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>
        
        

        <div class="form-group">
          <label for="nama_sekolah">Nama Sekolah</label>
          <input type="text" class="form-control  @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" value="{{isset($pamong) ? $pamong->nama_sekolah : old('nama_sekolah')}}" name="nama_sekolah" placeholder="Nama Sekolah">
           @error('nama_sekolah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="pangkat_golongan">Pangkat/Gologan</label>
          <input type="text" class="form-control  @error('pangkat_golongan') is-invalid @enderror" id="pangkat_golongan" value="{{isset($pamong) ? $pamong->pangkat_golongan : old('pangkat_golongan')}}" name="pangkat_golongan" placeholder="Pangkat/Gologan">
           @error('pangkat_golongan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

      </div>
      <div class="col-md-6">
        
        <div class="form-group">
          <label for="alamat_rumah">Alamat Rumah</label>
          <input type="text" class="form-control  @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" value="{{isset($pamong) ? $pamong->alamat_rumah : old('alamat_rumah')}}" name="alamat_rumah" placeholder="Alamat Rumah">
           @error('alamat_rumah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>


        <div class="form-group">
          <label for="nohp">No Hp</label>
          <input type="text" class="form-control  @error('nohp') is-invalid @enderror" id="nohp" value="{{isset($pamong) ? $pamong->nohp : old('nohp')}}" name="nohp" placeholder="No Hp">
           @error('nohp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nomor_rekening">Nomor Rekening BNI</label>
          <input type="text" class="form-control  @error('nomor_rekening') is-invalid @enderror" id="nomor_rekening" value="{{isset($pamong) ? $pamong->nomor_rekening : old('nomor_rekening')}}" name="nomor_rekening" placeholder="Nomor Rekening BNI">
           @error('nomor_rekening')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nama_pemilik">Nama Pemilik Rekening</label>
          <input type="text" class="form-control  @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" value="{{isset($pamong) ? $pamong->nama_pemilik : old('nama_pemilik')}}" name="nama_pemilik" placeholder="Nama Pemilik Rekening">
           @error('nama_pemilik')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

         <a href="/account/pamong" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </form>
  </div>
</div>