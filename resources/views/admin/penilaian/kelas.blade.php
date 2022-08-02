<div class="row">
  <div class="col-md-12">

<div class="card">
  <div class="card-body">

  <div class="d-flex">
    {{-- <a href="{{$create}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tambah</a> --}}
    {{-- @include('admin.timeline.copy')  --}}
  </div>

   <div class="float-right">
      <form action="" method="get">
          <div class="input-group input-group-sm">
            <input type="text" name="cari" class="form-control" placeholder="Cari..">
            <span class="input-group-append">
              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
              <a href="/account/penilaian" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
            </span>
          </div>
        </form>
    </div>
 

    <table id="example1" class="table table-striped">
        <thead>
          <tr>
             <th>No</th>
            <th>Nama Kelas</th>
            {{-- <th>Jumlah SIs</th>
            <th>Action</th> --}}
          </tr>
        </thead>

        <tbody>
          @foreach ($adminKelas as $item)            
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="/account/penilaian/kelas/matakuliah/{{$item->kelas_id}}"><b>{{isset($item->kelas) ? $item->kelas->name : ''}}</b></a></td>
          </tr>
          @endforeach
        </tbody>

        
    </table>

  {{-- <div class="float-right">
    {{$mahasiswa->links()}}
  </div> --}}
</div>
</div>

  </div>
  </div>

<!-- /.card-body -->


