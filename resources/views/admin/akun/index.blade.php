
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-title p-4">
        <h4>Manajemen Akun</h4>
      </div>
      <div class="card-body">

        <form action="/account/akun/save" method="POST">
          @csrf

        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <div class="row">
                <p>Periode ID : {{ $akun->periode_id }}</p>
                <div class="col-md-3">
                  <label for=""> No. UKG<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('no_ukg') is-invalid @enderror" disabled name="no_ukg"  value="{{isset($akun) ? $akun->no_ukg : old('no_ukg')}}" placeholder="No. UKG">

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
                  <label for=""> Username<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{isset($akun) ? $akun->name : old('name')}}" placeholder="Username">

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
                  <label for=""> No. WhatsApp<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp"  value="{{isset($akun) ? $akun->nohp : old('nohp')}}" placeholder="No. WhatsApp">

                  @error('nohp')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror

                </div>
              </div>  
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for=""> Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password">

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
                  <label for=""> Konfirmasi Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password"  placeholder="Konfirmasi Password">

                  @error('re_password')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror

                </div>
              </div>  
            </div>

          </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>

        </form>

      </div>
    </div>
  </div>
</div>