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
              <a href="/account/penilaian/matakuliah/mahasiswa/sinkronkan/{{$matakuliah_id}}?kelas_id={{$kelas_id}}" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i> Sinkronasi</a>
            </span>
          </div>
        </form>
    </div>
 

    <p class="text-info my-2"><i class="fas fa-info"></i> Tekan Sinkronasi jika Nilai index tidak sinkron</p>
    <table id="example1" class="table table-striped">
        <thead>
          <tr>
             <th>No</th>
            <th>NO UKG</th>
            <th>Nama</th>
            <th>Matakuliah</th>
            <th>Nilai Acuan</th>
            <th>Nilai Index</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($nilai as $row)
          <tr>
          
          <td width="50px">{{$loop->iteration}}</td>
          <td> {{$row->no_ukg}} -</td>
          
          {{-- <td width="50px">{{$kelas_peserta->firstItem() + $loop->index}}</td> --}}
          <td>
            {{isset($row->mahasiswa) ? $row->mahasiswa->namalengkap : 'Data Kosong'}}
          </td>
          <td>{{$row->matakuliah->name}}</td>
          
          
          @isset($row->mahasiswa)
          <td>
             <input type="number" name="nilai_acuan{{$row->id}}" value="{{$row->nilai_acuan}}" onchange="updateNilai({{$row->id}})" class="form-control">
          </td>
          @else
          <td>Data Kosong</td>
          @endisset 
          <td>{{$row->nilai_index}}</td>

         
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
  var nilai_acuan = $("[name='nilai_acuan"+id+"']").val()
  
  $.ajax({
    method:'GET',
    url: '/account/penilaian/nilai/update?id='+id+'&nilai_acuan='+nilai_acuan,
    dataType:'json',
    success: function(data){
      console.log(data)
    }
  });
}

</script>
