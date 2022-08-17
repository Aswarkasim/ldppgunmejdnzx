<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterEdit">
  <i class="fas fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Lokasi</h5>
      
      </div>

      <form action="/account/ppi/edit" method="POST">
        @method('PUT')
      @csrf
      <div class="modal-body">

        <div class="form-grup">
          <label for="">Nama Sekolah</label>
          <input type="text" name="sekolah_lokasi" placeholder="Ex: SMKN 1 Karossa" class="form-control">
        </div>

        <div class="form-grup">
          <label for="">Provinsi</label>
             <select class="form-control @error('province_id') is-invalid @enderror" id="province" name="province_id" required>
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  {{-- <option value="{{$item->id}}"  >{{$item->name}}</option> --}}
                @endforeach
              </select>
               @error('province_id')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
        </div>

        <div class="form-group mt-2">
          <select class="form-control @error('kabupaten_id') is-invalid @enderror" id="city" name="kabupaten_id" disabled required>
              <option value="">Pilih Kota/Kabupaten</option>
            </select>
              @error('kabupaten_id')
              <div class="invalid-feedback">
              {{$message}}
              </div>
            @enderror
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      </form>
    </div>
  </div>
</div>


       

          




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
