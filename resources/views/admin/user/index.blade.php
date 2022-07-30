{{-- @dd($user) --}}
<div class="card">
<div class="card-body">

  @if (request('role')== 'mahasiswa')
  <a href="/account/user/export" class="btn btn-success mb-3"><i class="fa fa-upload"></i> Export</a>
  @endif

  @if (request('role') != null)
  <a href="/account/user/create?role={{request('role')}}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>
  @endif

  
  @if (request('role')== 'verificator')
    @include('admin.user.periode_modal')
  @endif

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="hidden" name="role" value="{{request('role')}}" class="form-control" placeholder="Cari..">
        <input type="text" name="cari" class="form-control" placeholder="Cari username atau nomor UKG">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/user" class="btn btn-info btn-flat tombol-hapus"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      {!!request('role') == 'verificator' ? '<th>Jumah Verifikasi Mahasiwa</th>' : ''!!}
      {!!request('role') == 'admin' ? '<th>Jumlah Kelas</th>' : ''!!}
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($user as $row)
        
    <tr>
      <td width="50px">{{$user->firstItem() + $loop->index}}</td>
      <td><a href="/account/user/{{$row->id}}?role={{request('role')}}"><b>{{$row->name}}</b></a> <br> {{ 'ID : '.$row->no_ukg}} </td>
    <?php if(request('role') == 'verificator'){
      $history = \App\Models\VerifyHistory::wherePeriodeId($periode_id)->where('verificator_id',$row->id)->count();
    } ?>
      {!!request('role') == 'verificator' ? '<td>'.$history.'</td>' : ''!!}
      <td>{{$row->role}}</td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/user/{{$row->id}}/edit?role={{request('role')}}"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                {{-- <form action="/account/user/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                <form action="/account/user/{{$row->id}}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
          </div>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

  <div class="float-right">
    {{$user->links()}}
  </div>
</div>
</div>
<!-- /.card-body -->


