<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-calendar"></i> {{$provider_dashboard->periode}}
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      @foreach ($periode as $item)
      <a class="dropdown-item" href="/account/dashboard/config/periode/{{$item->id}}">{{$item->name}}</a>
      @endforeach
    </div>
  </div>
</div>

<div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Berkas</span>
            <span class="info-box-number">
              10
              <small>%</small>
            </span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

    </div>

@include('admin.dashboard.register_setting')

