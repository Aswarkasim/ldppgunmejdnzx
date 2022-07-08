<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/petunjuk/create'))
          <form action="/account/petunjuk" method="POST">  
        @else
          <form action="/account/petunjuk/{{$petunjuk->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror"  name="title"  value="{{isset($petunjuk) ? $petunjuk->title : old('title')}}" placeholder="Judul">
             @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

            <div class="form-group">
            <label for="">Link Youtube</label>
            <input type="text" class="form-control  @error('link') is-invalid @enderror"  name="link"  value="{{isset($petunjuk) ? $petunjuk->link : old('link')}}" placeholder="Link Youtube">
             @error('link')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($petunjuk) ? $petunjuk : null)!!} --}}

          <a href="/account/petunjuk" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

