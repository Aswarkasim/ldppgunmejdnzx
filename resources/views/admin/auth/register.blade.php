
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
      <h4 class="text-center">Registrasi Akun LDPPGUNM</h4>
      <hr>
      <p class="text-center">Buat akun untuk memulai lengkapi berkas</p>
      
      {{-- show registerError --}}
      @if(session()->has('registerError'))
        <div class="alert alert-danger">
          {{session()->get('registerError')}}
        </div>
      @endif

      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="">No. UKG.<span class="text-danger">*</span></label>
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
            <label for="">Username<span class="text-danger">*</span></label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{old('name')}}" placeholder="Username">
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
            <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password"  value="{{old('re_password')}}" placeholder="Konfirmasi Password">
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

      <p class="text-center">Sudah punya akun? silakan <a href="/auth">Login</a></p>

    </div>
  </div>
</form>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/vendor/sweetalert/sweetalert2.all.min.js"></script>
</body>
</html>
