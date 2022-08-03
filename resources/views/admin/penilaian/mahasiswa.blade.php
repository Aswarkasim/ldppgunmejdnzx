<div class="row">
  <div class="col-md-12">

<div class="card">
  <div class="card-body">

  <div class="d-flex">
    {{-- <a href="{{$create}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tambah</a> --}}
    <a href="/account/penilaian/kelas/matakuliah/{{request('kelas_id')}}" class="btn btn-primary mx-1"><i class="fas fa-arrow-left"></i> Kembali</a>
    {{-- @include('admin.penilaian.import_nilai')  --}}

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
            <th>Nama</th>
            <th>Matakuliah</th>
            <th>Angka</th>
            <th>Nilai</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($nilai as $row)
              
          <tr>
            {{-- <td width="50px">{{$kelas_peserta->firstItem() + $loop->index}}</td> --}}
            <td width="50px">{{$loop->iteration}}</td>
          <td>
            {{$row->no_ukg}} - {{$row->mahasiswa->namalengkap}}
          </td>
          <td>{{$row->matakuliah->name}}</td>
          <td>{{$row->angka}}</td>
          <td>
            <select name="nilai{{$row->id}}" value="{{$row->nilai}}" onchange="updateNilai({{$row->id}})" class="form-control">
              <option value="">--Nilai--</option>
              <option value="A" {{$row->nilai == 'A' ? 'selected' : ''}}>A</option>
              <option value="A-" {{$row->nilai == 'A-' ? 'selected' : ''}}>A-</option>
              <option value="B+" {{$row->nilai == 'B+' ? 'selected' : ''}}>B+</option>
              <option value="B" {{$row->nilai == 'B' ? 'selected' : ''}}>B</option>
              <option value="B-" {{$row->nilai == 'B-' ? 'selected' : ''}}>B-</option>
              <option value="C+" {{$row->nilai == 'C+' ? 'selected' : ''}}>C+</option>
              <option value="C" {{$row->nilai == 'C' ? 'selected' : ''}}>C</option>
              <option value="C-" {{$row->nilai == 'C-' ? 'selected' : ''}}>C-</option>
              <option value="D" {{$row->nilai == 'D' ? 'selected' : ''}}>D</option>
              <option value="E" {{$row->nilai == 'E' ? 'selected' : ''}}>E</option>
              <option value="K" {{$row->nilai == 'K' ? 'selected' : ''}}>K</option>
            </select>
          </td>
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
<script>

function test(param){
  console.log(param);
}

function updateNilai(id){
  console.log('harga')
  var nilai = $("[name='nilai"+id+"']").val()
  
  $.ajax({
    method:'GET',
    url: '/account/penilaian/nilai/update?id='+id+'&nilai='+nilai,
    dataType:'json',
    success: function(data){
      console.log(data)
    }
  });
}

</script>
