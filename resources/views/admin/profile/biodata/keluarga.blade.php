<h4 class="bg-primary p-2"><b>DATA KELUARGA</b></h4>
<table class="table">


  @if ($jenis_ppg != 'PRAJAB')

  <tr class="bg-secondary">
    <td>Nama Pasangan (Suami/Istri)</td>
    <td>: {{$profile->nama_pasangan}}</td>
  </tr>
  <tr>
    <td>Pendidikan Pasangan</td>
    <td>: {{$profile->pendidikan_pasangan}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Pasangan</td>
    <td>: {{$profile->pekerjaan_pasangan}}</td>
  </tr>
  <tr>
    <td>Jumlah Anak</td>
    <td>: {{$profile->jumlah_anak}}</td>
  </tr>
  @endif
  <tr class="bg-secondary">
    <td><b>Nama Ayah Kandung</b></td>
    <td>: {{$profile->nama_ayah_kandung}}</td>
  </tr>
  <tr>
    <td>Pendidikan Ayah Kandung</td>
    <td>: {{$profile->pendidikan_ayah_kandung}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ayah Kandung</td>
    <td>: {{$profile->pekerjaan_ayah_kandung}}</td>
  </tr>
  {{-- <tr>
    <td>Penghasilan Ayah Kandung</td>
    <td>: {{$profile->penghasilan_ayah_kandung}}</td>
  </tr> --}}
  <tr>
    <td>NIK Ayah Kandung</td>
    <td>: {{$profile->nik_ayah_kandung}}</td>
  </tr>

  <tr class="bg-secondary">
    <td><b>Nama Ibu Kandung</b></td>
    <td>: {{$profile->nama_ibu_kandung}}</td>
  </tr>
  <tr>
    <td>Pendidikan Ibu Kandung</td>
    <td>: {{$profile->pendidikan_ibu_kandung}}</td>
  </tr>
  <tr>
    <td>Pekerjaan Ibu Kandung</td>
    <td>: {{$profile->pekerjaan_ibu_kandung}}</td>
  </tr>
  {{-- <tr>
    <td>Penghasilan Ibu Kandung</td>
    <td>: {{$profile->penghasilan_ibu_kandung}}</td>
  </tr> --}}
  <tr>
    <td>NIK Ibu Kandung</td>
    <td>: {{$profile->nik_ibu_kandung}}</td>
  </tr>

  <tr class="bg-secondary">
    <td>No. HP Orangtua/Keluarga Dekat</td>
    <td>: {{$profile->nohp_keluarga_dekat}}</td>
  </tr>
   <tr>
    <td>Alamat Orangtua/Keluarga Dekat</td>
    <td>: {{$profile->alamat_orangtua}}</td>
  </tr>
   <tr>
    <td>Provinsi Orangtua/Keluarga Dekat</td>
    <td>: {{ isset($profile->provinceByOrangtua) ? $profile->provinceByOrangtua->name : ''}}</td>
  </tr>
   <tr>
    <td>Kabupaten Orangtua/Keluarga Dekat</td>
    <td>: {{ isset($profile->kabupatenByOrangtua) ? $profile->kabupatenByOrangtua->name : ''}}</td>
  </tr>
  
</table>

<a href="/account/profile?page=keluarga&action=edit" class="btn btn-primary mb-4 ">
  <i class="fas fa-edit"></i> Edit
</a>

