  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">
          <a href="/account/surat" class="btn btn-primary "><i class="fa fa-arrow-left"></i> Kembali</a>
          <a href="/account/surat/ppi/preview/{{ $surat->id }}" target="blank" class="btn btn-info "><i class="fa fa-eye"></i> Preview</a>

          

          <div class="row">
            <div class="col-6">

              <form action="/account/surat/ppi/save/{{ $surat->id }}" method="POST">  
                @method('PUT')
                @csrf

              <div class="form-group">
                <label for="">Perihal</label>
                <input type="text" class="form-control  @error('perihal') is-invalid @enderror"  name="perihal"  value="{{isset($surat) ? $surat->perihal : old('perihal')}}" placeholder="Perihal">
                @error('perihal')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Nomor Surat Awal</label>
                <input type="number" value="{{$surat->nomor_surat_awal}}" placeholder="0" class="form-control @error('nomor_surat_awal') is-invalid @enderror" name="nomor_surat_awal">
                @error('nomor_surat_awal')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
      
               <div class="form-group">
                <label for="">Nomor Surat Akhir</label>
                <input type="number" value="{{$surat->nomor_surat_akhir}}" placeholder="0" class="form-control @error('nomor_surat_akhir') is-invalid @enderror" name="nomor_surat_akhir">
                @error('nomor_surat_akhir')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
              </div>
             

              <div class="form-group">
                <label for="">Jabatan TTD</label>
                <input type="text" class="form-control  @error('jabatan_ttd') is-invalid @enderror"  name="jabatan_ttd"  value="{{isset($surat) ? $surat->jabatan_ttd : old('jabatan_ttd')}}" placeholder="Jabatan TTD">
                @error('jabatan_ttd')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Nama Pejabat</label>
                <input type="text" class="form-control  @error('nama_ttd') is-invalid @enderror"  name="nama_ttd"  value="{{isset($surat) ? $surat->nama_ttd : old('nama_ttd')}}" placeholder="Nama Pejabat">
                @error('nama_ttd')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">NIP</label>
                <input type="text" class="form-control  @error('nip') is-invalid @enderror"  name="nip"  value="{{isset($surat) ? $surat->nip : old('nip')}}" placeholder="NIP">
                @error('nip')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

          
              <div class="form-group">
                <label for="">Body Surat</label>
                <textarea class="form-control  @error('body') is-invalid @enderror" id="summernote"  name="body" placeholder="Body Surat">{{isset($surat) ? $surat->body : old('body')}}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              {{-- <div class="form-group">
                <label for="">Tembusan</label>
                <textarea class="form-control  @error('tembusan') is-invalid @enderror" id="summernote"  name="tembusan" placeholder="Tembusan">{{isset($surat) ? $surat->tembusan : old('tembusan')}}</textarea>
                @error('tembusan')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div> --}}


              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
            </form>
              

            </div>
            <div class="col-md-6">
  
              <div class="form-group">
                <label for="">Tanda Tangtan</label>
                @include('admin.surat.ttd')
                <br>
                @if ($surat->ttd != null)
                <a href="/account/surat/ppi/ttd/download?ttd={{ $surat->ttd }}">Download</a>
                <br>
                    <img src="/{{ $surat->ttd }}" alt="">
                @endif
              </div>


              <div class="form-group">
                <label for="">Paraf</label>
                @include('admin.surat.paraf')
    <br>
                @if ($surat->paraf != null)
                <a href="/account/surat/ppi/ttd/download?ttd={{ $surat->paraf }}">Download</a>
                    <img src="/{{ $surat->paraf }}" alt="">
                @endif
              </div>

            </div>
          </div>
        

     
       

       
        
      </div>
    </div>
  </div>
</div>


<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
