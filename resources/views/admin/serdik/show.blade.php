<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h6><b> {{ isset($serdik->mahasiswa) ? $serdik->mahasiswa->namalengkap : ''}}. Nomor Seri :{{ $serdik->nomor_seri }}</b></h6>
        <iframe src="{{ $path_serdik }}" width="100%" height="500px" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>