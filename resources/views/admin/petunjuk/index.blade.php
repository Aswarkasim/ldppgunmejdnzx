<div class="row">
  <div class="col-md-12">

<div class="card">
  <div class="card-body">

  <div class="d-flex">
    <a href="{{$create}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tambah</a>
    {{-- @include('admin.petunjuk.copy')  --}}
  </div>

   <div class="float-right">
      <form action="" method="get">
          <div class="input-group input-group-sm">
            <input type="text" name="cari" class="form-control" placeholder="Cari..">
            <span class="input-group-append">
              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
              <a href="/account/petunjuk" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
            </span>
          </div>
        </form>
    </div>
 

    <table id="example1" class="table table-striped">
        <thead>
          <tr>
            <th width="100px">No</th>
            <th>Judul</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($petunjuk as $row)
              
          <tr>
            <td width="50px">{{$petunjuk->firstItem() + $loop->index}}</td>
            <td>{{$row->title}} </td>
            <td>
              <div class="btn-group">
                  <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                    <a class="dropdown-item" href="/account/petunjuk/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                      <div class="dropdown-divider"></div>
                      {{-- <form action="/account/petunjuk/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                      <form action="/account/petunjuk/{{$row->id}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" id="delete" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                      </form>
                  </div>
                </div>
            </td>
          </tr>

          @endforeach

        </tbody>
    </table>

  <div class="float-right">
    {{$petunjuk->links()}}
  </div>
</div>
</div>

  </div>
  </div>

<!-- /.card-body -->


