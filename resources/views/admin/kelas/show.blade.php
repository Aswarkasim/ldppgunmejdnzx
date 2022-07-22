{{-- {{request()->segment(3)}} --}}

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="/account/kelas" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
          @include('admin/kelas/add_peserta')
          @include('admin/kelas/import_peserta')
        <table class="table table-hover mt-2">
          <tr>
            <th width="100px">No.</th>
            <th>NO UKG/Peg.ID</th>
            <th>Nama</th>
            <th width="200px">Action</th>
          </tr>

          @foreach ($kelas as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->no_ukg}}</td>
            <td>{{$item->mahasiswa->namalengkap}}</td>
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
