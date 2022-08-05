<h4 class="bg-primary p-2"><b>DATA PENDIDIKAN</b></h4>
<table class="table">
  <tr>
    <td><b>Jurusan S1</b></td>
    <td>: {{$profile->s1_jurusan}}</td>
  </tr>

   <tr>
    <td> <i class="fas fa-caret-right ml-3"></i> Tahun Selesai S1</td>
    <td>: {{$profile->tahun_selesai_s1}}</td>
  </tr>

  <tr>
    <td><b>Jurusan S2</b></td>
    <td>: {{$profile->s2_jurusan}}</td>
  </tr>

  <tr>
    <td> <i class="fas fa-caret-right ml-3"></i> Tahun Selesai S2</td>
    <td>: {{$profile->tahun_selesai_s2}}</td>
  </tr>


  <tr>
    <td><b>Jurusan S3</b></td>
    <td>: {{$profile->s3_jurusan}}</td>
  </tr>

  <tr>
    <td> <i class="fas fa-caret-right ml-3"></i> Tahun Selesai S3</td>
    <td>: {{$profile->tahun_selesai_s1}}</td>
  </tr>


</table>

<a href="/account/dosen/profile?page=pendidikan&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>