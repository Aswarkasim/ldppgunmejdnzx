<h4 class="bg-primary p-2"><b>INSTANSI</b></h4>
<table class="table">
  <tr>
    <td>Instansi</td>
    <td>: {{$profile->nama_instansi}}</td>
  </tr>
  <tr>
    <td>NPSN</td>
    <td>: {{$profile->npsn_sekolah}}</td>
  </tr>
  <tr>
    <td>Jenjang Pendidikan</td>
    <td>: {{$profile->jenjang_pendidikan}}</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: {{$profile->alamat_instansi}}</td>
  </tr>

</table>

<a href="/account/profile?page=instansi&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>