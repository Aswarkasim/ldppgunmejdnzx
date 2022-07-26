<form action="/account/profile/instansi" method="POST">
@method('PUT')
@csrf

<div class="row">
  <div class="col-md-6">

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

         <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Alamat Domisili<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili"  value="{{isset($profile) ? $profile->alamat_domisili : old('alamat_domisili')}}" placeholder="Alamat Domisili">
           @error('alamat_domisili')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
          
          <div class="row pt-1">
            <div class="col-md-6">
              <select class="form-control @error('provinsi_tempat_tinggal') is-invalid @enderror" id="province" name="provinsi_tempat_tinggal" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  <option value="{{$item->id}}" {{$item->id == $profile->provinsi_tempat_tinggal ? 'selected' : ''}} >{{$item->name}}</option>
                  {{-- <option value="{{$item->id}}"  >{{$item->name}}</option> --}}
                @endforeach
              </select>
               @error('provinsi_tempat_tinggal')
                <div class="invalid-feedback">
                {{$message}}
                </div>
              @enderror
              <div class="invalid-feedback">
                Please select a valid province.
              </div>
            </div>

             <div class="col-md-6">
               <select class="form-control @error('kabupaten_tempat_tinggal') is-invalid @enderror" id="city" name="kabupaten_tempat_tinggal" disabled required>
                    <option value="">Pilih Kota/Kabupaten</option>
                  </select>
                   @error('kabupaten_domisili')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                  @enderror
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
            </div>
          </div>
          

  
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
