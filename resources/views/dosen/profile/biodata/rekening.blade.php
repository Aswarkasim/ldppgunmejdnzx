<h4 class="bg-primary p-2"><b>INSTANSI</b></h4>
<table class="table">
  <tr>
    <td>Nama Pemilik</td>
    <td>: {{$profile->nama_pemilik}}</td>
  </tr>
  <tr>
    <td>Nama Bank</td>
    <td>: {{$profile->nama_bank}}</td>
  </tr>
  <tr>
    <td>Nomor Rekening</td>
    <td>: {{$profile->nomor_rekening}}</td>
  </tr>

</table>

<a href="/account/dosen/profile?page=rekening&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>