<table>
  <thead>
    <tr>
      <td>No</td>
      <td>NO_UKG/Peg.ID.</td>
      <td>Username</td>
      <td>Email</td>
      <td>No Hp/WA</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($user as $row)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$row->no_ukg}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->nohp}}</td>
    </tr>
    @endforeach
  </tbody>
</table>