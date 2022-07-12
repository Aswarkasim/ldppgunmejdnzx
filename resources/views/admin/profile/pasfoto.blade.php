<form action="/account/profile/pasfoto" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf

<input type="hidden" name="id" value="{{$profile->id}}">
<div class="row">
 <div class="col-md-6">
  <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="">Pas Foto<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-9">
          <input type="file" class="form-control @error('pasfoto') is-invalid @enderror" name="pasfoto"  value="{{isset($profile) ? $profile->pasfoto : old('pasfoto')}}" required placeholder="Akreditasi Sekolah">
          <small>Pastikan foto berukuran 3X4 dan ukuran maksimal 200KB</small>

          @error('pasfoto')
          <div class="invalid-feedback">
          {{$message}}
          </div>

          @enderror
          
          @if ($profile->pasfoto != null)
              <img src="/{{$profile->pasfoto}}" width="70%" alt="">
          @endif
        </div>
      </div>
      
    </div>
    
 </div>

 <div class="col-md-6">
    <h3>Ketentuan</h3>
    <ol type="1">
      <li>Format Jpg dengan dimensi 720 x 480 pixel</li>
      <li>Ukuran maksimal 200 kb dengan</li>
      <li>Bagi laki-laki wajib menggunakan jas hitam, kemeja putih polos dan berkerah serta dasi hitam</li>
      <li>Bagi perempuan wajib menggunakan jas hitam, kemeja putih polos dan berkerah serta kerudung putih (bagi yang berkerudung)</li>
      <li>Background berwarna merah perempuan, warna biru laki-laki nama file: nomor UKG/Peg.ID.- NAMA - FOTO contoh: 201500731653 - DWI ARIYANTI - FOTO</li>
    </ol>
 </div>
</div>


<div class="row">
  <div class="col-md-3">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>

</form>

