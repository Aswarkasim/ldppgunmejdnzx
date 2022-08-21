<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
         <a href="/account/dosen" class="btn btn-info my-3"><i class="fa fa-arrow-left"></i> Kembali</a>

        <table class="table">
          <tr>
            <td>NIDN</td>
            <td>: {{$dosen->nip}}</td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>: {{$dosen->namalengkap}}</td>
          </tr>

          <tr>
            <td>Nomor Serdos</td>
            <td>: {{$dosen->nomor_serdos}}</td>
          </tr>

          <tr>
            <td>Pangkat/Golongan</td>
            <td>: {{$dosen->pangkat_golongan}}</td>
          </tr>

          <tr>
            <td>NPWP</td>
            <td>: {{$dosen->npwp}}</td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>: {{$dosen->alamat}}</td>
          </tr>

          <tr>
            <td>No. Hp/Wa</td>
            <td>: {{$dosen->nohp}}</td>
          </tr>

          <tr>
            <td>No. Rekening BNI</td>
            <td>: {{$dosen->nomor_rekening}}</td>
          </tr>

          <tr>
            <td>Nama Bank</td>
            <td>: {{$dosen->nama_bank}}</td>
          </tr>

          <tr>
            <td>nama_pemilik</td>
            <td>: {{$dosen->nama_pemilik}}</td>
          </tr>


        </table>
      </div>
    </div>
  </div>
</div>