<div class="container mt-4">
  <div class="text-center">
    <h4><b>Timeline Pelaksanaan</b></h4>
  </div>
  <div class="row">
    {{-- Warna hijau jika sudah terlewati --}}
    @foreach($timeline as $item)
        
    <div class="col-md-3 mt-2">
      <div class="card p-3 shadow-sm {{$item->is_done == 1 ? 'bg-secondary text-white' : ''}}" style="height: 250px">
        <h5><b>{{$item->title}}</b></h5>
        <p>{{$item->desc}}</p>
        <p>Tanggal : {{$item->start}}</p>
        @isset($item->end)
            <p>Sampai : {{$item->end}}</p>
        @endisset

        @if ($item->is_done == 1)
          <p>  <i class="fas fa-check"></i> Selesai</p>
        @else    
           <p> <i class="fas fa-spinner"></i> Menunggu</p>
        @endif
      </div>
    </div>
    
    @endforeach
    
  </div>
</div>