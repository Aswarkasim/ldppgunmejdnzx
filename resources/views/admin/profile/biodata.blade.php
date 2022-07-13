<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body p-3">

        <a href="/account/profile/show/{{$mahasiswa->user_id}}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
          <div class="col-md-6">
            
            @include('admin.profile.biodata.data_diri')
            @include('admin.profile.biodata.pendidikan')
          </div>
          
          <div class="col-md-6">
            @include('admin.profile.biodata.instansi')
            @include('admin.profile.biodata.keluarga')
            @include('admin.profile.biodata.rekening')
            @include('admin.profile.biodata.pasfoto')
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>