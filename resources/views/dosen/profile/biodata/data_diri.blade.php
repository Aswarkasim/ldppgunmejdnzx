<h4 class="bg-primary p-2"><b>DATA DIRI</b></h4>
<table class="table">

<tr>
  <td>Nama Lengkap <small>(Lengkap dengan gelar)</small></td>
  <td>: {{$profile->namalengkap}}</td>
</tr>

<tr>
  <td>NIDN</td>
  <td>: {{$profile->nip}}</td>
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
    <td>: {{$profile->alamat_rumah}}</td>
  </tr>
  {{-- <tr>
    <td>Pekerjaan</td>
    <td>: {{$profile->pekerjaan}}</td>
  </tr> --}}
  <tr>
    <td>Pangkat/golongan</td>
    <td>: {{$profile->pangkat_golongan}}</td>
  </tr>
   <tr>
    <td>No. HP</td>
    <td>: {{$profile->nohp}}</td>
  </tr>


 

</table>

<hr>

<a href="/account/dosen/profile?page=data_diri&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>