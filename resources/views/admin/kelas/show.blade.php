{{-- {{request()->segment(3)}} --}}

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="/account/kelas" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
          @include('admin/kelas/add_peserta')
          @include('admin/kelas/import_peserta')
        

          <br>
         
          <p>Admin Kelas 

            @foreach ($admin as $item)
                {{ $item->user->name }},
            @endforeach
          </p>
        <table class="table table-hover mt-2">
          <tr>
            <th width="100px">No.</th>
            <th>NO UKG/Peg.ID</th>
            <th>Nama</th>
            <th>Status</th>
            <th width="200px">Action</th>
          </tr>

          @foreach ($kelas as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->no_ukg}}</td>
            {{-- <td>{{ isset($item->mahasiswa) ? $item->mahasiswa->namalengkap : ''}}</td> --}}
            @isset($item->mahasiswa)
                <td>
                  <b><a href="/account/kelas/detail/peserta/{{$item->mahasiswa->no_ukg}}?kelas_id={{$item->kelas_id}}" >{{$item->mahasiswa->namalengkap}}</b></a><br>
                  @if ($item->mahasiswa->pasfoto != null)
                  <small><a href="/account/kelas/download/foto?path={{$item->mahasiswa->pasfoto}}&no_ukg={{ $item->mahasiswa->no_ukg }}&namalengkap={{ $item->mahasiswa->namalengkap}}">Download Foto</a></small>
                  @else
                      <small>Foto tidak tersedia</small>
                  @endif
                </td>
            @else
            <td>Nama Kosong</td>
            @endisset
            
            @isset($item->mahasiswa)
            <td>
            <select name="keaktifan{{$item->mahasiswa->id}}" value="{{$item->mahasiswa->nilai}}" onchange="updateStatusMahasiswa({{$item->mahasiswa->id}})" class="form-control">
              <option value="">--Nilai--</option>
              <option value="AKTIF" {{$item->mahasiswa->keaktifan == 'AKTIF' ? 'selected' : ''}}>AKTIF</option>
              <option value="NONAKTIF" {{$item->mahasiswa->keaktifan == 'NONAKTIF' ? 'selected' : ''}}>NONAKTIF</option>
              <option value="CUTI" {{$item->mahasiswa->keaktifan == 'CUTI' ? 'selected' : ''}}>CUTI</option>
              <option value="LULUS" {{$item->mahasiswa->keaktifan == 'LULUS' ? 'selected' : ''}}>LULUS</option>
              <option value="DO" {{$item->mahasiswa->keaktifan == 'DO' ? 'selected' : ''}}>DO</option>
              <option value="MUT" {{$item->mahasiswa->keaktifan == 'MUT' ? 'selected' : ''}}>MUT</option>
              <option value="KELUAR" {{$item->mahasiswa->keaktifan == 'KELUAR' ? 'selected' : ''}}>CUTI</option>
            </select>
            @else
            <td>Nama Kosong</td>
            @endisset


            <td>
              <a href="/account/kelas/peserta/delete/{{$item->id}}"><i class="fas fa-sign-out-alt"></i> Keluarkan</a>
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
