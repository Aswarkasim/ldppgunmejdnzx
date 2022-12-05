
  <li class="nav-item">
    <a href="/account/posts/post" class="nav-link {{Request::is('account/posts*') ? 'active' : ''}}">
      <i class="nav-icon fas fa-newspaper"></i>
      <p>
        Berita
      </p>
    </a>
  </li>

  
  <li class="nav-item">
  <a href="/account/verifikasi" class="nav-link {{Request::is('account/verifikasi*') ? 'active' : ''}}">
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

  {{-- <li class="nav-item">
  <a href="/account/mahasiswa" class="nav-link {{Request::is('account/mahasiswa*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Mahasiswa
    </p>
  </a>
</li> --}}

<li class="nav-item">
  <a href="/account/pamong" class="nav-link {{Request::is('account/pamong*') ? 'active' : ''}}">
    <i class="fas fa-chalkboard-teacher"></i>
    <p>
      Guru Pamong
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="/account/dosen" class="nav-link {{Request::is('account/dosen*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-graduation-cap"></i>
    <p>
      Dosen
    </p>
  </a>
</li>

<li class="nav-item {{Request::is('account/mahasiswa*') ? 'menu-open' : ''}}">
  <a href="#" class="nav-link {{Request::is('account/mahasiswa*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Mahasiswa
     <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/account/mahasiswa/kemendikbud" class="nav-link {{Request::is('account/mahasiswa/kemendikbud*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Kemendikbud</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/account/mahasiswa/kemenag" class="nav-link {{Request::is('account/mahasiswa/kemenag*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Kemenag</p>
      </a>
    </li>

     <li class="nav-item">
      <a href="/account/mahasiswa/notinverified" class="nav-link {{Request::is('account/mahasiswa/notinverified')  ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Belum Masuk Verifikasi</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/account/mahasiswa/notregisted" class="nav-link {{Request::is('account/mahasiswa/notregisted')  ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Belum Lapor Diri</p>
      </a>
    </li>
    
  </ul>
</li>

<li class="nav-item">
  <a href="/account/serdik" class="nav-link {{Request::is('account/serdik*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-certificate"></i>
    <p>
      Serdik
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="/account/kelas" class="nav-link {{Request::is('account/kelas*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Kelas
    </p>
  </a>
</li>



<li class="nav-item {{Request::is('account/surat*') ? 'menu-open' : ''}}">
  <a href="#" class="nav-link {{Request::is('account/surat*') ? 'active' : ''}}">
    <i class="nav-icon fas fa-envelope"></i>
    <p>
      Surat
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="/account/surat/ppi?type=ppi" class="nav-link {{Request::is('account/surat/ppi*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>PPI</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/account/surat/skbs?type=skbs" class="nav-link {{Request::is('account/surat/skbs*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>SKBS</p>
      </a>
    </li>

  </ul>
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

    <li class="nav-item">
      <a href="/account/master/matakuliah" class="nav-link {{Request::is('account/master/matakuliah*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Mata Kuliah</p>
      </a>
    </li>

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
      <a href="/account/user?role=mahasiswa" class="nav-link {{request('role') == 'mahasiswa'  ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Mahasiswa</p>
      </a>
    </li>

     <li class="nav-item">
      <a href="/account/user?role=dosen" class="nav-link {{request('role') == 'dosen'  ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Dosen</p>
      </a>
    </li>

    <li class="nav-item">
    <a href="/account/user/admin?role=admin" class="nav-link {{Request::is('account/user/admin*') ? 'child-active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Admin Kelas</p>
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
  <a href="/account/petunjuk" class="nav-link {{Request::is('account/petunjuk*') ? 'child-active' : ''}}">
    <i class="nav-icon fas fa-directions"></i>
    <p>
      Petunjuk
    </p>
  </a>
</li>

  <li class="nav-item">
  <a href="/account/timeline" class="nav-link {{Request::is('account/timeline*') ? 'child-active' : ''}}">
    <i class="nav-icon fas fa-calendar"></i>
    <p>
      Timeline
    </p>
  </a>
</li>

    
  <li class="nav-item">
  <a href="/account/banner" class="nav-link {{Request::is('account/banner*') ? 'child-active' : ''}}">
    <i class="nav-icon fas fa-image"></i>
    <p>
      Banner
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="/account/konfigurasi" class="nav-link {{Request::is('account/konfigurasi*') ? 'child-active' : ''}}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      Konfigurasi
    </p>
  </a>
</li>