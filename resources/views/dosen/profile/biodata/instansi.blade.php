<h4 class="bg-primary p-2"><b>INSTANSI</b></h4>
<table class="table">
  <tr>
    <td>Nama Instansi</td>
    <td>: {{$profile->nama_instansi}}</td>
  </tr>

  <tr>
    <td>Fakultas</td>
    <td>: {{$profile->fakultas}}</td>
  </tr>

  <tr>
    <td>Jurusan</td>
    <td>: {{$profile->jurusan}}</td>
  </tr>
  <tr>
    <td>Prodi</td>
    <td>: {{$profile->prodi}}</td>
  </tr>


</table>

<a href="/account/dosen/profile?page=instansi&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>