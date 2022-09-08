
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a href="/account/kelas" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="float-right">

          <form action="">
          <div class="input-group">
            <select name="matakuliah_id" class="form-control" id="">
              <option value="">-- Pilih Matakuliah --</option>
              @foreach ($matakuliah as $item)
              <option value="{{$item->id}}" {{$item->id == request('matakuliah_id') ? 'selected' : ''}}>{{$item->name}}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Lihat</button>
          </div>
        </form>
      </div>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>No</th>
              <th>NPM</th>
              <th>Nama</th>
              <td>Nilai Acuan</td>
              <td>Nilai Index</td>
            </tr>
            
            @foreach ($nilai as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->mahasiswa->npm}}</td>
              <td>{{$item->mahasiswa->namalengkap}}</td>
              <td>{{$item->nilai_acuan}}</td>
              <td>{{$item->nilai_index}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>