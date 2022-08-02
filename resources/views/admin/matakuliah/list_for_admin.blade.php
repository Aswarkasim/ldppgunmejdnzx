<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">



  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/master/matakuliah" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Matakuliah</th>
      <th>Matakuliah</th>
    </tr>
  </thead>
{{-- @dd($matakuliah) --}}
  <tbody>
    @foreach ($matakuliah as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->kode}} </td>
      <td>{{$row->name}} </td>
    </tr>

    @endforeach

  </tbody>
</table>

</div>
</div>

  </div>
</div>

<!-- /.card-body -->


