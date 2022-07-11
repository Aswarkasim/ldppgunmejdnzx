{{-- 
<div class="img-wrapper-cover">
  <img src="/img/3.jpg" alt="">
</div> --}}

<div class="container my-5">
  <div class="text-center mb-4">
    <h1 class="brush-font text-orange">Kontak Kami</h1>
  </div>
{{-- <hr> --}}
  <div class="row">

 
    <div class="col-md-6">
      
      <div class="d-flex mt-4">
        <i class="far fa-map fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Alamat</strong></h5>
          <p>{{$helpdesk->alamat}}</p>
        </div>
      </div>

      <div class="d-flex mt-4">
        <i class="fas fa-phone fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Telepon 1</strong></h5>
          <p>{{$helpdesk->nohp_1}}</p>
        </div>
      </div>

      <div class="d-flex mt-4">
        <i class="fas fa-phone fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Telepon 2</strong></h5>
          <p>{{$helpdesk->nohp_2}}</p>
        </div>
      </div>

       <div class="d-flex mt-4">
        <i class="fas fa-envelope fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Email</strong></h5>
          <p>{{$helpdesk->email}}</p>
        </div>
      </div>


     
      
      
    </div>
    <div class="col-md-6">
       <div class="ratio ratio-1x1">

        {!!$helpdesk->maps!!}
      </div>

    </div>
    </div>
</div>


