<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">

  <a href="/account/verifikasi/list/province/{{$mahasiswa->provinsi_tempat_tinggal}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>

  <a href="/account/verifikasi/biodata/{{$user_id}}" class="btn btn-info"><i class="fas fa-user"></i> Lihat Biodata</a>

  {{-- @if (!$cek_history) --}}
  @if ($mahasiswa->status == 'WAITING')
      
  <a href="/account/verifikasi/all/{{$user_id}}" class="btn btn-success verifikasi-all"><i class="fas fa-check-circle"></i> Validasi Semua</a>
  
  @endif

        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
              @foreach ($berkas as $row)
                  
              <tr>
                <td width="50px">{{$loop->iteration}}</td>
                <td>
                  {{$row->kelengkapan->name}}
                  <br> <small> Diperbaharui pada {{$row->updated_at}} </small>
                </td>
                <td width="150px">
                  @switch($row->status)
                      @case('KOSONG')
                          <button class="btn btn-warning btn-sm">
                              <i class="fas fa-exclamation-triangle mx-2"></i> 
                            </button>
                          @break
                      @case('PENDING')
                          <button class="btn btn-info btn-sm">
                              <i class="fas fa-spinner mx-2"></i> 
                            </button>
                          @break
                      @case('VALID')
                          <button class="btn btn-success btn-sm">
                              <i class="fas fa-check mx-2"></i> 
                            </button>
                          @break
                        @case('INVALID')
                          <button class="btn btn-danger btn-sm">
                              <i class="fas fa-times mx-2"></i> 
                            </button>
                          @break
                      @default
                          
                  @endswitch
                  
                  <a href="{{$link_route.$row->user_id.'?berkas_id='.$row->id}}" class="btn btn-primary btn-sm"><i class="fas fa-sign-out-alt"></i></a>
                </td>
              </tr>

              @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>


  <div class="col-md-7">

    
    <div class="card">
      <div class="card-body">
        <div class="pb-1">
          {{-- <form action="{{$link_route.$row->user_id}}" method="POST">
          @method('PUT')

          <select name="" id="" class="form-control">
            <option value="">VALID</option>
            <option value="">INVALID</option>
          </select>

          </form> --}}
         
        </div>  
        
          @if ($berkas_data)
            @if ($berkas_data->berkas)
            <div class="mb-1">
              <a href="/account/verifikasi/validasi/{{$berkas_data->user_id.'?berkas_id='.$berkas_data->id}}" class="btn btn-success btn-sm px-4"><i class="fas fa-check"></i> Valid</a>
              @include('/admin/verifikasi/invalid')
              {{-- <a href="/account/verifikasi/validasi/{{$berkas_data->user_id.'?berkas_id='.$berkas_data->id.'&status=INVALID'}}" class="btn btn-danger btn-sm px-4"><i class="fas fa-check"></i> Tidak Valid</a> --}}
            </div>
              
              <embed src="/{{$berkas_data->path.$berkas_data->berkas}}" type="application/pdf" width="100%" height="600px">
            @else
                <span class="alert alert-info">
                  <i class="fas fa-info"></i> Berkas kosong
                </span>
            @endif
          @else
            <span class="alert alert-info">
              <i class="fas fa-info"></i> Klik salah satu kelengkapan berkas
            </span>
          @endif
        </div>
      </div>
    </div>
</div>



<!-- /.card-body -->


