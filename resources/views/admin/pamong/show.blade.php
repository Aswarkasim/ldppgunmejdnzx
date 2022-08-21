<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
         <a href="/account/pamong" class="btn btn-info my-3"><i class="fa fa-arrow-left"></i> Kembali</a>

        <table class="table">
          <tr>
            <td>NIDN</td>
            <td>: {{$pamong->nip}}</td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>: {{$pamong->namalengkap}}</td>
          </tr>

          <tr>
            <td>Nomor Serdos</td>
            <td>: {{$pamong->nomor_serdos}}</td>
          </tr>

          <tr>
            <td>Pangkat/Golongan</td>
            <td>: {{$pamong->pangkat_golongan}}</td>
          </tr>

          <tr>
            <td>NPWP</td>
            <td>: {{$pamong->npwp}}</td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>: {{$pamong->alamat}}</td>
          </tr>

          <tr>
            <td>No. Hp/Wa</td>
            <td>: {{$pamong->nohp}}</td>
          </tr>

          <tr>
            <td>No. Rekening BNI</td>
            <td>: {{$pamong->nomor_rekening}}</td>
          </tr>

          <tr>
            <td>Nama Bank</td>
            <td>: {{$pamong->nama_bank}}</td>
          </tr>

          <tr>
            <td>nama_pemilik</td>
            <td>: {{$pamong->nama_pemilik}}</td>
          </tr>


        </table>
      </div>
    </div>
  </div>
</div>