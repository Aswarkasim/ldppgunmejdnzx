  {{-- <a href="/account/profile/biodata/" class="btn btn-info my-2" target="_blank"><i class="fas fa-user"></i> Lihat Data Diri</a> --}}

<div class="row">
  <div class="col-md-12">
    <div class="card p-4">
      
        <style>
          .cursor-pointer{
            cursor: pointer;
          }
        </style>

        @php
            $page = request('page');
            $action = request('action');
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
            <a href="?page=rekening" class="nav-link {{$page == 'rekening' ? 'active' : ''}} cursor-pointer">Rekening</a>
          </li>

           <li class="nav-item">
            <a href="?page=pasfoto" class="nav-link {{$page == 'pasfoto' ? 'active' : ''}} cursor-pointer">Pas Foto</a>
          </li>

        </ul>


        @switch($page)
            @case('data_diri')
                @if ($action == 'edit')
                  @include('/dosen/profile/edit/data_diri')
                @else
                  @include('/dosen/profile/biodata/data_diri')
                @endif
                @break


            @case('instansi')
                @if ($action == 'edit')
                  @include('/dosen/profile/edit/instansi')
                @else
                  @include('/dosen/profile/biodata/instansi')
                @endif
                @break


            @case('pendidikan')
                @if ($action == 'edit')
                  @include('/dosen/profile/edit/pendidikan')
                @else
                  @include('/dosen/profile/biodata/pendidikan') 
                @endif
                @break


            @case('pasfoto')
                @include('/dosen/profile/edit/pasfoto')
            @break


             @case('rekening')
                 @if ($action == 'edit')
                  @include('/dosen/profile/edit/rekening')
                @else
                  @include('/dosen/profile/biodata/rekening')  
                @endif
            @default
                
        @endswitch

        {{-- @if ($page == 'data_diri')
            @if ()
                
            @else
                
            @endif
            @include('/dosen/profile/read/data_diri')
        @else
            
        @endif --}}

    </div>
  </div>
</div>