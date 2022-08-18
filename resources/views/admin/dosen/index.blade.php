<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  {{-- <a href="{{$create}}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a> --}}

   <a href="/account/dosen/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>

  <a href="/account/dosen/export" class="btn btn-info"><i class="fa fa-upload"></i> Export</a>
  {{-- <a href="/account/dosen/export" target="_blank" class="btn btn-warning mb-3"><i class="fa fa-user-times"></i> Peseta yang belum Registrasi</a> --}}
  @include('/admin/dosen/import')

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
      <input type="text" name="cari" class="form-control" placeholder="Cari nama atau nomor nip">
      <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/dosen" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($dosen as $row)
        
    <tr>
      <td width="50px">{{$dosen->firstItem() + $loop->index}}</td>
      <td>{{$row->nip}} </td>
      <td><a href="/account/admin/dosen/detail/{{$row->id}}" target="blank"><b>{{$row->namalengkap}}</b></a></td>

      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/dosen/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                {{-- <form action="/account/dosen/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                <form action="/account/dosen/{{$row->id}}" method="post">
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
    {{$dosen->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->

{{-- make ajax to link index dosen  --}}

{{-- <script>

function index(id){
  console.log('harga')
  var harga = $("[name='harga"+id+"']").val()
  
  $.ajax({
    method:'GET',
    url: '/admin/survey/detail/update?id='+id+'&harga='+harga,
    dataType:'json',
    success: function(data){
      console.log(data)
    }
  });
}

</script> --}}

{{-- paginate ajax  --}}

