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
                <td>: {{ $mahasiswa->bidang_studi != null ? $mahasiswa->bidang_studi->name : ''}}</td>
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
                  <td>Kabupaten/Kota</td>
                  <td>: {{isset($mahasiswa->kabupatenByDomisili) ? $mahasiswa->kabupatenByDomisili->name : ''}}</td>
                </tr>
                 <tr>
                  <td>Provinsi</td>
                  <td>: {{ isset($mahasiswa->provinceByDomisili) ? $mahasiswa->provinceByDomisili->name : ''}}</td>
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