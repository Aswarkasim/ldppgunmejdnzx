<table>
  <thead>
    <tr>
      <td>NIDN</td>
      <td>Nomor Serdos</td>
      <td>Nama Lengkap</td>
      <td>NPWP</td>
      <td>Pangkat/Golongan</td>
      <td>Alamat Rumah</td>
      <td>No Hp</td>
      <td>Nomor Rekening</td>
      <td>Nama Bank</td>
      <td>Nama Pemilik Rekening</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($dosen as $item)
    <tr>
      <td>{{$item->nip}}</td>
      <td>{{$item->nomor_serdos}}</td>
      <td>{{$item->namalengkap}}</td>
      <td>{{$item->npwp}}</td>
      <td>{{$item->pangkat_golongan}}</td>
      <td>{{$item->alamat_rumah}}</td>
      <td>{{$item->nohp}}</td>
      <td>{{$item->nomor_rekening}}</td>
      <td>{{$item->nama_bank}}</td>
      <td>{{$item->nama_pemilik}}</td>
    </tr>
    @endforeach
  </tbody>
</table>