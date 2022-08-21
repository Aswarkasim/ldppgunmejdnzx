<table>
  <thead>
    <tr>
      <td>NUPTK</td>
      <td>Nomor Serdik</td>
      <td>Nama Lengkap</td>
      <td>NPWP</td>
      <td>Pangkat/Golongan</td>
      <td>Nama Sekolah</td>
      <td>Alamat Rumah</td>
      <td>No Hp</td>
      <td>Nomor Rekening</td>
      <td>Nama Bank</td>
      <td>Nama Pemilik Rekening</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($pamong as $item)
    <tr>
      <td>{{$item->nuptk}}</td>
      <td>{{$item->nomor_serdik}}</td>
      <td>{{$item->namalengkap}}</td>
      <td>{{$item->npwp}}</td>
      <td>{{$item->pangkat_golongan}}</td>
      <td>{{$item->nama_sekolah}}</td>
      <td>{{$item->alamat_rumah}}</td>
      <td>{{$item->nohp}}</td>
      <td>{{$item->nomor_rekening}}</td>
      <td>{{$item->nama_bank}}</td>
      <td>{{$item->nama_pemilik}}</td>
    </tr>
    @endforeach
  </tbody>
</table>