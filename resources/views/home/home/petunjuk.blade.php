.<div class="container mt-4">
  <div class="text-center">
    <h4><b>Petunjuk</b></h4>
  </div>

  <div class="row">
      
      <div class="col-md-3">
        <div class="card card-mekanisme bg-ppg py-5">
          <div class="wrapper-text-mekanisme">
            <h4>Registrasi</h4>
            <p>Registrasi online Mahasiswa, dengan menggunakan nomor UKG</p>
          </div>
          <h1 class="number-mekanisme">1</h1>
        </div>
      </div>

       <div class="col-md-3">
        <div class="card card-mekanisme bg-success py-5">
          <div class="wrapper-text-mekanisme text-white">
            <h4>Melengkapi Biodata</h4>
            <p>Isikan biodata pribadi, instansi, pendidikan, dan keluarga</p>
          </div>
          <h1 class="number-mekanisme">2</h1>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-mekanisme bg-info py-5">
          <div class="wrapper-text-mekanisme text-white">
            <h4>Mengupload Berkas</h4>
            <p>Pastikan yang diupload harus berformat PDF.</p>
          </div>
          <h1 class="number-mekanisme">3</h1>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-mekanisme bg-danger py-5">
          <div class="wrapper-text-mekanisme text-white">
            <h4>Verifikasi Berkas</h4>
            <p>Tunggu admin PPG untuk memverifikasi berkas anda.</p>
          </div>
          <h1 class="number-mekanisme">4</h1>
        </div>
      </div>


    </div>

    <div class="row mt-5">
    <h4 class="text-center"><strong>Video Petunjuk</strong></h4>
    @foreach ($petunjuk as $item)
        
    <div class="col-md-4 my-5" >
      <h4 class="text-center">{{$item->title}}</h4>
      <div class="ratio ratio-1x1">
        {!!$item->link!!}
      </div>
    </div>
    @endforeach
  </div>
 
</div>