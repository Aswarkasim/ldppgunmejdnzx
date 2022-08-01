<div class="row">
  <div class="col-md-12">

<div class="card">
  <div class="card-body">

  <div class="d-flex">
    {{-- <a href="{{$create}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tambah</a> --}}
    <a href="/account/penilaian/kelas" class="btn btn-primary mx-1"><i class="fas fa-arrow-left"></i> Kembali</a>
    @include('admin.penilaian.import_nilai') 

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
            <th>Status</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($kelas_peserta as $row)
              
          <tr>
            {{-- <td width="50px">{{$kelas_peserta->firstItem() + $loop->index}}</td> --}}
            <td width="50px">{{$loop->iteration}}</td>
          <td>
            <a href="/account/penilaian/show/{{$row->mahasiswa->id}}?kelas_id={{$row->kelas_id}}"><b>{{$row->no_ukg}} - {{$row->mahasiswa->namalengkap}}</b></a>
            {{-- <br>{{'Bidang Studi : '. $row->bidang_studi != null ? $row->bidang_studi->name : ''}} --}}
            <br> Bidang Studi : {{ $row->bidang_studi != null ? $row->bidang_studi->name : ''}}
          </td>
          <td>
             <select name="keaktifan{{$row->mahasiswa->id}}" value="{{$row->mahasiswa->nilai}}" onchange="updateStatusMahasiswa({{$row->mahasiswa->id}})" class="form-control">
              <option value="">--Nilai--</option>
              <option value="AKTIF" {{$row->mahasiswa->keaktifan == 'AKTIF' ? 'selected' : ''}}>AKTIF</option>
              <option value="NONAKTIF" {{$row->mahasiswa->keaktifan == 'NONAKTIF' ? 'selected' : ''}}>NONAKTIF</option>
              <option value="CUTI" {{$row->mahasiswa->keaktifan == 'CUTI' ? 'selected' : ''}}>CUTI</option>
              <option value="LULUS" {{$row->mahasiswa->keaktifan == 'LULUS' ? 'selected' : ''}}>LULUS</option>
              <option value="DO" {{$row->mahasiswa->keaktifan == 'DO' ? 'selected' : ''}}>DO</option>
              <option value="MUT" {{$row->mahasiswa->keaktifan == 'MUT' ? 'selected' : ''}}>MUT</option>
              <option value="KELUAR" {{$row->mahasiswa->keaktifan == 'KELUAR' ? 'selected' : ''}}>CUTI</option>
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

// function test(param){
//   console.log(param);
// }

function updateStatusMahasiswa(id){
  console.log('harga')
  var keaktifan = $("[name='keaktifan"+id+"']").val()
  
  $.ajax({
    method:'GET',
    url: '/account/penilaian/mahasiswa/keaktifan?id='+id+'&keaktifan='+keaktifan,
    dataType:'json',
    success: function(data){
      console.log(data)
    }
  });
}

</script>

