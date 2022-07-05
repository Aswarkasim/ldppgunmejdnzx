{{-- <div class="py-2">
  @switch($user->status_berkas)
      @case('LENGKAPI')
          <a href="/account/berkas/status?status_berkas=WAITING" class="btn btn-primary masuk-verifikasi"><i class="fas fa-upload"></i> Masuk ke verifikasi</a>
          @break
      @case('WAITING')
          <div class="alert alert-info"><i class="fas fa-spinner"></i> Menunggu verifikasi berkas oleh admin</div>
          @break
      @case('VALID')
          <div class="alert alert-success"><i class="fas fa-check"></i> Berkas anda valid</div>
          @break
       @case('INVALID')
          <div class="alert alert-danger"><i class="fas fa-times"></i> Berkas anda tidak valid. silakan cek kembali berkas anda</div>
          @break
      @default
          
  @endswitch
</div> --}}

<div class="row">
  @foreach ($berkas as $item)
  <div class="col-md-6">

        
    <div class="card">
      <div class="card-body">
        <div class="display-flex">

             <div class="d-block">
            <strong>{{$item->kelengkapan->name}}</strong>
          </div>
          <p>{{$item->kelengkapan->desc}}</p>
          <div class="float-right">{{$item->kelengkapan->kebutuhan}}</div>
        </div>

          @switch($item->status)
              @case('KOSONG')
                   <button class="btn btn-warning btn-sm">
                      <i class="fas fa-exclamation-triangle mx-2"></i> 
                    </button>
                  @break
              @case('PENDING')
                  <button class="btn btn-info btn-sm">
                      <i class="fas fa-spinner mx-2"></i> 
                    </button>
                  @break
               @case('VALID')
                  <button class="btn btn-success btn-sm">
                      <i class="fas fa-check mx-2"></i> 
                    </button>
                  @break
                @case('TIDAK VALID')
                  <button class="btn btn-danger btn-sm">
                      <i class="fas fa-times mx-2"></i> 
                    </button>
                  @break
              @default
                  
          @endswitch
         
          
       
        @include('/admin/berkas/upload')

    @if($errors->has('berkas'.$item->id))
        @foreach ($errors->all() as $error)
            <div class="text-danger mt-2">{{ $error }}</div>
        @endforeach
    @endif
     
      </div>
    </div>
    
  </div>
  @endforeach
</div>