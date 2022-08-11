
<div class="alert alert-info">Selamat Datang {{auth()->user()->name}} di halaman {{auth()->user()->role}}</div>
<div class="row">
      <div class="col-md-3">
        
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-table"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Kelas</span>
            <span class="info-box-number">
              {{count($kelas)}}
              <small>Kelas</small>
            </span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3">
        
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-table"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Mahasiswa</span>
            <span class="info-box-number">
              {{$mahasiswa}}
              <small>Mahasiswa</small>
            </span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

    </div>


