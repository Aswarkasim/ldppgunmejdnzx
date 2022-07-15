<h4 class="bg-primary p-2"><b>DATA DIRI</b></h4>
<table class="table">
<tr>
  <td >No. Pokok Mahasiswa</td>
  <td>: {{$profile->npm}}</td>
</tr>
<tr>
  <td>No. UKG/Peg.ID</td>
  <td>: {{$profile->no_ukg}}</td>
</tr>
<tr>
  <td>Nama Lengkap</td>
  <td>: {{$profile->namalengkap}}</td>
</tr>
<tr>
  <td>Bidang Studi</td>
  <td>: {{ $profile->bidang_studi != null ? $profile->bidang_studi->name : ''}}</td>
</tr>
<tr>
  <td>NIK</td>
  <td>: {{$profile->nik}}</td>
</tr>
  <tr>
  <td>Tempat Lahir</td>
  <td>: {{$profile->tempat_lahir}}</td>
</tr>
  <tr>
  <td>Tanggal Lahir</td>
  <td>: {{$profile->tanggal_lahir}}</td>
</tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>: {{$profile->jenis_kelamin}}</td>
  </tr>
  <tr>
    <td>Agama</td>
    <td>: {{$profile->agama}}</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: {{$profile->alamat_domisili}}</td>
  </tr>
  <tr>
    <td>Kabupaten/Kota</td>
    <td>: {{isset($profile->kabupatenByDomisili) ? $profile->kabupatenByDomisili->name : ''}}</td>
  </tr>
    <tr>
    <td>Provinsi</td>
    <td>: {{ isset($profile->provinceByDomisili) ? $profile->provinceByDomisili->name : ''}}</td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td>: {{$profile->kode_pos}}</td>
  </tr>
  <tr>
    <td>No. HP</td>
    <td>: {{$profile->nohp}}</td>
  </tr>

</table>

<hr>

<a href="/account/profile?page=data_diri&action=edit" class="btn btn-primary mb-4">
  <i class="fas fa-edit"></i> Edit
</a>