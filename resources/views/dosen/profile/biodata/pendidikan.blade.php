<h4 class="bg-primary p-2"><b>DATA PENDIDIKAN</b></h4>
<table class="table">
  <tr>
    <td>Jurusan S1</td>
    <td>: {{$profile->s1_jurusan}}</td>
  </tr>

  <tr>
    <td>Jurusan S2</td>
    <td>: {{$profile->s2_jurusan}}</td>
  </tr>

  <tr>
    <td>Jurusan S3</td>
    <td>: {{$profile->s3_jurusan}}</td>
  </tr>

</table>

<a href="/account/profile?page=pendidikan&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>