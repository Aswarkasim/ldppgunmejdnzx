<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalProvinsiCreate">
  <i class="fas fa-plus"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalProvinsiCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Provinsi</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    

      <form action="/account/user/kelas" method="POST">
        {{-- @method('PUT') --}}
        @csrf
        
        
        @php
        $user_id = $user->id;
        $periode_id = Session::get('periode_id');
        
        @endphp
    <input type="hidden" name="user_id" value="{{$user_id}}">
      <div class="modal-body">
         <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas" name="kelas_id" required>
                <option value="">Pilih Provinsi</option>
                @foreach($kelas as $item)
                
                  @php
                    $cek = App\Models\Adminkelasrole::wherePeriodeId($periode_id)->whereProvinceId($item->id)->first();

                    if(empty($cek)){
                      echo '<option value="'.$item->id.'">'.$item->name.'</option>';
                    }

                  @endphp
                 
                @endforeach
              </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>