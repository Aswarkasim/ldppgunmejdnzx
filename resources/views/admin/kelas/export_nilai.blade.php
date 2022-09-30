<table>
  <thead>
    <tr>
            <td>NPM</td>
            <td>Nama Lengkap</td>
            <td>Bidanng Studi</td>
            <td>Kelas</td>
            <td>Nilai</td>

    </tr>
  </thead>

  <tbody>
    @foreach ($nilai as $item)
    <tr>
          <td>{{ $item->npm }}</td>
          <td>{{ $item->namalengkap_name }}</td>
          <td>{{ $item->bidangstudi_name }}</td>
          <td>{{ $item->kelas_name }}</td>
          <td>{{ $item->nilai }}</td>
    </tr>
    @endforeach
  </tbody>
</table>