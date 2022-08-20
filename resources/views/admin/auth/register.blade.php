
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | LDPPGUNM</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/dist/css/ktcstyle.css">
</head>
<body style="background-color: #f0f0f0">

  <form action="/auth/doRegister" method="POST">
    @csrf
  <div class="row pt-5">

    <div class="col-md-3"></div>
    <div class="col-md-6 shadow bg-white rounded p-5 mt-5">
      <h4 class="text-center">Registrasi Akun SIAPPGUNM</h4>
      <hr>
      <p class="text-center">Buat akun untuk memulai lengkapi berkas</p>
      {{-- @dd($provider_register_setting) --}}
      {{-- show registerError --}}
      @if(session()->has('registerError'))
        <div class="alert alert-danger">
          {{session()->get('registerError')}}
        </div>
      @endif

      @if ($provider_register_setting->status == 'WAITING')

      <div class="alert alert-info">
        <i class="fa fa-info"></i> Registrasi belum dibuka untuk periode saat ini
      </div>
          
      @elseif($provider_register_setting->status == 'TUTUP')

      <div class="alert alert-warning">
        <i class="fa fa-info"></i> Registrasi lapor diri telah ditutup. Hubungi admin untuk informasi lebih lanjut
      </div>

      @else
<p class="text-center">Lihat petunjuk pendaftaran <a href="https://siappgunm.com/petunjuk">disni</a></p>
          
      <input type="hidden" name="periode_id" value="{{$provider_register_setting->periode_id}}">
      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">No. UKG/Peg.ID<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('no_ukg') is-invalid @enderror" name="no_ukg"  value="{{old('no_ukg')}}" placeholder="No. UKG.">
             @error('no_ukg')
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
            <label for="">Nama Lengkap<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{old('name')}}" placeholder="Nama Lengkap">
             @error('name')
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
            <label for="">No. WhatsApp<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp"  value="{{old('nohp')}}" placeholder="No. Hp/Wa">
            <small>Masukkan Nomor WhatsApp Aktif</small> 
            @error('nohp')
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
            <label for="">Password<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('password')}}" placeholder="Password">
            @error('password')
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
            <label for="">Konfirmasi Password<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password" placeholder="Konfirmasi Password">
              @error('re_password')
                <div class="invalid-feedback">
                {{$message}}
                </div>
              @enderror
          </div>
        </div>
      
      </div>

       <div class="form-group">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-9">
            <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-user-plus"></i> Register</button>
          </div>
        </div>
      </div>

      @endif

      <p class="text-center">Sudah punya akun? silakan <a href="/auth">Login</a></p>
    </div>
  </div>
</form>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/vendor/sweetalert/sweetalert2.all.min.js"></script>
</body>
</html>
