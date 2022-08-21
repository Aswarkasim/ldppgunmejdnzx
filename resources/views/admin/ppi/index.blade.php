

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">


        @if ($mahasiswa->keaktifan == 'AKTIF')
    
        


        {{-- <a href="" class="btn btn-primary" target="_blank"><i class="fas fa-edit"></i> Edit</a> --}}
        @include('admin.ppi.edit')
        <a href="/account/ppi/cetak" class="btn btn-info" target="_blank"><i class="fas fa-print"></i> Cetak</a>
        <table class="table mt-2">
          <tr>
            <td>Nomor Surat</td>
            <td>: {{$ppi->nomor_surat}}/UN36.26/LL/{{date('Y')}}</td>
          </tr>
          
          <tr>
            <td>Nomor Induk Mahasiswa</td>
            <td>: {{$mahasiswa->npm}}</td>
          </tr>

          <tr>
            <td>Nama Lengkap</td>
            <td>: {{$ppi->namalengkap}}</td>
          </tr>

          <tr>
            <td>Bidang Studi</td>
            <td>: {{$mahasiswa->bidang_studi->name}}</td>
          </tr>

          <tr>
            <td>Sekolah Tujuan</td>
            <td>: {{$ppi->sekolah_lokasi}}</td>
          </tr>

           <tr>
            <td>Alamat</td>
            <td>: {{$ppi->alamat}}</td>
          </tr>

          <tr>
            <td>Kabupaten/Kota</td>
            <td>: {{$ppi->kabupaten_name}}</td>
          </tr>

          <tr>
            <td>Asal Sekolah</td>
            <td>: {{$mahasiswa->nama_instansi}}</td>
          </tr>

        </table>

      @else
            <div class="alert alert-info">
              <i class="fas fa-info"></i> Anda tidak bisa melaksanakan PPI. Status kemahasiswaan anda tidak aktif
            </div>
        @endif

      </div>


    </div>
  </div>
</div>