<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/master/periode/create'))
          <form action="/account/master/periode" method="POST">  
        @else
          <form action="/account/master/periode/{{$periode->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($periode) ? $periode->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

           <div class="form-group">
                <label for="">Jenis PPG</label>
                <select name="jenis_ppg_id" class="form-control @error('jenis_ppg_id') is-invalid @enderror" >
                  <option value="">-- Jenis PPG --</option>
                  @foreach ($jenis as $item)
                      <option value="{{$item->id}}"
                        <?php 
                          if(isset($periode)){
                            if($periode->jenis_ppg_id == $item->id){
                              echo 'selected';
                            }
                          }
                          ?>
                        >{{$item->name}}</option>
                  @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
          

           <div class="form-group">
            <label for="">Tahun</label>
            <input type="number" class="form-control  @error('tahun') is-invalid @enderror"  name="tahun"  value="{{isset($periode) ? $periode->tahun : old('tahun')}}" placeholder="Tahun">
             @error('tahun')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>
          

          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control  @error('desc') is-invalid @enderror"  name="desc"  value="{{isset($periode) ? $periode->desc : old('desc')}}" placeholder="Deskripsi">
             @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($periode) ? $periode : null)!!} --}}

          <a href="/account/periode" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

