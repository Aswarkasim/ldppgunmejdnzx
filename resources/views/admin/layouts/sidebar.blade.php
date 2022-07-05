  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="/account/dashboard" class="brand-link">
      <img src="/img/ktc_logo_line.png" alt="AdminLTE Logo" width="15px" class="" style="opacity: .8"> 
      <span class="brand-text font-weight-light">SIAPPGUNM</span>
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

     
          @switch(Auth::user()->role)
              @case('superadmin')
                  @include('admin.layouts.menu.superadmin')
                  @break
              @case('admin')
                  @include('admin.layouts.menu.admin')                  
                  @break
              @case('verificator')
                  @include('admin.layouts.menu.verificator')                  
                  @break
              @case('mahasiswa')
                  @include('admin.layouts.menu.mahasiswa')                  
                  @break
              @default
                  
          @endswitch
          
           <li class="nav-item">
            <a href="/account/akun" class="nav-link {{Request::is('account/akun*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


