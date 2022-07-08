 <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

      @foreach ($banner as $item)
      <div class="carousel-item {{$item->urutan == '1' ? 'active' : ''}}">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> --}}
        <img class="first-slide" src="{{$item->image}}" alt="First slide">
       
      </div>
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




<div class="container">
  <div class="text-center">
    <h2><b>Mekanisme Lapor Diri</b></h2>

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
        
  </div>
</div>




