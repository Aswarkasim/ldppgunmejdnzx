<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
       <div class="row">
        <div class="col-md-6">
           <table class="table">
          <tr>
            <td>ID</td>
            <td>: {{$user->no_ukg}}</td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>: {{$user->name}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>: {{$user->email}}</td>
          </tr>
          <tr>
            <td>No. Hp/Wa</td>
            <td>: {{$user->nohp}}</td>
          </tr>
        </table>
        </div>


        @if (request('role') == 'verificator')
            
        <div class="col-md-6">
          @include('admin.user.province_modal')
          {{-- <a href="">Tambah Provinsi</a> --}}

            <br>
            <table class="table">
              <tr>
                <td>No</td>
                <td>Provinsi</td>
                <td>#</td>
              </tr>
              @foreach ($verifyRole as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->province->name}}</td>
                    <td>
                      <a href="/account/user/delete/province/{{$item->id}}"><i class="fas fa-times"></i></a>
                    </td>
                  </tr>
              @endforeach
            </table>

        </div>
        @endif

      @if (request('role') == 'admin')
            
        <div class="col-md-6">
          @include('admin.user.kelas_modal')
          {{-- <a href="">Tambah Provinsi</a> --}}

            <br>
            <table class="table">
              <tr>
                <td>No</td>
                <td>Provinsi</td>
                <td>#</td>
              </tr>
              @foreach ($adminkelasrole as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->kelas->name}}</td>
                    <td>
                      <a href="/account/user/kelas/delete/{{$item->id}}"><i class="fas fa-times"></i></a>
                    </td>
                  </tr>
              @endforeach
            </table>

        </div>
        @endif

       </div>
      </div>
    </div>
  </div>
  
</div>