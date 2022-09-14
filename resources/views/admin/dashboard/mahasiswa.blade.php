@php
    print_r(auth()->user()->id)
@endphp
<div class="row mt-2">
  <div class="col-md-12">
    <div class="my-2">
      {{-- @dd($mahasiswa) --}}
      @switch($mahasiswa->status)
          @case('LENGKAPI')
          <div class="alert alert-warning mt-3"><i class="fas fa-info"></i> Klik tombol ini jika semua data diri dan berkas telah lengkap</div>
              <a href="/account/dashboard/status?status=WAITING" class="btn btn-primary masuk-verifikasi"><i class="fas fa-upload"></i> Masuk ke verifikasi</a>
              @break
          @case('WAITING')
              <div class="alert alert-info"><i class="fas fa-spinner"></i> Menunggu verifikasi berkas oleh tim verifikasi</div>
              @break
          @case('VALID')
              <div class="alert alert-success"><i class="fas fa-check"></i> Berkas anda valid</div>
              @break
          @case('INVALID')
              <div class="alert alert-danger"><i class="fas fa-times"></i> Berkas anda tidak valid. silakan cek kembali berkas anda</div>
              @break
          @default
              
      @endswitch

       <div class="alert alert-warning">
          <i class="fas fa-info"></i>  Sebelum anda mencetak surat izin Praktik Pembelajaran Inovatif,silakan mengisi data-data yang diperlukan di menu PPI
        </div>

    </div>
    <div class="row">
       <div class="col-md-4">
        
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-print"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Cetak Bukti Lapor Diri</span>
            <a href="/account/berkas/cetak" class="btn btn-primary" target="_blank">Cetak</a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>


      <div class="col-md-4">
        
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-print"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Cetak Surat PPL</span>
            <a href="/account/ppi/cetak" class="btn btn-primary" target="_blank">Cetak</a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-4">
        
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-print"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Cetak SKBS</span>
            <a href="/account/mahasiswa/skbs/cetak" class="btn btn-primary" target="_blank">Cetak</a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>



      {{-- <div class="col-md-4">
        
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Berkas</span>
            <span class="info-box-number">
              10
              <small>%</small>
            </span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data diri</span>
            <span class="info-box-number">
              10
              <small>%</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div> --}}


    </div>

    
  </div>
</div>

<div class="row">
  <div class="col-md-12">
   
  </div>
</div>