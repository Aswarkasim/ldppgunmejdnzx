<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/serdik/create'))
          <form action="/account/serdik" method="POST">  
        @else
          <form action="/account/serdik/{{$serdik->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">No. UKG</label>
            <input type="text" class="form-control  @error('no_ukg') is-invalid @enderror"  name="no_ukg"  value="{{isset($serdik) ? $serdik->no_ukg : old('no_ukg')}}" placeholder="No. UKG">
             @error('no_ukg')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Nomor Seri</label>
            <input type="text" class="form-control  @error('nomor_seri') is-invalid @enderror"  name="nomor_seri"  value="{{isset($serdik) ? $serdik->nomor_seri : old('nomor_seri')}}" placeholder="Nomor Seri">
             @error('nomor_seri')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>




     {{-- {!!form_input($errors, 'name', 'Nama', isset($serdik) ? $serdik : null)!!} --}}

          <a href="/account/serdik" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

