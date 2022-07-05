@switch(auth()->user()->role)
    @case('superadmin')
        @include('admin.dashboard.superadmin')
        @break
    @case('admin')
        @include('admin.dashboard.admin')
        @break
    @case('mahasiswa')
        @include('admin.dashboard.mahasiswa')
        @break
    @case('verificator')
        @include('admin.dashboard.admin')
        @break
    @default
        
@endswitch