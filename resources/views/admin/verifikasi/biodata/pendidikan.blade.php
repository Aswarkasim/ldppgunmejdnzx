<h4 class="bg-primary p-2"><b>DATA PENDIDIKAN</b></h4>
<table class="table">
  <tr class="bg-secondary">
    <td>Nama Perguruan Tinggi (PT) S1</td>
    <td>: {{$mahasiswa->pt_s1}}</td>
  </tr>
  <tr>
    <td>Prodi S1</td>
    <td>: {{$mahasiswa->nama_prodi_s1}}</td>
  </tr>
  <tr>
    <td>Nomor Ijazah S1</td>
    <td>: {{$mahasiswa->nomor_ijazah_s1}}</td>
  </tr>
  <tr>
    <td>IPK S1</td>
    <td>: {{$mahasiswa->ipk_s1}}</td>
  </tr>
  <tr>
    <td>Tanggal Lulus S1</td>
    <td>: {{$mahasiswa->tanggal_kelulusan_s1}}</td>
  </tr>
  <tr>
    <td>Alamat PT S1</td>
    <td>: {{$mahasiswa->alamat_pt_s1}}</td>
  </tr>
  <tr>
    <td>Kabupaten S1</td>
    <td>: {{ isset($mahasiswa->kabupatenByPts1) ? $mahasiswa->kabupatenByPts1->name : ''}}</td>
  </tr>
  <tr>
    <td>Provinsi S1</td>
    <td>: {{ isset($mahasiswa->provinceByPts1) ? $mahasiswa->provinceByPts1->name : ''}}</td>
  </tr>
  

  <tr class="bg-secondary">
    <td>Nama Perguruan Tinggi (PT) S2</td>
    <td>: {{$mahasiswa->pt_s1}}</td>
  </tr>
  <tr>
    <td>Prodi S2</td>
    <td>: {{$mahasiswa->nama_prodi_s1}}</td>
  </tr>
  <tr>
    <td>Nomor Ijazah S2</td>
    <td>: {{$mahasiswa->nomor_ijazah_s1}}</td>
  </tr>
  <tr>
    <td>IPK S2</td>
    <td>: {{$mahasiswa->ipk_s1}}</td>
  </tr>
  <tr>
    <td>Tanggal Lulus S2</td>
    <td>: {{$mahasiswa->tanggal_kelulusan_s1}}</td>
  </tr>
  <tr>
    <td>Alamat PT S2</td>
    <td>: {{$mahasiswa->alamat_pt_s1}}</td>
  </tr>
  <tr>
    <td>Provinsi S2</td>
    <td>: {{ isset($mahasiswa->provinceByPts2) ? $mahasiswa->provinceByPts2->name : ''}}</td>
  </tr>
  <tr>
    <td>Kabupaten S2</td>
    <td>: {{ isset($mahaiswa->kabupatenByPts2) ? $mahasiswa->kabupatenByPts2->name : ''}}</td>
  </tr>

</table>