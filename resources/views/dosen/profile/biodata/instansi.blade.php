<h4 class="bg-primary p-2"><b>INSTANSI</b></h4>
<table class="table">
  <tr>
    <td>Nama Instansi</td>
    <td>: {{$profile->nama_instansi}}</td>
  </tr>

  <tr>
    <td>Alamat</td>
    <td>: {{$profile->alamat_instansi}}</td>
  </tr>

  <tr>
    <td>Kabupaten</td>
    <td>: {{isset($profile->kab_instansi) ? $profile->kab_instansi->name : ''}}</td>
  </tr>
    <tr>
    <td>Provinsi</td>
    <td>: {{ isset($profile->prov_insatansi) ? $profile->prov_insatansi->name : ''}}</td>
  </tr>

</table>

<a href="/account/dosen/profile?page=instansi&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>