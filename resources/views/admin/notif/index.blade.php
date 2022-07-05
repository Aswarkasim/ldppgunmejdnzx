<div class="row">
  <div class="col-12">

<div class="card">
<div class="card-body">

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/notif" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>

  <table id="example1" class="table table-striped">
    <thead>
      <tr>
        <th width="50px">#</th>
        <th width="50px">#</th>
        <th>#</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($notif as $row)
          

      <tr>
        <td width="50px">{{$loop->iteration}}</td>
        <th>
          <i class="fas {{$row->type == 'VALID' ? 'fa-check text-success' : 'fa-times text-danger'}}"></i>
        </th>
        <td><b>{{$row->title}}</b> <br> {{$row->message}}</td>
      </tr>

      @endforeach

    </tbody>
  </table>

  <div class="float-right">
    {{$notif->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


