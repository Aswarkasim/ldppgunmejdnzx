<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fas fa-cogs"></i> Pengaturan Lapor Diri
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pengaturan Lapor Diri</h5>
      
      </div>

      <form action="/account/setting/register/update" method="POST">
        @method('PUT')
      @csrf
      <div class="modal-body">

          <div class="form-group">
          <label class="label">Jenis PPG</label>
           <select class="form-control" id="jenisppg" name="jenis_ppg_id" required>
              <option value="">Pilih Jenis PPG</option>
              @foreach($jenis as $item)
                <option value="{{$item->id}}" {{$item->id == $register_setting->jenis_ppg_id ? 'selected' : ''}}>{{$item->name}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Please select a valid Jenis PPG.
            </div>
        </div>

        
        <div class="form-group">
          <label class="label">Periode</label>
          <select class="form-control" id="periode" name="periode_id" disabled required>
              <option value="">Pilih Periode</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid periode.
            </div>
        </div>

      
        <div class="form-group">
          <label class="label">Status</label>
          <select name="status" required class="form-control @error('status') is-invalid @enderror" id="">
              <option value="">-- Status --</option>
              <option value="WAITING" {{$provider_register_setting->status == 'WAITING' ? 'selected' : ''}}>MENUNGGU</option>
              <option value="BUKA" {{$provider_register_setting->status == 'BUKA' ? 'selected' : ''}}>BUKA</option>
              <option value="TUTUP" {{$provider_register_setting->status == 'TUTUP' ? 'selected' : ''}}>TUTUP</option>
            </select>
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