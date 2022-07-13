<h4 class="bg-primary p-2"><b>DATA KELUARGA</b></h4>
<table class="table">
  <tr class="bg-secondary">
    <td>Nama Pasangan (Suami/Istri)</td>
    <td>: {{$mahasiswa->nama_pasangan}}</td>
  </tr>
  <tr>
    <td>Pendidikan Pasangan</td>
    <td>: {{$mahasiswa->pendidikan_pasangan}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Pasangan</td>
    <td>: {{$mahasiswa->pekerjaan_pasangan}}</td>
  </tr>
  <tr>
    <td>Jumlah Anak</td>
    <td>: {{$mahasiswa->jumlah_anak}}</td>
  </tr>

  <tr class="bg-secondary">
    <td><b>Nama Ayah Kandung</b></td>
    <td>: {{$mahasiswa->nama_ayah_kandung}}</td>
  </tr>
  <tr>
    <td>Pendidikan Ayah Kandung</td>
    <td>: {{$mahasiswa->pendidikan_ayah_kandung}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ayah Kandung</td>
    <td>: {{$mahasiswa->pekerjaan_ayah_kandung}}</td>
  </tr>
  {{-- <tr>
    <td>Penghasilan Ayah Kandung</td>
    <td>: {{$mahasiswa->penghasilan_ayah_kandung}}</td>
  </tr> --}}
  <tr>
    <td>NIK Ayah Kandung</td>
    <td>: {{$mahasiswa->nik_ayah_kandung}}</td>
  </tr>

  <tr class="bg-secondary">
    <td><b>Nama Ibu Kandung</b></td>
    <td>: {{$mahasiswa->nama_ibu_kandung}}</td>
  </tr>
  <tr>
    <td>Pendidikan Ibu Kandung</td>
    <td>: {{$mahasiswa->pendidikan_ibu_kandung}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ibu Kandung</td>
    <td>: {{$mahasiswa->pekerjaan_ibu_kandung}}</td>
  </tr>
  {{-- <tr>
    <td>Penghasilan Ibu Kandung</td>
    <td>: {{$mahasiswa->penghasilan_ibu_kandung}}</td>
  </tr> --}}
  <tr>
    <td>NIK Ibu Kandung</td>
    <td>: {{$mahasiswa->nik_ibu_kandung}}</td>
  </tr>

  <tr class="bg-secondary">
    <td>No. HP Orangtua/Keluarga Dekat</td>
    <td>: {{$mahasiswa->nohp_keluarga_dekat}}</td>
  </tr>
   <tr>
    <td>Alamat Orangtua/Keluarga Dekat</td>
    <td>: {{$mahasiswa->alamat_orantua}}</td>
  </tr>
   <tr>
    <td>Provinsi Orangtua/Keluarga Dekat</td>
    <td>: {{$mahasiswa->provinceByOrangtua->name}}</td>
  </tr>
   <tr>
    <td>Kabupaten Orangtua/Keluarga Dekat</td>
    <td>: {{$mahasiswa->kabupatenByOrangtua->name}}</td>
  </tr>
  

</table>

