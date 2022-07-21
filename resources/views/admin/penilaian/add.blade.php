<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/timeline/create'))
          <form action="/account/timeline" method="POST">  
        @else
          <form action="/account/timeline/{{$timeline->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror"  name="title"  value="{{isset($timeline) ? $timeline->title : old('title')}}" placeholder="Judul">
             @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

            <div class="form-group">
            <label for="">Mulai</label>
            <input type="date" class="form-control  @error('start') is-invalid @enderror"  name="start"  value="{{isset($timeline) ? $timeline->start : old('start')}}" placeholder="Mulai">
             @error('start')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

            <div class="form-group">
            <label for="">Akhir</label>
            <input type="date" class="form-control  @error('end') is-invalid @enderror"  name="end"  value="{{isset($timeline) ? $timeline->end : old('end')}}" placeholder="Judul">
             @error('end')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>

            
             <div class="form-group">
             <label for="">Status</label>
              <select name="is_done" class="form-control @error('is_done') is-invalid @enderror" id="">
                <option value="">-- Verifikasi --</option>
                <option value="1"
                <?php 
                if(isset($timeline)) {
                  if($timeline->is_done == 1) {
                    echo 'selected';
                    }
                }else{
                  if(old('is_done') == 1) {
                    echo 'selected';
                  }
                } ?> >Selesai</option>
                <option value="0"
                <?php 
                if(isset($timeline)) {
                  if($timeline->is_done == 0) {
                    echo 'selected';
                    }
                }else{
                  if(old('is_done') == 0) {
                    echo 'selected';
                  }
                } ?>
                >Belum</option>
              </select>
       
              
                @error('is_done')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control  @error('desc') is-invalid @enderror"  name="desc"  value="{{isset($timeline) ? $timeline->desc : old('desc')}}" placeholder="Deskripsi">
             @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>


     {{-- {!!form_input($errors, 'name', 'Nama', isset($timeline) ? $timeline : null)!!} --}}

          <a href="/account/timeline" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

