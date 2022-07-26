{{-- Mapel yg diampuh
  emai; --}}
<form action="/account/profile/datadiri" method="POST">
@method('PUT')
@csrf
<div class="row">
  <div class="col-md-6">

    @if($errors->any())
        {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
    @endif

     <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Lengkap<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap"  value="{{isset($profile) ? $profile->namalengkap : old('namalengkap')}}" placeholder="Nama Lengkap">
          <small>Lengkap dengan gelar akademik</small>
           @error('namalengkap')
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
            <label for="">NIP<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"  value="{{isset($profile) ? $profile->nip : old('nip')}}" placeholder="NIP">
             @error('nip')
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
          <label for=""> Periode<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text"  class="form-control @error('periode_id') is-invalid @enderror" name="periode_id"  value="Periode I"  disabled placeholder="Periode PPG">
           @error('periode_id')
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
          <label for="">Pangkat/Golongan<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pangkat_golongan') is-invalid @enderror" name="pangkat_golongan"  value="{{isset($profile) ? $profile->pangkat_golongan : old('pangkat_golongan')}}" placeholder="Pangkat/Golongan">
          @error('pangkat_golongan')
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
          <label for="">Jabatan<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"  value="{{isset($profile) ? $profile->jabatan : old('jabatan')}}" placeholder="Jabatan">
          @error('jabatan')
            <div class="invalid-feedback">
            {{$message}}
            </div>
          @enderror
        </div>
      </div>
      
    </div>



  </div>

  <div class="col-md-6">

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Agama<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama"  value="{{isset($profile) ? $profile->agama : old('agama')}}" placeholder="Agama">
          @error('agama')
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
          <label for="">Tanggal Lahir<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"  value="{{isset($profile) ? $profile->tanggal_lahir : old('tanggal_lahir')}}" placeholder="Tanggal Lahir">
          @error('tanggal_lahir')
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
          <label for="">Tempat Lahir<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"  value="{{isset($profile) ? $profile->tempat_lahir : old('tempat_lahir')}}" placeholder="Tempat Lahir">
          @error('tempat_lahir')
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
          @error('jenis_kelamin')

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
          <label for="">No. Hp<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp"  value="{{isset($profile) ? $profile->nohp : old('nohp')}}" placeholder="No. Hp">
          @error('nohp')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
        </div>
      </div>
      
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


<script>
  $(document).ready(function(){
    // $('#province option[value=""]').prop('selected',true);
    // $('#city option[value!=""]').remove();

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

