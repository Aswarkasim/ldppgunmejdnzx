<form action="/account/profile/datadiri" method="POST">
@method('PUT')
@csrf
<div class="row">
  <div class="col-md-6">

    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for=""> No. UKG/ Peg.ID<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" disabled class="form-control @error('no_ukg') is-invalid @enderror" name="no_ukg"  value="{{isset($profile) ? $profile->no_ukg : old('no_ukg')}}" placeholder="No. UKG">
        </div>
      </div>
      @error('no_ukg')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

     <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">Kementrian<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <select name="kementrian" class="form-control @error('kementrian') is-invalid @enderror" id="">
          <option value="">-- Kementrian --</option>
          <option value="KEMENDIKBUD"
          <?php 
          if(isset($profile)) {
            if($profile->kementrian == 'KEMENDIKBUD') {
              echo 'selected';
              }
          }else{
            if(old('kementrian') == 'KEMENDIKBUD') {
              echo 'selected';
            }
          } ?> >KEMENDIKBUD</option>
          <option value="KEMENAG"
          <?php 
          if(isset($profile)) {
            if($profile->kementrian == 'KEMENAG') {
              echo 'selected';
              }
          }else{
            if(old('kementrian') == 'KEMENAG') {
              echo 'selected';
            }
          } ?>
          >KEMENAG</option>
        </select>
          </div>
        </div>
        
          @error('kementrian')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Lengkap<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap"  value="{{isset($profile) ? $profile->namalengkap : old('namalengkap')}}" placeholder="Nama Lengkap">
        </div>
      </div>
      @error('namalengkap')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">NUPTK<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('nuptk') is-invalid @enderror" name="nuptk"  value="{{isset($profile) ? $profile->nuptk : old('nuptk')}}" placeholder="NUPTK">
          </div>
        </div>
        @error('nuptk')
            <div class="invalid-feedback">
            {{$message}}
            </div>
          @enderror
      </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for=""> Jenis PPG<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text"  class="form-control @error('periode_id') is-invalid @enderror" name="periode_id"  value="{{isset($profile->periode) ? $profile->periode->name : old('periode_id')}}"  disabled placeholder="Periode PPG">
        </div>
      </div>
      @error('periode_id')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for=""> Periode<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text"  class="form-control @error('periode_id') is-invalid @enderror" name="periode_id"  value="Periode I"  disabled placeholder="Periode PPG">
        </div>
      </div>
      @error('periode_id')
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
          <select name="bidang_studi_id" class="form-control @error('bidang_studi_id') is-invalid @enderror" id="">
              <option value="">-- Bidang Studi --</option>
              @foreach ($bidangstudi as $bs)
                  <option value="{{$bs->id}}" {{$bs->id == $profile->bidang_studi_id ? 'selected': ''}}>{{$bs->name}}</option>
              @endforeach
            </select>
        </div>
      </div>
      @error('bidang_studi_id')
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
          <label for="">Tanggal Lahir<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"  value="{{isset($profile) ? $profile->tanggal_lahir : old('tanggal_lahir')}}" placeholder="Tanggal Lahir">
        </div>
      </div>
      @error('tanggal_lahir')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>


    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Tempat Lahir<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"  value="{{isset($profile) ? $profile->tempat_lahir : old('tempat_lahir')}}" placeholder="Tempat Lahir">
        </div>
      </div>
      @error('tempat_lahir')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

    

       <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">Golongan Darah<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah"  value="{{isset($profile) ? $profile->golongan_darah : old('golongan_darah')}}" placeholder="Golongan Darah">
          </div>
        </div>
        @error('golongan_darah')
            <div class="invalid-feedback">
            {{$message}}
            </div>
          @enderror
      </div>
    

      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">Jenis Kelamin<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="">
          <option value="">-- Jenis Kelamin --</option>
          <option value="Laki-laki"
          <?php 
          if(isset($profile)) {
            if($profile->jenis_kelamin == 'Laki-laki') {
              echo 'selected';
              }
          }else{
            if(old('jenis_kelamin') == 'Laki-laki') {
              echo 'selected';
            }
          } ?> >Laki-laki</option>
          <option value="perempuan"
          <?php 
          if(isset($profile)) {
            if($profile->jenis_kelamin == 'perempuan') {
              echo 'selected';
              }
          }else{
            if(old('jenis_kelamin') == 'perempuan') {
              echo 'selected';
            }
          } ?>
          >Perempuan</option>
        </select>
          </div>
        </div>
        
          @error('jenis_kelamin')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">NIK<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"  value="{{isset($profile) ? $profile->nik : old('nik')}}" placeholder="NIK">
        </div>
      </div>
      @error('nik')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
    </div>

     {{-- <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Unggah<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <button class="btn btn-primary btn-sm">Unggah KK</button>
          <button class="btn btn-primary btn-sm">Unggah KTP</button>
        </div>
      </div>
    </div> --}}


     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Alamat Domisili<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili"  value="{{isset($profile) ? $profile->alamat_domisili : old('alamat_domisili')}}" placeholder="Alamat Domisili">
          
          <div class="row pt-1">
            <div class="col-md-6">
              <select class="form-control" id="province" name="provinsi_tempat_tinggal" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  {{-- <option value="{{$item->id}}" {{$item->id == $profile->provinsi_tempat_tinggal ? 'selected' : ''}} >{{$item->name}}</option> --}}
                  <option value="{{$item->id}}" {{$item->id == $profile->provinsi_tempat_tinggal ? 'selected' : ''}} >{{$item->name}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Please select a valid province.
              </div>
            </div>

             <div class="col-md-6">
               <select class="form-control" id="city" name="kabupaten_tempat_tinggal" disabled required>
                    <option value="">Pilih Kota/Kabupaten</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
            </div>
          </div>
          

          

          <div class="row pt-1">
             <div class="col-md-6">
               <input type="text" class="form-control @error('kecamatan_tempat_tinggal') is-invalid @enderror" name="kecamatan_tempat_tinggal"  value="{{isset($profile) ? $profile->kecamatan_tempat_tinggal : old('kecamatan_tempat_tinggal')}}" placeholder="Kecamatan Tempat Tinggal">
            </div>

            <div class="col-md-6">
               <input type="text" class="form-control @error('kelurahan_tempat_tinggal') is-invalid @enderror" name="kelurahan_tempat_tinggal"  value="{{isset($profile) ? $profile->kelurahan_tempat_tinggal : old('kelurahan_tempat_tinggal')}}" placeholder="Kelurahan termpat Tinggal">
            </div>

            

          </div>

          <div class="row pt-1">
            <div class="col-md-6">
               <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"  value="{{isset($profile) ? $profile->rt : old('rt')}}" placeholder="RT">
            </div>

             <div class="col-md-6">
               <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"  value="{{isset($profile) ? $profile->rw : old('rw')}}" placeholder="RW">
            </div>

          </div>

        </div>
      </div>
      @error('alamat_domisili')
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


<script>
  $(document).ready(function(){
    $('#province option[value=""]').prop('selected',true);
    $('#city option[value!=""]').remove();

    province = $('#province')
    province.on('change', function() {
        $this = $(this)
        city = $('#city')

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

