<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/mahasiswa/create'))
          <form action="/account/mahasiswa" method="POST">  
        @else
          <form action="/account/mahasiswa/{{$mahasiswa->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

           <div class="form-group">
            <label for="">Nomor UKG/Peg. ID</label>
            <input type="text" class="form-control  @error('no_ukg') is-invalid @enderror"  name="no_ukg"  value="{{isset($mahasiswa) ? $mahasiswa->no_ukg : old('no_ukg')}}" placeholder="Nomor UKG/Peg. ID">
             @error('no_ukg')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

             <div class="form-group">
            <label for="">NPM</label>
            <input type="text" class="form-control  @error('npm') is-invalid @enderror"  name="npm"  value="{{isset($mahasiswa) ? $mahasiswa->npm : old('npm')}}" placeholder="NPM">
             @error('npm')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control  @error('npm') is-invalid @enderror"  name="namalengkap"  value="{{isset($mahasiswa) ? $mahasiswa->namalengkap : old('namalengkap')}}" placeholder="Nama Lengkap">
             @error('namalengkap')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

            

             <div class="form-group">
                  <label for="">Kementerian</label>

                  <select name="kementerian" class="form-control @error('kementerian') is-invalid @enderror" id="">
          <option value="">-- Kementrian --</option>
          <option value="KEMENDIKBUD"
          <?php 
          if(isset($mahasiswa)) {
            if($mahasiswa->kementerian == 'KEMENDIKBUD') {
              echo 'selected';
              }
          }else{
            if(old('kementerian') == 'KEMENDIKBUD') {
              echo 'selected';
            }
          } ?> >KEMENDIKBUD</option>
          <option value="KEMENAG"
          <?php 
          if(isset($mahasiswa)) {
            if($mahasiswa->kementerian == 'KEMENAG') {
              echo 'selected';
              }
          }else{
            if(old('kementerian') == 'KEMENAG') {
              echo 'selected';
            }
          } ?>
          >KEMENAG</option>
        </select>
         @error('kementerian')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
            </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($mahasiswa) ? $mahasiswa : null)!!} --}}

          <a href="/account/mahasiswa" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

