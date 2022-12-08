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
      <td>: {{mt_rand($surat->nomor_surat_awal, $surat->nomor_surat_akhir) }}/UN36.26/LL/{{date('Y')}}	</td>
    </tr>

    <tr>
      <td>Lampiran</td>
      <td>: -</td>
    </tr>

    <tr>
      <td>Perihal</td>
      <td>: {{$surat->perihal}}</td>
    </tr>
  </table>

  <br>
  <strong>
    Yth. <br>
    Kepala Sekolah/Madrasah {{isset($ppi) ? $ppi->sekolah_lokasi : ''}}<br>
    {{ isset($ppi) ? $ppi->alamat : 'Tempat'}}  <br>
    di {{ isset($ppi) ? $ppi->kabupaten_name : 'Tempat'}}
  </strong>

  <br>
  <p>
    {!! $surat->body !!}
  </p>

  <table style="margin-left: 100px">
    <tr>
      <td width="300px">Nomor Induk Mahasiswa</td>
      <td>: {{ isset($ppi) ? $ppi->mahasiswa->npm : ''}}</td>
    </tr>

     <tr>
      <td>Nama Mahasiswa</td>
      <td>: {{ isset($ppi) ? $ppi->namalengkap : ''}}</td>
    </tr>

     <tr>
      <td>Bidang Studi</td>
      <td>: {{ isset($ppi) ? $ppi->mahasiswa->bidang_studi->name : ''}}</td>
    </tr>

     <tr>
      <td>Lokasi PPI</td>
      <td>: {{  isset($ppi) ? $ppi->sekolah_lokasi : ''}}

     <tr>
      <td>Asal Sekolah</td>
      <td>: {{ isset($ppi) ? $ppi->mahasiswa->nama_instansi : ''}}</td>
    </tr>
  </table>

  <p>Demikian penyampaian kami, atas perhatian dan kerja sama Bapak/Ibu diucapkan terima kasih.</p>
  <img src="/img/stempel_unm.png" style="position: absolute; margin-left:300px; margin-top:20px" width="200px" alt="">

  <div class="ttd" style="margin-left: 400px">
    <p>
      {{ $surat->jabatan_ttd }} <br>
      <img src="/{{ $surat->ttd }}" width="300px" style="position: absolute" alt=""><br>
      <img src="/{{ $surat->paraf }}" style="width:40px;position: absolute; margin-top: 70px; margin-left: 310px" alt=""><br>

      <br>
      <b>{{ $surat->nama_ttd }}</b><br>
          NIP. {{ $surat->nip }} 
    </p>

  </div>

  <p>Tembusan kepada yang Terhormat:</p>
  
  @if (isset($ppi))
      
    @if (isset($mahasiswa))
        
      @if ($ppi->mahasiswa->kementerian == 'KEMENDIKBUD')
      {!! $surat->tembusan_kemendikbud !!}
    
      @else
      {!! $surat->tembusan_kemenang !!}
    @else 
    {!! $surat->tembusan_kemendikbud !!}
    @endif

  @endif
  
  @endif
  <script>
    window.print()
  </script>
</body>

</html>




{{-- 429-2800

KEMEN --}}



