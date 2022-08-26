
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="/account/kelas/{{request('kelas_id')}}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <table class="table">
            <tr>
              <td>No</td>
              <td>Matakuliah</td>
              <td>Nilai Acuan</td>
              <td>Nilai Index</td>
              <td>Nilai Mutu</td>
            </tr>
            
            @foreach ($nilai as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->matakuliah->name}}</td>
              <td>{{$item->nilai_acuan}}</td>
              <td>{{$item->nilai_index}}</td>
              <td>{{$item->nilai_mutu}}</td>
            </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div>
</div>