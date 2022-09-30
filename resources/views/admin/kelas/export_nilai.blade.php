<table>
  <thead>
    <tr>
            <td>NPM</td>
            <td>Nama Lengkap</td>
            <td>Bidanng Studi</td>
            <td>Kelas</td>
            <td>Nilai ACUAN</td>
            <td>Nilai INDEX</td>
            <td>Nilai MUTU</td>

    </tr>
  </thead>

  <tbody>
    @foreach ($nilai as $item)
    <tr>
          <td>{{ $item->npm }}</td>
          <td>{{ $item->namalengkap_name }}</td>
          <td>{{ $item->bidangstudi_name }}</td>
          <td>{{ $item->kelas_name }}</td>
          <td>{{ $item->nilai_acuan }}</td>
          <td>{{ $item->nilai_index }}</td>
          <td>{{ $item->nilai_mutu }}</td>
    </tr>
    @endforeach
  </tbody>
</table>