<div class="container mt-4">
  <div class="row">
    {{-- Warna hijau jika sudah terlewati --}}
    @for ($i = 1; $i < 10; $i++)
        
    <div class="col-md-3 mt-2">
      <div class="card p-3 shadow-sm">
        <h5><b>Registrasi</b></h5>
        <p>Registasi lapor diri</p>
        <p>Mulai 02 Februari 2022</p>
        <p>Sampai 04 Februari 2022</p>
      </div>
    </div>
    
    @endfor
    
  </div>
</div>