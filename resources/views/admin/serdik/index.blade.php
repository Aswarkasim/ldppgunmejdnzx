<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">

      
    <a href="{{$create}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    @include('admin/serdik/import')
    @include('admin/serdik/upload')


    <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/serdik" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>Nomor Seri</th>
      <th>Avalable</th>
      <th>Action</th>
    </tr>
  </thead>
{{-- @dd($serdik) --}}
  <tbody>
    @foreach ($serdik as $row)
        {{-- @dd($row->mahasiswa) --}}
    <tr>
      <td width="50px">{{$serdik->firstItem() + $loop->index}}</td>
      <td><a href="/account/serdik/{{$row->no_ukg}}"><b>{{isset($row->mahasiswa) ? $row->mahasiswa->namalengkap : ''}} <small>ID : {{$row->id}}</small> </b></a><br>
      <small>No. UKG: {{ $row->no_ukg }}</small>
      </td>
      <td>{{ $row->nomor_seri }}</td>
      <td>
        @if (file_exists('uploads/serdik/'.$row->nomor_seri.'.pdf'))
            <i class="fas fa-check text-success"></i> Ada
          @else
            <i class="fas fa-times text-danger"></i> Tidak Ada  
        @endif
      </td>
     <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/serdik/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                {{-- <form action="/account/serdik/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                <form action="/account/serdik/{{$row->id}}" method="post">
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
    {{$serdik->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


