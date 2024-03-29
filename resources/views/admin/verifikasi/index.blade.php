<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  {{-- <a href="{{$create}}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a> --}}

  <a href="/account/verifikasi" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/berkas" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Provinsi</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($mahasiswa as $row)
        
    <tr>
      <td width="50px">{{$mahasiswa->firstItem() + $loop->index}}</td>
      <td>
        <a href="/account/verifikasi/show/{{$row->user_id}}"><b>{{$row->no_ukg}} - {{$row->namalengkap}}</b></a>
        {{-- <br>{{'Bidang Studi : '. $row->bidang_studi != null ? $row->bidang_studi->name : ''}} --}}
        <br> Bidang Studi : {{ $row->bidang_studi != null ? $row->bidang_studi->name : ''}}
      </td>
      <td>{{isset($row->provinceBydomisili) ? $row->provinceBydomisili->name : ''}} </td>
      {{-- @dd($row->user) --}}
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/berkas/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                <form action="/account/berkas/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus">
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
    {{$mahasiswa->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->




