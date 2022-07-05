
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($banner as $key => $item)
    <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$item->urutan == '1' ? 'active' : ''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">

    @foreach ($banner as $item)
        
    <div class="carousel-item {{$item->urutan == '1' ? 'active' : ''}}">
      <img class="first-slide" src="{{$item->image}}" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>{{$item->topik}}</h1>
          <p>{{$item->desc}}</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    @endforeach

  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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




