<form action="/account/profile/keluarga" method="POST">
@method('PUT')
@csrf


 @if($errors->any())
        {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
    @endif

<div class="row">
  <div class="col-md-6">
    
    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Nama Suami/Istri</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_pasangan') is-invalid @enderror" name="nama_pasangan"  value="{{isset($profile) ? $profile->nama_pasangan : old('nama_pasangan')}}" placeholder="Nama Suami/ Istri">
          @error('nama_pasangan')
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
          <label for="">Pekerjaan Suami/Istri</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pekerjaan_pasangan') is-invalid @enderror" name="pekerjaan_pasangan"  value="{{isset($profile) ? $profile->pekerjaan_pasangan : old('pekerjaan_pasangan')}}" placeholder="Pekerjaan Suami/Istri">
          @error('pekerjaan_pasangan')
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
          <label for="">Pendidikan Suami/Istri</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pendidikan_pasangan') is-invalid @enderror" name="pendidikan_pasangan"  value="{{isset($profile) ? $profile->pendidikan_pasangan : old('pendidikan_pasangan')}}" placeholder="Pendidikan Suami/Istri">
          @error('pendidikan_pasangan')
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
          <label for="">Jumlah Anak</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('jumlah_anak') is-invalid @enderror" name="jumlah_anak"  value="{{isset($profile) ? $profile->jumlah_anak : old('jumlah_anak')}}" placeholder="Jumlah Anak">
          @error('jumlah_anak')
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
          <label for="">Nama Ayah Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_ayah_kandung') is-invalid @enderror" name="nama_ayah_kandung"  value="{{isset($profile) ? $profile->nama_ayah_kandung : old('nama_ayah_kandung')}}" placeholder="Nama Ayah Kandung">
          @error('nama_ayah_kandung')
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
          <label for="">Pendidikan Ayah Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pendidikan_ayah_kandung') is-invalid @enderror" name="pendidikan_ayah_kandung"  value="{{isset($profile) ? $profile->pendidikan_ayah_kandung : old('pendidikan_ayah_kandung')}}" placeholder="Pendidikan Ayah Kandung">
           @error('pendidikan_ayah_kandung')
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
          <label for="">Pekerjaan Ayah Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pekerjaan_ayah_kandung') is-invalid @enderror" name="pekerjaan_ayah_kandung"  value="{{isset($profile) ? $profile->pekerjaan_ayah_kandung : old('pekerjaan_ayah_kandung')}}" placeholder="Pekerjaan Ayah Kandung">
          @error('pekerjaan_ayah_kandung')
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
          <label for="">Penghasilan Ayah Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="penghasilan_ayah_kandung"  value="{{isset($profile) ? $profile->penghasilan_ayah_kandung : old('penghasilan_ayah_kandung')}}" placeholder="Penghasilan Ayah Kandung">
          @error('penghasilan_ayah_kandung')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
        </div>
      </div>
      
    </div> --}}

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">NIK Ayah Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nik_ayah_kandung') is-invalid @enderror" name="nik_ayah_kandung"  value="{{isset($profile) ? $profile->nik_ayah_kandung : old('nik_ayah_kandung')}}" placeholder="NIK Ayah Kandung">
          @error('nik_ayah_kandung')
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
          <label for="">Nama Ibu Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" name="nama_ibu_kandung"  value="{{isset($profile) ? $profile->nama_ibu_kandung : old('nama_ibu_kandung')}}" placeholder="Nama Ibu Kandung">
          @error('nama_ibu_kandung')
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
          <label for="">Pendidikan Ibu Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pendidikan_ibu_kandung') is-invalid @enderror" name="pendidikan_ibu_kandung"  value="{{isset($profile) ? $profile->pendidikan_ibu_kandung : old('pendidikan_ibu_kandung')}}" placeholder="Pendidikan Ibu Kandung">
           @error('pendidikan_ibu_kandung')
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
          <label for="">Pekerjaan Ibu Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('pekerjaan_ibu_kandung') is-invalid @enderror" name="pekerjaan_ibu_kandung"  value="{{isset($profile) ? $profile->pekerjaan_ibu_kandung : old('pekerjaan_ibu_kandung')}}" placeholder="Pekerjaan Ibu Kandung">
           @error('pekerjaan_ibu_kandung')
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
          <label for="">Penghasilan Ibu Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="penghasilan_ibu_kandung"  value="{{isset($profile) ? $profile->penghasilan_ibu_kandung : old('penghasilan_ibu_kandung')}}" placeholder="Penghasilan Ibu Kandung">
           @error('penghasilan_ibu_kandung')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
        </div>
      </div>
     
    </div> --}}

    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">NIK Ibu Kandung</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nik_ibu_kandung') is-invalid @enderror" name="nik_ibu_kandung"  value="{{isset($profile) ? $profile->nik_ibu_kandung : old('nik_ibu_kandung')}}" placeholder="NIK Ibu Kandung">
          @error('nik_ibu_kandung')
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
          <label for="">No. Hp Orang Tua/Keluarga Dekat</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('nohp_keluarga_dekat') is-invalid @enderror" name="nohp_keluarga_dekat"  value="{{isset($profile) ? $profile->nohp_keluarga_dekat : old('nohp_keluarga_dekat')}}" placeholder="No. Hp Orang Tua/Keluarga Dekat">
          @error('nohp_keluarga_dekat')
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
          <label for="">Alamat orang tua/keluarga dekat</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('alamat_orangtua') is-invalid @enderror" name="alamat_orangtua"  value="{{isset($profile) ? $profile->alamat_orangtua : old('alamat_orangtua')}}" placeholder="Alamat orang tua/keluarga dekat">
          @error('alamat_orangtua')
          <div class="invalid-feedback">
          {{$message}}
          </div>
        @enderror
          <div class="row pt-1">
            <div class="col-md-6">
              <select class="form-control" id="province_orangtua" name="provinsi_orangtua" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  <option value="{{$item->id}}" {{$item->id == $profile->province_orangtua ? 'selected' : ''}} >{{$item->name}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Please select a valid province.
              </div>
            </div>

              <div class="col-md-6">
                <select class="form-control" id="city_orangtua" name="kabupaten_orangtua" disabled required>
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

    <p class="text-primary">Keterangan : Gunakan tanda strip (-) jika kosong</p>


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
    $('#province_orangtua option[value=""]').prop('selected',true);
    $('#city_orangtua option[value!=""]').remove();

    province = $('#province_orangtua')
    province.on('change', function() {
        $this = $(this)
        city = $('#city_orangtua')

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