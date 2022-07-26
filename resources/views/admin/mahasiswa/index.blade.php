<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  {{-- <a href="{{$create}}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a> --}}

  @if (Request::is('account/mahasiswa/notregisted'))
   <a href="/account/mahasiswa/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  @endif

  <a href="/account/mahasiswa/export" class="btn btn-info"><i class="fa fa-upload"></i> Export</a>
  {{-- <a href="/account/mahasiswa/export" target="_blank" class="btn btn-warning mb-3"><i class="fa fa-user-times"></i> Peseta yang belum Registrasi</a> --}}
  @include('/admin/mahasiswa/import')

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama atau nomor ukg">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/account/mahasiswa" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>NO UKG</th>
      <th>NPM</th>
      <th>Nama</th>
      <th>Provinsi</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($mahasiswa as $row)
        
    <tr>
      <td width="50px">{{$mahasiswa->firstItem() + $loop->index}}</td>
      <td>{{$row->no_ukg}} </td>
      <td>{{$row->npm}} </td>
      <td>
        @if ($row->is_registered == 1)
        <a href="/account/mahasiswa/{{$row->id}}"><b>{{$row->namalengkap}}</b></a>
        @else
            {{$row->namalengkap}}
        @endif
         <br>
           @switch($row->status)
          @case('LENGKAPI')
              <i class="fas fa-edit text-danger"></i> Belum Lengkap
              @break
          @case('WAITING')
              <i class="fas fa-spinner text-info"></i> Menunggu
              @break
          @case('VALID')
               <i class="fas fa-check text-success"></i> Valid
              @break
          @case('INVALID')
               <i class="fas fa-times text-danger"></i> Tidak Valid
              @break
          @default
              
        @endswitch
      </td>
      <td>{{ isset($row->provinceBydomisili) ? $row->provinceBydomisili->name : ''}} </td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/account/mahasiswa/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                {{-- <form action="/account/mahasiswa/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus"> --}}
                <form action="/account/mahasiswa/{{$row->id}}" method="post">
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

{{-- make ajax to link index mahasiswa  --}}

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

