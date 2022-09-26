<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PPIModal">
  <i class="fas fa-graduation-cap"></i> Ubah PPI
</button>

<!-- Modal -->
<div class="modal fade" id="PPIModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Atur Surat PPI</h5>
      
      </div>

      <form action="/account/dashboard/periode/ppi/update" method="POST">
        @method('PUT')
      @csrf
      <div class="modal-body">


      
        <div class="form-group">
          <label class="label"><b>Status</b></label>
          <select name="ppi_status" required class="form-control @error('ppi_status') is-invalid @enderror" id="">
              <option value="">-- Status --</option>
              <option value="AKTIF" {{$periode->ppi_status == 'AKTIF' ? 'selected' : ''}}>AKTIF</option>
              <option value="NONAKTIF" {{$periode->ppi_status == 'NONAKTIF' ? 'selected' : ''}}>NONAKTIF</option>
            </select>
        </div>

        {{-- <div class="form-group">
          <label for="">Nomor Surat Awal</label>
          <input type="number" value="{{$periode->nomor_surat_first}}" class="form-control" name="nomor_surat_first">
        </div>

         <div class="form-group">
          <label for="">Nomor Surat Akhir</label>
          <input type="number" value="{{$periode->nomor_surat_last}}" class="form-control" name="nomor_surat_last">
        </div> --}}

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
    $('#jenisppg option[value=""]').prop('selected',true);
    $('#periode option[value!=""]').remove();

    jenisppg = $('#jenisppg')
    jenisppg.on('change', function() {
        $this = $(this)
        periode = $('#periode')

        if ($this.val() !== '') {
            $.ajax({
                url: "{{url('/get-periode')}}" +'/' +$this.val() , 
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if (response !== 'NOT OK') {
                        periode.removeAttr('disabled')
                        periode.html(response)
                    }
                }
            });
        } else {
            periode.prop('disabled', true)
            periode.find('option').val('').text('Pilih Kota/Kabupaten')
        }
    })  
  });
</script>