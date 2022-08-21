<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterEdit">
  <i class="fas fa-edit"></i> Lengkapi Data
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
          <label for="">Nama Lengkap</label>
          <input type="text" name="namalengkap" value="{{$ppi->namalengkap}}" required placeholder="Nama Lengkap" class="form-control">
        </div>
<br>
        <div class="form-grup">
          <label for="">Nama Sekolah</label>
          <input type="text" name="sekolah_lokasi" value="{{$ppi->sekolah_lokasi}}" required placeholder="Nama Sekolah" class="form-control">
        </div>
<br>
        <div class="form-grup">
          <label for="">Alamat</label>
          <input type="text" name="alamat" value="{{$ppi->alamat}}" required placeholder="Alamat" class="form-control">
        </div>
<br>
         <div class="form-grup">
          <label for="">Kabupaten/Kota</label>
          <input type="text" name="kabupaten_name" value="{{$ppi->kabupaten_name}}" required placeholder="Kabupaten/Kota" class="form-control">
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
