<div class="alert alert-info">Selamat Datang {{auth()->user()->name}} di halaman {{auth()->user()->role}}</div>

@include('admin.dashboard.register_setting')


<div class="row mt-2">
      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Mahasiswa</span>
            <span class="info-box-number">
              {{$total_mahasiswa}}
              <small>Mahasiwa</small>
            </span>

          </div>
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Registrasi</span>
            <span class="info-box-number">
              {{$total_registered}}
              <small>Mahasiwa</small>
            </span>

          </div>
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Verifikasi Berkas</span>
            <span class="info-box-number">
              {{$total_verifikasi}}
              <small>Mahasiwa</small>
            </span>

          </div>
        </div>
        <!-- /.info-box -->
      </div>

       <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Berkas Valid</span>
            <span class="info-box-number">
              {{$total_valid}}
              <small>Mahasiwa</small>
            </span>

          </div>
        </div>
        <!-- /.info-box -->
      </div>


    </div>

