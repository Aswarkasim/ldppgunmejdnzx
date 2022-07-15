<h4 class="bg-primary p-2"><b>Berkas</b></h4>
<table class="table">
  <thead>
    <tr>
      <td>No</td>
      <td>Nama Berkas</td>
      <td>Status</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($berkas as $item)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item->kelengkapan->name}}</td>
      <td>
        @if ($item->berkas != null)
        <span class="badge badge-success">Dikirim</span>
        @else
        <span class="badge badge-secondary">Belum Dikirim</span>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>