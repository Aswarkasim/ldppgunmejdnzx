<form action="/account/profile/pendidikan" method="POST">
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
          <label for="">Nama Perguruan Tinggi S1</label>
      </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pt_s1') is-invalid @enderror" name="pt_s1" value="{{isset($profile) ? $profile->pt_s1 : old('pt_s1')}}" placeholder="Nama Perguruan Tinggi S1">
           @error('pt_s1')
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
          <label for="">Nama Prodi S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_prodi_s1') is-invalid @enderror" name="nama_prodi_s1" value="{{isset($profile) ? $profile->nama_prodi_s1 : old('nama_prodi_s1')}}" placeholder="Nama Prodi S1">
           @error('nama_prodi_s1')
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
          <label for="">Nomor Ijazah S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nomor_ijazah_s1') is-invalid @enderror" name="nomor_ijazah_s1" value="{{isset($profile) ? $profile->nomor_ijazah_s1 : old('nomor_ijazah_s1')}}" placeholder="Nomor Ijazah S1">
           @error('nomor_ijazah_s1')
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
          <label for="">IPK S1</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('ipk_s1') is-invalid @enderror" name="ipk_s1" value="{{isset($profile) ? $profile->ipk_s1 : old('ipk_s1')}}" placeholder="IPK S1">
           @error('ipk_s1')
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
          <label for="">Tanggal Kelulusan S1</label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_kelulusan_s1') is-invalid @enderror" name="tanggal_kelulusan_s1" value="{{isset($profile) ? $profile->tanggal_kelulusan_s1 : old('tanggal_kelulusan_s1')}}" placeholder="Tanggal Kelulusan S1">
           @error('tanggal_kelulusan_s1')
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
          <label for="">Alamat Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_pt_s1') is-invalid @enderror" name="alamat_pt_s1" value="{{isset($profile) ? $profile->alamat_pt_s1 : old('alamat_pt_s1')}}" placeholder="Alamat Perguruan Tinggi">
           @error('alamat_pt_s1')
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
          <label for=""></label>
        </div>
        <div class="col-md-9">
          <div class="row pt-1">
            <div class="col-md-6">
              <select class="form-control" id="province_s1" name="provinsi_pt_s1" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  <option value="{{$item->id}}" {{$item->id == $profile->provinsi_pt_s1 ? 'selected' : ''}} >{{$item->name}}</option>
                @endforeach
              </select>
               @error('provinsi_pt_s1')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              <div class="invalid-feedback">
                Please select a valid province.
              </div>
            </div>

              <div class="col-md-6">
                <select class="form-control" id="city_s1" name="kabupaten_kota_pt_s1" disabled required>
                    <option value="">Pilih Kota/Kabupaten</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
            </div>
          </div>
        </div>
      </div>
     
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
          <label for="">Nama Perguruan Tinggi S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pt_s2') is-invalid @enderror" name="pt_s2" value="{{isset($profile) ? $profile->pt_s2 : old('pt_s2')}}" placeholder="Perguruan Tinggi S2">
           @error('pt_s2')
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
          <label for="">Nama Prodi S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_prodi_s2') is-invalid @enderror" name="nama_prodi_s2" value="{{isset($profile) ? $profile->nama_prodi_s2 : old('nama_prodi_s2')}}" placeholder="Nama Prodi S2">
            @error('nama_prodi_s2')
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
          <label for="">Nomor Ijazah S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nomor_ijazah_s2') is-invalid @enderror" name="nomor_ijazah_s2" value="{{isset($profile) ? $profile->nomor_ijazah_s2 : old('nomor_ijazah_s2')}}" placeholder="Nomor Ijazah S2">
           @error('nomor_ijazah_s2')
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
          <label for="">IPK S2</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('ipk_s2') is-invalid @enderror" name="ipk_s2" value="{{isset($profile) ? $profile->ipk_s2 : old('ipk_s2')}}" placeholder="IPK S2">
          @error('ipk_s2')
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
          <label for="">Tanggal Kelulusan S2</label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_kelulusan_s2') is-invalid @enderror" name="tanggal_kelulusan_s2" value="{{isset($profile) ? $profile->tanggal_kelulusan_s2 : old('tanggal_kelulusan_s2')}}" placeholder="Tanggal Kelulusan S2">
          @error('tanggal_kelulusan_s2')
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
          <label for="">Alamat Perguruan Tinggi</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_pt_s2') is-invalid @enderror" name="alamat_pt_s2" value="{{isset($profile) ? $profile->alamat_pt_s2 : old('alamat_pt_s2')}}" placeholder="Alamat Perguruan Tinggi">
           @error('alamat_pt_s2')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          <div class="row pt-1">
            <div class="col-md-6">
              <select class="form-control" id="province_s2" name="provinsi_pt_s2" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  <option value="{{$item->id}}" {{$item->id == $profile->provinsi_pt_s2 ? 'selected' : ''}} >{{$item->name}}</option>
                @endforeach
              </select>
              @error('provinsi_pt_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror

              <div class="invalid-feedback">
                Please select a valid province.
              </div>
            </div>

              <div class="col-md-6">
                <select class="form-control" id="city_s2" name="kabupaten_kota_pt_s2" disabled required>
                    <option value="">Pilih Kota/Kabupaten</option>
                  </select>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(){
    // $('#province_s2 option[value=""]').prop('selected',true);
    // $('#city_s2 option[value!=""]').remove();

    province = $('#province_s2')
    province.on('change', function() {
        $this = $(this)
        city = $('#city_s2')

        if ($this.val() !== '') {
            $.ajax({
                url: "{{url('/get-regency')}}" +'/' +$this.val() , 
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if (response !== 'NOT OK') {
                        city.removeAttr('disabled')
                        city.html(response)
                    }
                }
            });
        } else {
            city.prop('disabled', true)
            city.find('option').val('').text('Pilih Kota/Kabupaten')
        }
    })  
  });
</script>


<script>
  $(document).ready(function(){
    // $('#province_s1 option[value=""]').prop('selected',true);
    // $('#city_s1 option[value!=""]').remove();

    province = $('#province_s1')
    province.on('change', function() {
        $this = $(this)
        city = $('#city_s1')

        if ($this.val() !== '') {
            $.ajax({
                url: "{{url('/get-regency')}}" +'/' +$this.val() , 
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if (response !== 'NOT OK') {
                        city.removeAttr('disabled')
                        city.html(response)
                    }
                }
            });
        } else {
            city.prop('disabled', true)
            city.find('option').val('').text('Pilih Kota/Kabupaten')
        }
    })  
  });
</script>