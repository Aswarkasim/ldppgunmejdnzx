<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
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
              <input type="number" name="nilai{{$item->id}}" value="{{$item->nilai}}" onchange="updateNilai({{$item->id}})" class="form-control">

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