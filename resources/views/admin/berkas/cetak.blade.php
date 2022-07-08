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
      margin: 90px;
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
{{-- @dd($mahasiswa) --}}


  <div class="d-flex" style="margin-left: 200px">
    <img src="/img/unm_pentagon.png" width="100px" height="100px" alt="">
    <div class="text-center">
      <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
      <h4>UNIVERSITAS NEGERI MAKASSAR (UNM)</h4>
      <p>PROGRAM STUDI PENDIDIKAN PROFESI GURU</p>
      <p style="font-size: 8px; font-style: italic">Jalan A. P. Pettarani  Makassar Gedung Pinisi UNM Wing C lantai 4,
        Telepon  0411 – 4091045,
        Laman : ppg.unm.ac.id</p>    
      </div>
    </div>
    
  {{-- <p>--------------------------------------------------------------------------------------------</p> --}}
  <img src="/img/line_kop.png" height="10px" alt="">

  <div class="text-center">
    <p><b>BUKTI LAPOR DIRI <br>
    PENDIDIKAN PROFESI GURU DALAM JABATAN <br>
    UNIVERSITAS NEGERI MAKASSAR</b></p>
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
      <td>: {{$mahasiswa->bidang_studi->name}}</td>
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
      <td>: {{$mahasiswa->kabupatenByDomisili->name}}</td>
    </tr>

    <tr>
      <td>Provinsi</td>
      <td>: {{$mahasiswa->provinceByDomisili->name}}</td>
    </tr>

    
  </table>

  <p>Yang bersangkutan Mahasiswa Universitas Negeri Makassar dengan Nomor Pokok Mahasiswa <b><span style="color: red">{{$mahasiswa->npm}}</b></span> {{$mahasiswa->periode->jenisPpg->name}} {{$mahasiswa->periode->tahun}} <b>{{$mahasiswa->periode->name}}</b></p>

    <p style="position: absolute; right: 12px;">Makassar, {{format_tanggal(date('Y-m-d'))}}</p>

  <div class="d-flex mt-5">
    <div style="margin-left: 400px">
      <img src="/{{$mahasiswa->pasfoto}}" width="200px" alt="">
    </div>

    <table class="table">
          <tr>
      <td class="float-right">
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
</div>
      
  <script>
    window.print()
  </script>
</body>

</html>