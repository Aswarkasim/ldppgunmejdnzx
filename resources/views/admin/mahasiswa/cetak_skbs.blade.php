<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cetak SKBS</title>
   <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.css">
</head>
<body>
   <style type="text/css">
    body {
            font-family: sans-serif;
            font-size: 20px;
        }

    @page {
      size: portrait;
      margin: 80px;
    }



    .kop-surat{
      font-family: serif;
      font-style: bold;
    }

    /* p{
      font-size: 24px;
    } */
  </style>
</head>

<body>
{{-- @dd($mahasiswa) --}}


  <div class="d-flex" style="">
    <img src="/img/unm_black.png" width="180px" height="180px" alt="">
    <div class="">
        <br>
      <h5><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</b></h5>
      <h4><b>UNIVERSITAS NEGERI MAKASSAR</b></h4>
      <h4><b>PROGRAM STUDI PENDIDIKAN PROFESI GURU</b></h4>
      <p style="font-size: 12px; font-style: italic">Jalan A. P. Pettarani  Makassar Gedung Pinisi UNM Wing C lantai 4,
        Telepon  0411 – 4091045,
        Laman : ppg.unm.ac.id</p>    
      </div>
    </div>
    
  {{-- <p>--------------------------------------------------------------------------------------------</p> --}}
  <img src="/img/line_kop.png" height="10px" alt="">

  <div class="text-center" style="font-family: serif">
    <p><h3><b><u>SURAT KETERANGAN</u></b></h3>
    <h5>Nomor:{{mt_rand($mahasiswa->periode->nomor_skbs_awal, $mahasiswa->periode->nomor_skbs_akhir) }}/UN36.26/LL/2022</h5>
  </p>
  </div>
<p>Yang bertanda tangan di bawah ini, Wakil Rektor Bidang Akademik Universitas Negeri Makassar menerangkan bahwa:</p>
<table class="table">

    <tr>
        <td>Nama</td>
        <td>: {{$mahasiswa->namalengkap}}</td>
      </tr>

    <tr>
      <td>No. UKG/ Peg.ID</td>
      <td>: {{$mahasiswa->no_ukg}}</td>
    </tr>

    <tr>
        <td>NPM</td>
        <td>: {{$mahasiswa->npm}}</td>
      </tr>

    <tr>
      <td>Bidang Studi PPG</td>
      <td>: {{$mahasiswa->bidang_studi->name}}</td>
    </tr>

    <tr>
      <td>Nama Instansi/Sekolah</td>
      <td>: {{$mahasiswa->nama_instansi}}</td>
    </tr>

    
  </table>
<p>Benar yang bersangkutan telah selesai  mengikuti tahapan Pendidikan Profesi Guru sebagai berikut :</p>
<ol>
    @foreach ($matakuliah as $item)
    <li>{{ $item->name }}</li>
    @endforeach
</ol>

<p>pada penyelenggaraan  Program Pendidikan Profesi Guru dalam Jabatan Tahun 2022 Kategori I (Satu) di Universitas Negeri Makassar dan dinyatakan <b>LULUS</b></p>
  <p>Demikian surat keterangan ini dikeluarkan untuk dipergunakan sebagaimana mestinya.</p>
  <img src="/img/stempel_unm.png" style="position: absolute; margin-left:300px; margin-top:20px" width="200px" alt="">

  <div class="ttd" style="margin-left: 400px">
    {{-- <p style="position: absolute; right: 12px;">Makassar, {{format_tanggal(date('Y-m-d'))}}</p> --}}
    <p>
        Makassar, {{format_tanggal(date('Y-m-d'))}} <br>
      Wakil Rektor Bidang Akademik <br>
      <img src="/img/ttd_hasnawi.png" width="300px" style="position: absolute" alt=""><br>
      <img src="/img/parafforwr1.png" style="width:40px;position: absolute; margin-top: 70px; margin-left: 310px" alt=""><br>

      <br>
      <b>Prof.Dr. H. Hasnawi Haris, M.Hum.</b><br>
          NIP. 196712311993031016 
    </p>

  </div>


  <script>
    window.print()
  </script>
</body>

</html>




{{-- 429-2800

KEMEN --}}



