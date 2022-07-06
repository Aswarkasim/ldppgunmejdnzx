<div class="alert alert-info">Selamat Datang {{auth()->user()->name}} di halaman {{auth()->user()->role}}</div>



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
@php
    $rsj = $register_setting->jenis_ppg;
    $rsp = $register_setting->periode;
@endphp
<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">

        <h5><b>Registrasi Aktif</b></h5>
        <hr>
{{-- @dd($register_setting) --}}
        <div class="text-group">
          <span for=""><b>Jenis PPG</b></span>
          <div>{{ isset($rsj) ? $rsj->name : 'Belum diatur' }}</div>
        </div>
          <br>
         <div class="text-group">
          <span for=""><b>Periode</b></span>
          <div>{{ isset($rsp) ? $rsp->name : 'Belum diatur' }}</div>
        </div>
          <br>  
         <div class="text-group">
          <span for=""><b>Status</b></span>
          <div>
            @switch($register_setting->status)
                @case('WAITING')
                    <div class="text text-warning">Menuggu</div>
                    @break
                @case('BUKA')
                    <div class="text text-success">Buka</div>
                    @break
                @case('TUTUP')
                    <div class="text text-danger">Tutup</div>
                    @break
                @default
                    
            @endswitch
          </div>
<br>
@include('admin.dashboard.register_setting')


        </div>

      </div>
    </div>
  </div>
</div>

