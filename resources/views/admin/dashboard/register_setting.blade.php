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
          <select name="kelas_program_id" class="form-control @error('kelas_program_id') is-invalid @enderror" id="">
              <option value="">-- Jenis PPG --</option>
              @foreach ($jenis as $j)
                  <option value="{{$j->id}}" {{$j->id == $provider_register_setting->id ? 'selected' : ''}}>{{$j->name}}</option>
              @endforeach
            </select>
        </div>

        
        <div class="form-group">
          <label class="label">Periode</label>
          <select name="periode_id" class="form-control @error('periode_id') is-invalid @enderror" id="">
              <option value="">-- Periode --</option>
              @foreach ($periode as $p)
                  <option value="{{$p->id}}" {{$p->id == $provider_register_setting->periode_id ? 'selected' : ''}}>{{$p->name}}</option>
              @endforeach
            </select>
        </div>

      
        <div class="form-group">
          <label class="label">Status</label>
          <select name="is_active" class="form-control @error('is_active') is-invalid @enderror" id="">
              <option value="">-- Status --</option>
              <option value="1">AKTIF</option>
              <option value="0">NONAKTIF</option>
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