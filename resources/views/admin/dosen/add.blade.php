<div class="card">
  <div class="card-body">
    @if (Request::is('account/dosen/create'))
          <form action="/account/dosen" method="POST">  
        @else
          <form action="/account/dosen/{{$dosen->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
    <div class="row">
      

      <div class="col-md-6">
        {{-- make form group for fill the namalengkap --}}

        <div class="form-group">
          <label for="nip">NIDN</label>
          <input type="text" class="form-control  @error('nip') is-invalid @enderror" id="nip" value="{{isset($dosen) ? $dosen->nip : old('nip')}}" name="nip" placeholder="NIDN">
           @error('nip')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nomor_serdos">Nomor Serdos</label>
          <input type="text" class="form-control  @error('nomor_serdos') is-invalid @enderror" id="nomor_serdos" value="{{isset($dosen) ? $dosen->nomor_serdos : old('nomor_serdos')}}" name="nomor_serdos" placeholder="Nomor Serdos">
           @error('nomor_serdos')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>
        
        <div class="form-group">
          <label for="namalengkap">Nama Lengkap</label>
          <input type="text" class="form-control  @error('namalengkap') is-invalid @enderror" id="namalengkap" value="{{isset($dosen) ? $dosen->namalengkap : old('namalengkap')}}" name="namalengkap" placeholder="Nama Lengkap">
           @error('namalengkap')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="npwp">NPWP</label>
          <input type="text" class="form-control  @error('npwp') is-invalid @enderror" id="npwp" value="{{isset($dosen) ? $dosen->npwp : old('npwp')}}" name="npwp" placeholder="NPWP">
           @error('npwp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="pangkat_golongan">Pangkat/Gologan</label>
          <input type="text" class="form-control  @error('pangkat_golongan') is-invalid @enderror" id="pangkat_golongan" value="{{isset($dosen) ? $dosen->pangkat_golongan : old('pangkat_golongan')}}" name="pangkat_golongan" placeholder="Pangkat/Gologan">
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
          <input type="text" name="alamat_rumah" class="form-control  @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" value="{{isset($dosen) ? $dosen->alamat_rumah : old('alamat_rumah')}}"  placeholder="Alamat Rumah">
           @error('alamat_rumah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>


        <div class="form-group">
          <label for="nohp">No Hp</label>
          <input type="text" class="form-control  @error('nohp') is-invalid @enderror" id="nohp" value="{{isset($dosen) ? $dosen->nohp : old('nohp')}}" name="nohp" placeholder="No Hp">
           @error('nohp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nomor_rekening">Nomor Rekening BNI</label>
          <input type="text" class="form-control  @error('nomor_rekening') is-invalid @enderror" id="nomor_rekening" value="{{isset($dosen) ? $dosen->nomor_rekening : old('nomor_rekening')}}" name="nomor_rekening" placeholder="Nomor Rekening BNI">
           @error('nomor_rekening')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

        <div class="form-group">
          <label for="nama_pemilik">Nama Pemilik Rekening</label>
          <input type="text" class="form-control  @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" value="{{isset($dosen) ? $dosen->nama_pemilik : old('nama_pemilik')}}" name="nama_pemilik" placeholder="Nama Pemilik Rekening">
           @error('nama_pemilik')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
        </div>

         <a href="/account/dosen" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </form>
  </div>
</div>