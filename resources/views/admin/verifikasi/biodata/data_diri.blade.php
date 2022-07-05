<h4 class="bg-primary p-2"><b>DATA DIRI</b></h4>
            <table class="table">
              <tr>
                <td >No. Pokok Mahasiswa</td>
                <td>: {{$mahasiswa->npm}}</td>
              </tr>
              <tr>
                <td>No. UKG/Peg.ID</td>
                <td>: {{$mahasiswa->no_ukg}}</td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>: {{$mahasiswa->namalengkap}}</td>
              </tr>
              <tr>
                <td>Bidang Studi</td>
                <td>: {{ $mahasiswa->bidangstudi != null ? $mahasiswa->bidangstudi->name : ''}}</td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>: {{$mahasiswa->nik}}</td>
              </tr>
               <tr>
                <td>Tempat Lahir</td>
                <td>: {{$mahasiswa->tempat_lahir}}</td>
              </tr>
               <tr>
                <td>Tanggal Lahir</td>
                <td>: {{$mahasiswa->tanggal_lahir}}</td>
              </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>: {{$mahasiswa->jenis_kelamin}}</td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>: {{$mahasiswa->agama}}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>: {{$mahasiswa->alamat_domisili}}</td>
                </tr>
                <tr>
                  <td>Kota</td>
                  <td>: {{$mahasiswa->kota}}</td>
                </tr>
                <tr>
                  <td>Kode Pos</td>
                  <td>: {{$mahasiswa->kode_pos}}</td>
                </tr>
                <tr>
                  <td>No. HP</td>
                  <td>: {{$mahasiswa->nohp}}</td>
                </tr>

            </table>
            
            <hr>