<body style="background-color:#f0f0f0">

  <form action="/auth/login" method="POST">
    @csrf

    <div class="row pt-5">

      <div class="col-md-3"></div>
      <div class="col-md-6 shadow bg-white rounded p-5 mt-5">
        <h4 class="text-center">Login Akun LDPPGUNM</h4>
        <hr>
        <p class="text-center">Masuk ke akun anda dan lengkapi berkas</p>

        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="">Email<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($profile) ? $profile->email : old('email')}}" placeholder="Email">
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="">Password<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{isset($profile) ? $profile->password : old('password')}}" placeholder="Password">
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