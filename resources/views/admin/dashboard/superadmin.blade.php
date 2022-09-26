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
                    <div class="alert alert-warning">Menuggu</div>
                    @break
                @case('BUKA')
                    <div class="alert alert-success">Buka</div>
                    @break
                @case('TUTUP')
                    <div class="alert alert-danger">Tutup</div>
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

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="text-group">
          <span><b>Status PPI {{$periode->jenisPpg->name.' '.$periode->name. ' Tahun '. $periode->tahun}}</b></span>
           @switch($periode->ppi_status)
                @case('NONAKTIF')
                    <div class="alert alert-danger">NONAKTIF</div>
                    @break
                @case('AKTIF')
                    <div class="alert alert-success">AKTIF</div>
                    @break
                @default
                    
            @endswitch
        </div>

        {{-- <div class="text-group">
          <span><b>Nomor Surat Awal</b></span>
          <p>{{$periode->nomor_surat_first}}</p>
        </div>

        <div class="text-group">
          <span><b>Nomor Surat Akhir</b></span>
          <p>{{$periode->nomor_surat_last}}</p>
        </div> --}}
        @include('admin.dashboard.ppi')
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">

        <span><b>SKBS</b></span>

        <div class="text-group">
          <span><b>Nomor Surat Awal</b></span>
          <p>{{$periode->nomor_skbs_awal}}</p>
        </div>

        <div class="text-group">
          <span><b>Nomor Surat Akhir</b></span>
          <p>{{$periode->nomor_skbs_akhir}}</p>
        </div>
        @include('admin.dashboard.skbs')
      </div>
    </div>
  </div>

</div>

