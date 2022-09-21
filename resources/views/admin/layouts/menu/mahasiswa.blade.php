    <li class="nav-item">
    <a href="/account/notif" class="nav-link {{Request::is('account/notif*') ? 'active' : ''}}">
      <i class="nav-icon fas fa-bell"></i>
      <p>
        Notifikasi
      </p>
    </a>
  </li>  
  


  <li class="nav-item {{Request::is('account/ppi*') ? 'menu-open' : ''}}">
    <a href="#" class="nav-link {{Request::is('account/ppi*') ? 'active' : ''}}">
      <i class="nav-icon fas fa-graduation-cap"></i>
      <p>
        PPI
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
  
      <li class="nav-item">
        <a href="/account/ppi" class="nav-link {{Request::is('account/ppi') ? 'child-active' : ''}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Cetak PPI</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="/account/ppi/bukti" class="nav-link {{Request::is('account/ppi/bukti*') ? 'child-active' : ''}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Upload Bukti Selesai</p>
        </a>
      </li>
      
    </ul>
  </li>

    <li class="nav-item">
    <a href="/account/profile?page=data_diri" class="nav-link {{Request::is('account/profile*') ? 'active' : ''}}">
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

  