<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cetak Bukti Lapor Diri</title>
   <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.css">
</head>
<body>
   <style type="text/css">
    /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

    @page {
      size: portrait;
      margin-left: 50px;
      margin-right:50px;
      margin-top: 50px;
      margin-bottom: 50px;
    }



    /* h2 {
            position: absolute;
            left: 410px;
            top: 320px;
        }

        p {
            position: absolute;
            left: 220px;
            top: 380px;
            width: 600px
        } */
  </style>
</head>

<body>


  <div class="d-flex">
    <img src="/img/unm_pentagon.png" width="150px" height="150px" alt="">
    <div class="text-center">
      <h5>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h5>
      <h5>UNIVERSITAS NEGERI MAKASSAR (UNM)</h5>
      <p>PROGRAM STUDI PENDIDIKAN PROFESI GURU</p>
      <p>Jalan A. P. Pettarani  Makassar  Gedung Pinisi UNM Wing C lantai 4. <br>
        Telepon  0411 – 4091045 <br> 
        Laman : ppg.unm.ac.id</p>    
    </div>
  </div>

  <hr height="30px" style="height: 5px; color: #000">

  <div class="text-center">
    <h3>BUKTI LAPOR DIRI</h3>
    <h4>PENDIDIKAN PROFESI GURU DALAM JABATAN </h4>
    <h4>UNIVERSITAS NEGERI MAKASSAR</h4>
  </div>

  <table class="table">
    <tr>
      <td>No. UKG/ Peg.ID</td>
      <td>: {{$mahasiswa->no_ukg}}</td>
    </tr>

    <tr>
      <td>Nama Mahasiswa PPG</td>
      <td>: {{$mahasiswa->namalengkap}}</td>
    </tr>

    <tr>
      <td>Bidang Studi PPG</td>
      <td>: {{$mahasiswa->bidang_studi->namalengkap}}</td>
    </tr>

    <tr>
      <td>Nama Instansi/Sekolah</td>
      <td>: {{$mahasiswa->nama_instansi}}</td>
    </tr>

    <tr>
      <td>NPSN</td>
      <td>: {{$mahasiswa->npsn}}</td>
    </tr>

    <tr>
      <td>Jenis Kelamin</td>
      <td>: {{$mahasiswa->jenis_kelamin}}</td>
    </tr>

    <tr>
      <td>Alamat</td>
      <td>: {{$mahasiswa->alamat_domisili}}</td>
    </tr>

    <tr>
      <td>Kabupaten</td>
      <td>: {{$mahasiswa->kabupaten->name}}</td>
    </tr>

    <tr>
      <td>Provinsi</td>
      <td>: {{$mahasiswa->province->name}}</td>
    </tr>

    
  </table>

  <p>Yang bersangkutan Mahasiswa Universitas Negeri Makassar dengan Nomor Induk Mahasiswa 1629041001 Program Studi Pendidikan Profesi Guru dalam Jabatan Tahun 2022 Periode 1</p>

  <div class="pull-right">
    <p class="pull-right">Makassar, 23 Juli 2022</p>
  </div>
  <table>
    <td colspan="2"></td>
    <tr class="pull-right">
    </tr>
    <tr>
      <td>
        <img src="/img/bg.jpg" width="200px" alt="">
      </td>
      <td>
        Ketua Program Studi <br>
        Pendidikan Profesi GUru
        <br><br><br><br>
        Dr. Ir. Darmawang, M.Kes. <br>
        NIP. 123123123123
      </td>
    </tr>
  </table>
      
  <script>
    // window.print()
  </script>
</body>

</html>