<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <tr>
            <th width="100px">No</th>
            <th>Provinsi</th>
          </tr>
          @foreach ($verify as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="/account/verifikasi/list/province/{{$item->province_id}}"><b>{{$item->province->name}}</b></a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>