    <li class="nav-item">
    <a href="/account/notif" class="nav-link {{Request::is('account/notif*') ? 'active' : ''}}">
      <i class="nav-icon fas fa-bell"></i>
      <p>
        Notifikasi
      </p>
    </a>
  </li>  
  
  <li class="nav-item">
    <a href="/account/dosen/profile?page=data_diri" class="nav-link {{Request::is('account/dosen/profile*') ? 'active' : ''}}">
      <i class="nav-icon fas fa-edit  "></i>
      <p>
        Data Diri
      </p>
    </a>
  </li>

        
  <li class="nav-item">
    <a href="/account/berkas" class="nav-link {{Request::is('account/berkas') ? 'active' : ''}}">
      <i class="nav-icon fas fa-file"></i>
      <p>
        Unggah Berkas
      </p>
    </a>
  </li>

  