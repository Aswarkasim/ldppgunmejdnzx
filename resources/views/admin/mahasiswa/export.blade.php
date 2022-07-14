<table>
  <thead>
    <tr>
      <td>Nama</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($mahasiswa as $item)
    <tr>
      <td>{{$item->namalengkap}}</td>
    </tr>
    @endforeach
  </tbody>
</table>