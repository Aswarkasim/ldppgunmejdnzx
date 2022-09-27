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



    .kop-surat{
      font-family: serif;
      font-style: bold;
    }
  </style>
</head>

<body>
{{-- @dd($mahasiswa) --}}


  <div class="d-flex" style="margin-left: 0px">
    <img src="/img/unm_black.png" width="180px" height="180px" alt="">
    <div class="text-center kop-surat">
      <h1><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</b></h1>
      <h1><b>UNIVERSITAS NEGERI MAKASSAR</b></h1>
      <h4><b>PROGRAM STUDI PENDIDIKAN PROFESI GURU</b></h4>
      <p style="font-size: 12px; font-style: italic">Jalan A. P. Pettarani  Makassar Gedung Pinisi UNM Wing C lantai 4,
        Telepon  0411 – 4091045,
        Laman : ppg.unm.ac.id</p>    
      </div>
    </div>
    
  {{-- <p>--------------------------------------------------------------------------------------------</p> --}}
  <img src="/img/line_kop.png" height="10px" alt="">

  @if ($jenis_ppg == 'DALJAB')
      
  <div class="text-center" style="font-family: serif">
    <h3><b>BUKTI LAPOR DIRI <br>
      PENDIDIKAN PROFESI GURU DALAM JABATAN <br>
      UNIVERSITAS NEGERI MAKASSAR</b></h3>
    </div>
  @else  
  <div class="text-center" style="font-family: serif">
    <h3><b>BUKTI LAPOR DIRI <br>
      PENDIDIKAN PROFESI GURU PRAJABATAN <br>
      UNIVERSITAS NEGERI MAKASSAR</b></h3>
    </div>

  @endif
  <table class="table">
    <tr>
      <td>No. UKG/ Peg.ID/PTK.ID</td>
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

    @if ($jenis_ppg == 'DALJAB')
    <tr>
      <td>Nama Instansi/Sekolah</td>
      <td>: {{$mahasiswa->nama_instansi}}</td>
    </tr>

    <tr>
      <td>NPSN</td>
      <td>: {{$mahasiswa->npsn_sekolah}}</td>
    </tr>

    @endif

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

  <p>Yang bersangkutan Mahasiswa Universitas Negeri Makassar dengan Nomor Pokok Mahasiswa <b><span style="color: red">{{$mahasiswa->npm}}</b></span> {{$mahasiswa->periode->jenisPpg->name}} Tahun {{$mahasiswa->periode->tahun}} <b>{{$mahasiswa->periode->name}}</b></p>

    <p style="position: absolute; right: 12px;">Makassar, {{format_tanggal(date('Y-m-d'))}}</p>

        <img src="/img/stempel_unm.png" style="position: absolute; margin-left:550px; margin-top:60px" width="200px" alt="">


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
        Pendidikan Profesi Guru <br>
        <img src="/img/ttd_darmawang.png" alt=""><br>
        {{-- <div class="space" style="position: relative">
          <br><br><br><br><br><br><br>
        </div> --}}
        Dr. Ir. Darmawang, M.Kes. <br>
        NIP. 19620707 199103 1 002
      </td>
    </tr>
  </table>
</div>
      
  <script>
    window.print()
  </script>
</body>

</html>