<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="/account/penilaian/kelas/mahasiswa/{{request('kelas_id')}}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <table class="table table-hover">
          <tr>
            <th width="100px">No.</th>
            <th>Matakuliah</th>
            <th width="200px">Nilai</th>
          </tr>

          @foreach ($nilai as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->matakuliah->name}}</td>
            <td>
              {{-- <input type="number" name="nilai{{$item->id}}" value="{{$item->nilai}}" onchange="updateNilai({{$item->id}})" class="form-control"> --}}

              <select name="nilai{{$item->id}}" value="{{$item->nilai}}" onchange="updateNilai({{$item->id}})" class="form-control">
              <option value="">--Nilai--</option>
              <option value="A" {{$item->nilai == 'A' ? 'selected' : ''}}>A</option>
              <option value="A-" {{$item->nilai == 'A-' ? 'selected' : ''}}>A-</option>
              <option value="B+" {{$item->nilai == 'B+' ? 'selected' : ''}}>B+</option>
              <option value="B" {{$item->nilai == 'B' ? 'selected' : ''}}>B</option>
              <option value="B-" {{$item->nilai == 'B-' ? 'selected' : ''}}>B-</option>
              <option value="C+" {{$item->nilai == 'C+' ? 'selected' : ''}}>C+</option>
              <option value="C" {{$item->nilai == 'C' ? 'selected' : ''}}>C</option>
              <option value="C-" {{$item->nilai == 'C-' ? 'selected' : ''}}>C-</option>
              <option value="D+" {{$item->nilai == 'D+' ? 'selected' : ''}}>D+</option>
              <option value="D" {{$item->nilai == 'D' ? 'selected' : ''}}>D</option>
              <option value="D-" {{$item->nilai == 'D-' ? 'selected' : ''}}>D-</option>
              <option value="E" {{$item->nilai == 'E' ? 'selected' : ''}}>E</option>
            </select>

              {{-- <input type="number" id="update-harga{{$row->id}}" name="harga{{$row->id}}" value="{{$row->harga}}" class="form-control" onchange="updateHarga({{$row->id}})"> --}}

            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>


{{-- <input type="number" onchange="updateNilai(1)" name="" id=""> --}}

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