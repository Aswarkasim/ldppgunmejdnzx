  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="/account/dashboard" class="brand-link">
      <img src="/img/ktc_logo_line.png" alt="AdminLTE Logo" width="15px" class="" style="opacity: .8"> 
      <span class="brand-text font-weight-light">LDPPGUNM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/account/dashboard" class="nav-link {{Request::is('account/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          

          @if (Auth::user()->role == 'superadmin')
              
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
            <a href="/account/kelengkapan" class="nav-link {{Request::is('account/kelengkapan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
               Kelengkapan
              </p>
            </a>
          </li>

          @endif

          @if (auth()->user()->role === 'mahasiswa')
              
          <li class="nav-item">
            <a href="/account/berkas" class="nav-link {{Request::is('account/berkas') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Berkas
              </p>
            </a>
          </li>
          
          @endif
           

          <li class="nav-item">
            <a href="/account/profile?page=data_diri" class="nav-link {{Request::is('account/profile*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-edit  "></i>
              <p>
                Data Diri
              </p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="/account" class="nav-link {{Request::is('account') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun
              </p>
            </a>
          </li>


          

          @if (auth()->user()->role == 'superadmin')

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
                <a href="/account/user" class="nav-link {{Request::is('account/user*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
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

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


