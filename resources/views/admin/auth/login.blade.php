
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | LDPPGUNM</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/dist/css/ktcstyle.css">
</head>
<body style="background-color:#f0f0f0">

  <form action="/auth/login" method="POST">
    @csrf

    <div class="row pt-5">

      <div class="col-md-3"></div>
      <div class="col-md-6 shadow bg-white rounded p-5 mt-5">
        <h4 class="text-center">Login Akun LDPPGUNM</h4>
        <hr>
        <p class="text-center">Masuk ke akun anda dan lengkapi berkas</p>

         {{-- show registerError --}}
      @if(session()->has('loginError'))
        <div class="alert alert-danger">
          {{session()->get('loginError')}}
        </div>
      @endif

        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="">No. UKG.</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control @error('no_ukg') is-invalid @enderror" name="no_ukg" value="{{old('no_ukg')}}" placeholder="No. UKG.">
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
              <label for="">Password</label>
            </div>
            <div class="col-md-9">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{isset($profile) ? $profile->password : old('password')}}" placeholder="Password">
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
            <div class="offset-3 col-md-9">
              <button type="submit" class="btn btn-primary px-5 btn-block"> <i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
          </div>
        </div>

        <p class="text-center">Sudah punya akun? silakan <a href="/auth/register">Register</a></p>

      </div>
    </div>

  </form>
</body>
</html>
