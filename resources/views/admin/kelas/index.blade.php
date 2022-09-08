<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
@php
    $role = auth()->user()->role;

    if($role == 'superadmin'){
      $link_nilai = '/account/kelas/show/nilai/';
    }else if($role == 'verificator'){
      $link_nilai = '/account/verificator/kelas/show/nilai/';
    }
@endphp
  @if ($role == 'superadmin')
      
    <a href="{{$create}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    @include('admin/kelas/import')
  
  @endif
  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/kelas" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Kelas</th>
      <th>Jumlah Mahasiswa</th>
      <th>NIilai</th>
      <th>Action</th>
    </tr>
  </thead>
{{-- @dd($kelas) --}}
  <tbody>
    @foreach ($kelas as $row)
        {{-- @dd($row->mahasiswa) --}}
    <tr>
      <td width="50px">{{$kelas->firstItem() + $loop->index}}</td>
      <td><a href="/account/kelas/{{$row->id}}"><b>{{$row->name}} <small>ID : {{$row->id}}</small> </b></a></td>
      <td>{{count($row->kelaspeserta)}}</td>
      <td><a href="{{$link_nilai.$row->id}}"><b><i class="fas fa-circle"></i> Lihat Nilai</b></a></td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/kelas/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                {{-- <form action="/account/kelas/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                <form action="/account/kelas/{{$row->id}}" method="post">
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
    {{$kelas->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


