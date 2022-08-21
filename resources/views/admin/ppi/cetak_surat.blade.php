<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cetak Surat PPI</title>
   <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.css">
</head>
<body>
   <style type="text/css">
    body {
            font-family: serif;
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


  <div class="d-flex" style="margin-left: 70px">
    <img src="/img/unm_black.png" width="180px" height="180px" alt="">
    <div class="text-center kop-surat">
      <h4><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, <br> RISET, DAN TEKNOLOGI</b></h4>
      <h4><b>UNIVERSITAS NEGERI MAKASSAR</b></h4>
      <h4><b>PROGRAM STUDI PENDIDIKAN PROFESI GURU</b></h4>
      <p style="font-size: 12px; font-style: italic">Jalan A. P. Pettarani  Makassar Gedung Pinisi UNM Wing C lantai 4,
        Telepon  0411 – 4091045,
        Laman : ppg.unm.ac.id</p>    
      </div>
    </div>
    
  {{-- <p>--------------------------------------------------------------------------------------------</p> --}}
  <img src="/img/line_kop.png" height="10px" alt="">

  <p style="position: absolute; right: 12px;">Makassar, {{format_tanggal(date('Y-m-d'))}}</p>

  <table class="">
    <tr>
      <td width="200px">Nomor</td>
      <td>: {{$ppi->nomor_surat}}/UN36.26/LL/{{date('Y')}}	</td>
    </tr>

    <tr>
      <td>Lampiran</td>
      <td>: -</td>
    </tr>

    <tr>
      <td>Perihal</td>
      <td>: {{'Pelaksanaan PPI '.$ppi->periode->name. ' '.$ppi->periode->jenisPpg->name.' Tahun '.$ppi->periode->tahun}}</td>
    </tr>
  </table>

  <br>
  <strong>
    Yth. <br>
    Kepala Sekolah/Madrasah {{$ppi->sekolah_lokasi}}<br>
    {{$ppi->alamat}}  <br>
    di {{ $ppi->kabupaten_name}}
  </strong>

  <br>
  <p>
    Dengan hormat, berdasarkan surat Direktur Pendidikan Profesi, Pembinaan Guru dan Tenaga Kependidikan Nomor 1541/B2/GT 00.03/2022, tanggal 01 Juli 2022 tentang Jadwal Pelaksanaan Pendidikan Profesi Guru (PPG) bagi Guru dalam Jabatan Kategori I tahun 2022, maka kami sampaikan kepada Bapak/Ibu dapat memberikan izin kepada Mahasiswa PPG di bawah ini untuk Praktik Pembelajaran Inovatif (PPI) dari tanggal 25 Agustus 2022 s.d 22 September 2022.
  </p>

  <table style="margin-left: 100px">
    <tr>
      <td width="300px">Nomor Induk Mahasiswa</td>
      <td>: {{$ppi->mahasiswa->npm}}</td>
    </tr>

     <tr>
      <td>Nama Mahasiswa</td>
      <td>: {{$ppi->namalengkap}}</td>
    </tr>

     <tr>
      <td>Bidang Studi</td>
      <td>: {{$ppi->mahasiswa->bidang_studi->name}}</td>
    </tr>

     <tr>
      <td>Lokasi PPI</td>
      <td>: {{ $ppi->sekolah_lokasi}}

     <tr>
      <td>Asal Sekolah</td>
      <td>: {{$ppi->mahasiswa->nama_instansi}}</td>
    </tr>
  </table>

  <p>Demikian penyampaian kami, atas perhatian dan kerja sama Bapak/Ibu diucapkan terima kasih.</p>
  <img src="/img/stempel_unm.png" style="position: absolute; margin-left:300px; margin-top:20px" width="200px" alt="">

  <div class="ttd" style="margin-left: 400px">
    <p>
      Wakil Rektor <br>
      Bidang Akademik <br>
      <img src="/img/ttd_hasnawi.png" width="300px" style="position: absolute" alt=""><br>
      <img src="/img/parafforwr1.png" style="width:40px;position: absolute; margin-top: 70px; margin-left: 310px" alt=""><br>

      <br>
      <b>Prof.Dr. H. Hasnawi Haris, M.Hum.</b><br>
          NIP. 196712311993031016 
    </p>

  </div>

  <p>Tembusan kepada yang Terhormat:</p>
  <ol>
    <li>Rektor Universitas Negeri Makassar (sebagai laporan)</li>
    <li>Wakil Rektor Bidang Pengembangan dan Kerjasama UNM</li>
    <li>Para Kepala Dinas Pendidikan Provinsi Lokasi PPI</li>
    <li>Para Kepala Kantor Wilayah Kementerian Agama Provinsi Lokasi PPI</li>
    <li>Para Kepala Dinas Pendidikan Kabupaten/Kota Lokasi PPI</li>
    <li>Para Kepala Kantor Kementerian Agama Kabupaten/Kota Lokasi PPI</li>
    <li>Pertinggal</li>
  </ol>

  <script>
    window.print()
  </script>
</body>

</html>




{{-- 429-2800

KEMEN --}}



