<h4 class="bg-primary p-2"><b>DATA PENDIDIKAN</b></h4>
<table class="table">
  <tr class="bg-secondary">
    <td>Nama Perguruan Tinggi (PT) S1</td>
    <td>: {{$profile->pt_s1}}</td>
  </tr>
  <tr>
    <td>Prodi S1</td>
    <td>: {{$profile->nama_prodi_s1}}</td>
  </tr>
  <tr>
    <td>Nomor Ijazah S1</td>
    <td>: {{$profile->nomor_ijazah_s1}}</td>
  </tr>
  <tr>
    <td>IPK S1</td>
    <td>: {{$profile->ipk_s1}}</td>
  </tr>
  <tr>
    <td>Tanggal Lulus S1</td>
    <td>: {{$profile->tanggal_kelulusan_s1}}</td>
  </tr>
  <tr>
    <td>Alamat PT S1</td>
    <td>: {{$profile->alamat_pt_s1}}</td>
  </tr>
  <tr>
    <td>Kabupaten S1</td>
    <td>: {{ isset($profile->kabupatenByPts1) ? $profile->kabupatenByPts1->name : ''}}</td>
  </tr>
  <tr>
    <td>Provinsi S1</td>
    <td>: {{ isset($profile->provinceByPts1) ? $profile->provinceByPts1->name : ''}}</td>
  </tr>
  

  <tr class="bg-secondary">
    <td>Nama Perguruan Tinggi (PT) S2</td>
    <td>: {{$profile->pt_s1}}</td>
  </tr>
  <tr>
    <td>Prodi S2</td>
    <td>: {{$profile->nama_prodi_s1}}</td>
  </tr>
  <tr>
    <td>Nomor Ijazah S2</td>
    <td>: {{$profile->nomor_ijazah_s1}}</td>
  </tr>
  <tr>
    <td>IPK S2</td>
    <td>: {{$profile->ipk_s1}}</td>
  </tr>
  <tr>
    <td>Tanggal Lulus S2</td>
    <td>: {{$profile->tanggal_kelulusan_s1}}</td>
  </tr>
  <tr>
    <td>Alamat PT S2</td>
    <td>: {{$profile->alamat_pt_s1}}</td>
  </tr>
  <tr>
    <td>Provinsi S2</td>
    <td>: {{ isset($profile->provinceByPts2) ? $profile->provinceByPts2->name : ''}}</td>
  </tr>
  <tr>
    <td>Kabupaten S2</td>
    <td>: {{ isset($mahaiswa->kabupatenByPts2) ? $profile->kabupatenByPts2->name : ''}}</td>
  </tr>

</table>

<a href="profile?page=pendidikan&action=edit" class="btn btn-primary">
  <i class="fas fa-edit"></i> Edit
</a>