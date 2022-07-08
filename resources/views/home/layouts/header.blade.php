<div style="background-color: #f58a0f">
  <div class="container">
    <div class="d-flex">
      <img src="/img/unm_white.png" style="width: 150px; height:150px;" alt="">
      <h3 class="text-white my-3">
        <strong>
          SISTEM INFORMASI AKADEMIK   <br>
          PROGRAM STUDI PENDIDIKAN PROFESI GURU <br>
          UNIVERSITAS NEGERI MAKASSAR
        </strong>
      </h3>
    </div>
    <div class="d-flex text-white pb-2">
      <span class="mx-2"><i class="fas fa-map-marker-alt"></i> {{$provider_config->alamat}}</span>
      <span class="mx-2"><i class="fas fa-phone"></i>  {{$provider_config->nohp_1}}</span>
      <span class="mx-2"><i class="fas fa-at"></i>  {{$provider_config->email}}</span>
    </div>
  </div>
</div>

<header>
 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active {{Request::is('/') ? 'active-menu-header' : ''}}" aria-current="page" href="/"><i class="fas fa-home"></i> Beranda</a>
          </li>

           <li class="nav-item">
            <a class="nav-link active {{Request::is('petunjuk') ? 'active-menu-header' : ''}}" aria-current="page" href="/petunjuk"><i class="fas fa-directions"></i> Petunjuk Pendaftaran</a>
          </li>


          <li class="nav-item">
            <a class="nav-link active {{Request::is('timeline') ? 'active-menu-header' : ''}}" aria-current="page" href="/timeline"><i class="fas fa-edit"></i> Timeline</a>
          </li>

        </ul>
        <form class="d-flex" role="search">
          @auth
          <a href="/auth" class="btn btn-secondary btn-sm"><i class="fas fa-user"></i> Dashboard</a>
          @else
          <a href="/account/dashboard" class="btn btn-danger btn-sm mx-2"><i class="fas fa-user-plus"></i> Buat akun</a>
          <a href="/account/dashboard" class="btn btn-secondary btn-sm"><i class="fas fa-sign-in-alt"></i> Login</a>
          @endauth
        </form>
      </div>
    </div>
  </nav>
</header> 