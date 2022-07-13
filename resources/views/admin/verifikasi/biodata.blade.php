<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body p-3">

        <a href="/account/verifikasi/show/{{$mahasiswa->user_id}}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
          <div class="col-md-6">
            
            @include('admin.verifikasi.biodata.data_diri')
            @include('admin.verifikasi.biodata.pendidikan')
          </div>
          
          <div class="col-md-6">
            @include('admin.verifikasi.biodata.instansi')
            @include('admin.verifikasi.biodata.keluarga')
            @include('admin.verifikasi.biodata.rekening')
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>