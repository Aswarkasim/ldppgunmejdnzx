<li class="nav-item {{Request::is('account/posts*') ? 'menu-open' : ''}}">
  <a href="#" class="nav-link {{Request::is('account/posts*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-newspaper"></i>
    <p>
      Artikel
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/account/posts/post" class="nav-link {{Request::is('account/posts/post*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Artikel</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/account/posts/kategori" class="nav-link {{Request::is('account/posts/kategori*') ? 'child-active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Kategori</p>
      </a>
    </li>
  </ul>
</li>
  
  <li class="nav-item">
  <a href="/account/verifikasi" class="nav-link {{Request::is('account/verifikasi') ? 'active' : ''}}">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Verifikasi
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="/account/kelengkapan" class="nav-link {{Request::is('account/kelengkapan*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Kelengkapan
    </p>
  </a>
</li>

  <li class="nav-item">
  <a href="/account/mahasiswa" class="nav-link {{Request::is('account/mahasiswa') ? 'active' : ''}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Mahasiswa
    </p>
  </a>
</li>


<li class="nav-item {{Request::is('account/master*') ? 'menu-open' : ''}}">
  <a href="#" class="nav-link {{Request::is('account/master*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-folder"></i>
    <p>
      Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="/account/master/jenisppg" class="nav-link {{Request::is('account/master/jenisppg*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Jenis PPG</p>
      </a>
    </li>

    

  

      <li class="nav-item">
      <a href="/account/master/periode" class="nav-link {{Request::is('account/master/periode*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Periode</p>
      </a>
    </li>

      <li class="nav-item">
      <a href="/account/master/bidangstudi" class="nav-link {{Request::is('account/master/bidangstudi*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Bidang Studi</p>
      </a>
    </li>
    
    

    {{-- <li class="nav-item">
      <a href="/account/master/prodi" class="nav-link {{Request::is('account/master/prodi*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Prodi</p>
      </a>
    </li> --}}
    
  </ul>
</li>


<li class="nav-item {{Request::is('account/user*') ? 'menu-open' : ''}}">
  <a href="#" class="nav-link {{Request::is('account/user*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      User
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/account/user?role=admin" class="nav-link {{request('role') == 'admin' ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Admin</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/account/user?role=verificator" class="nav-link {{request('role') == 'verificator'  ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Verifikator</p>
      </a>
    </li>
    
  </ul>
</li>


    
  <li class="nav-item">
  <a href="/account/banner" class="nav-link">
    <i class="nav-icon fas fa-image"></i>
    <p>
      Banner
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="/account/konfigurasi" class="nav-link">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      Konfigurasi
    </p>
  </a>
</li>