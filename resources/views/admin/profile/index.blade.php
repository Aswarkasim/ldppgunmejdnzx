  <a href="/account/profile/biodata/" class="btn btn-info my-2" target="_blank"><i class="fas fa-user"></i> Lihat Data Diri</a>

<div class="row">
  <div class="col-md-12">
    <div class="card p-4">
      
        <style>
          .cursor-pointer{
            cursor: pointer;
          }
        </style>

        @php
            $page = request('page')
        @endphp
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

          <li class="nav-item">
            <a href="?page=data_diri" class="nav-link {{$page == 'data_diri' ? 'active' : ''}} cursor-pointer">Data Diri</a>
          </li>
          <li class="nav-item">
            <a href="?page=instansi" class="nav-link {{$page == 'instansi' ? 'active' : ''}} cursor-pointer">Instansi</a>
          </li>
          <li class="nav-item">
            <a href="?page=pendidikan" class="nav-link {{$page == 'pendidikan' ? 'active' : ''}} cursor-pointer">Pendidikan</a>
          </li>
          <li class="nav-item">
            <a href="?page=keluarga" class="nav-link {{$page == 'keluarga' ? 'active' : ''}} cursor-pointer">Keluarga</a>
          </li>

           <li class="nav-item">
            <a href="?page=rekening" class="nav-link {{$page == 'rekening' ? 'active' : ''}} cursor-pointer">Rekening</a>
          </li>

           <li class="nav-item">
            <a href="?page=pasfoto" class="nav-link {{$page == 'pasfoto' ? 'active' : ''}} cursor-pointer">Pas Foto</a>
          </li>

        </ul>


        @switch($page)
            @case('data_diri')
                @include('/admin/profile/data_diri')
                @break
            @case('instansi')
                @include('/admin/profile/instansi')
                @break
            @case('pendidikan')
                @include('/admin/profile/pendidikan')
                @break
            @case('keluarga')
                @include('/admin/profile/keluarga')
            @break
            @case('pasfoto')
                @include('/admin/profile/pasfoto')
            @break
             @case('rekening')
                @include('/admin/profile/rekening')
            @break
            @default
                
        @endswitch

    </div>
  </div>
</div>