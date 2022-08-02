<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/master/matakuliah/create'))
          <form action="/account/master/matakuliah" method="POST">  
        @else
          <form action="/account/master/matakuliah/{{$matakuliah->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Kode</label>
            <input type="text" class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($matakuliah) ? $matakuliah->kode : old('kode')}}" placeholder="Kode">
             @error('kode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($matakuliah) ? $matakuliah->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>




     {{-- {!!form_input($errors, 'name', 'Nama', isset($matakuliah) ? $matakuliah : null)!!} --}}

          <a href="/account/matakuliah" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

