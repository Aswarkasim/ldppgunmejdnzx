<form action="/account/dosen/pendidikan" method="POST">
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
          <label for="">Jurusan S1<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('s1_jurusan') is-invalid @enderror" name="s1_jurusan" value="{{isset($profile) ? $profile->s1_jurusan : old('s1_jurusan')}}" placeholder="Jurusan S1">
           @error('s1_jurusan')
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
          <label for="">Tahun Selesai S1<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('tahun_selesai_s1') is-invalid @enderror" name="tahun_selesai_s1" value="{{isset($profile) ? $profile->tahun_selesai_s1 : old('tahun_selesai_s1')}}" placeholder="Tahun Selesai S1">
           @error('tahun_selesai_s1')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
        </div>
      </div>
    </div>

    <hr>


  <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Jurusan S2<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('s2_jurusan') is-invalid @enderror" name="s2_jurusan" value="{{isset($profile) ? $profile->s2_jurusan : old('s2_jurusan')}}" placeholder="Jurusan S2">
           @error('s2_jurusan')
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
          <label for="">Tahun Selesai S2<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('tahun_selesai_s2') is-invalid @enderror" name="tahun_selesai_s2" value="{{isset($profile) ? $profile->tahun_selesai_s2 : old('tahun_selesai_s2')}}" placeholder="Tahun Selesai S2">
           @error('tahun_selesai_s2')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
        </div>
      </div>
    </div>

    <hr>

        <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Jurusan S3</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('s3_jurusan') is-invalid @enderror" name="s3_jurusan" value="{{isset($profile) ? $profile->s3_jurusan : old('s3_jurusan')}}" placeholder="Jurusan S3">
           @error('s3_jurusan')
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
          <label for="">Tahun Selesai S3</label>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control @error('tahun_selesai_s3') is-invalid @enderror" name="tahun_selesai_s3" value="{{isset($profile) ? $profile->tahun_selesai_s3 : old('tahun_selesai_s3')}}" placeholder="Tahun Selesai S3">
           @error('tahun_selesai_s3')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
        </div>
      </div>
    </div>

    <hr>

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