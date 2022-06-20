<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/master/kelasprogram/create'))
          <form action="/account/master/kelasprogram" method="POST">  
        @else
          <form action="/account/master/kelasprogram/{{$kelasprogram->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Kode Bidang Studi</label>
            <input type="text" class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($kelasprogram) ? $kelasprogram->kode : old('kode')}}" placeholder="Kode Bidang Studi">
             @error('kode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kelasprogram) ? $kelasprogram->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control  @error('desc') is-invalid @enderror"  name="desc"  value="{{isset($kelasprogram) ? $kelasprogram->desc : old('desc')}}" placeholder="Deskripsi">
             @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($kelasprogram) ? $kelasprogram : null)!!} --}}

          <a href="/account/master/kelasprogram" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

