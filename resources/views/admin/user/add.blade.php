<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('account/user/create'))
          <form action="/account/user" method="POST">  
        @else
          <form action="/account/user/{{$user->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <input type="hidden" name="role" value="{{request('role')}}">
           <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control  @error('no_ukg') is-invalid @enderror"  name="no_ukg"  value="{{isset($user) ? $user->no_ukg : old('no_ukg')}}" placeholder="ID">
             @error('no_ukg')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($user) ? $user->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{isset($user) ? $user->email : old('email')}}"   placeholder="example@example.com">
             @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          @if (request('role') == 'verificator')
              
           <div class="form-group">
                <label for="">Bidang Studi</label>
                <select name="bidang_studi_id" class="form-control @error('bidang_studi_id') is-invalid @enderror" >
                  <option value="">-- Bidang Studi --</option>
                  @foreach ($bidangstudi as $item)
                      <option value="{{$item->id}}"
                        <?php 
                          if(isset($user)){
                            if($user->bidang_studi_id == $item->id){
                              echo 'selected';
                            }
                          }
                          ?>
                        >{{$item->name}}</option>
                  @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

          @endif
          

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password">
             @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Konfirmasi Password</label>
            <input type="password" class="form-control @error('re_password') is-invalid @enderror"  name="re_password" placeholder="Konfirmasi Password">
             @error('re_password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <a href="/account/user" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

