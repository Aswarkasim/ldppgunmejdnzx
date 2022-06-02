<div class="row">
  <div class="col-md-6">

    @foreach ($berkas as $item)
        
    <div class="card">
      <div class="card-body">
        <div class="display-flex">

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
          <strong>{{$item->kelengkapan->name}}</strong>
        </div>

    @if($errors->has('berkas'.$item->id))
        @foreach ($errors->all() as $error)
            <div class="text-danger mt-2">{{ $error }}</div>
        @endforeach
    @endif
     
      </div>
    </div>
    @endforeach
    
  </div>
</div>