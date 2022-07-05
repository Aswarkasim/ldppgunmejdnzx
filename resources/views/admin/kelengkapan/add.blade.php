<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/kelengkapan/create'))
          <form action="/account/kelengkapan" method="POST">  
        @else
          <form action="/account/kelengkapan/{{$kelengkapan->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kelengkapan) ? $kelengkapan->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

             <div class="form-group">
                  <label for="">Kebutuhan</label>

                  <select name="kebutuhan" class="form-control @error('kebutuhan') is-invalid @enderror" id="">
                <option value="">-- Kebutuhan --</option>
                <option value="WAJIB"
                <?php 
                if(isset($kelengkapan)) {
                  if($kelengkapan->kebutuhan == 'WAJIB') {
                    echo 'selected';
                    }
                }else{
                  if(old('kebutuhan') == 'WAJIB') {
                    echo 'selected';
                  }
                } ?> >WAJIB</option>
                <option value="OPTIONAL"
                <?php 
                if(isset($kelengkapan)) {
                  if($kelengkapan->kebutuhan == 'OPTIONAL') {
                    echo 'selected';
                    }
                }else{
                  if(old('kebutuhan') == 'OPTIONAL') {
                    echo 'selected';
                  }
                } ?>
                >OPTIONAL</option>
              </select>
       
              
                @error('kebutuhan')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>

             <div class="form-group">
             <label for="">Verifikasi</label>
              <select name="is_verified" class="form-control @error('is_verified') is-invalid @enderror" id="">
                <option value="">-- Verifikasi --</option>
                <option value="1"
                <?php 
                if(isset($kelengkapan)) {
                  if($kelengkapan->is_verified == 1) {
                    echo 'selected';
                    }
                }else{
                  if(old('is_verified') == 1) {
                    echo 'selected';
                  }
                } ?> >Ya</option>
                <option value="0"
                <?php 
                if(isset($kelengkapan)) {
                  if($kelengkapan->is_verified == 0) {
                    echo 'selected';
                    }
                }else{
                  if(old('is_verified') == 0) {
                    echo 'selected';
                  }
                } ?>
                >Tidak</option>
              </select>
       
              
                @error('is_verified')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>

             <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control  @error('desc') is-invalid @enderror"  name="desc"  value="{{isset($kelengkapan) ? $kelengkapan->desc : old('desc')}}" placeholder="Nama">
             @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($kelengkapan) ? $kelengkapan : null)!!} --}}

          <a href="/account/kelengkapan" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

