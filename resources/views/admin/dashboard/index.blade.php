@extends('layouts.admin')
@section('title')
   Admin Dashboard | Taalama
@endsection
@section('breadcumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="breadcrumb-item"><a href="#">Taalama</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fi-box float-right"></i>
            <h6 class="text-muted text-uppercase mb-3">Users</h6>
            <h4 class="mb-3" data-plugin="counterup">{{$users}} </h4>
            {{-- <span class="badge badge-primary"> +11% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span> --}}
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fi-layers float-right"></i>
            <h6 class="text-muted text-uppercase mb-3">Topik</h6>
            <h4 class="mb-3"><span data-plugin="counterup">{{$topik}} </span></h4>
            {{-- <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span> --}}
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fi-tag float-right"></i>
            <h6 class="text-muted text-uppercase mb-3">Soal</h6>
            <h4 class="mb-3"><span data-plugin="counterup">{{$soal}} </span></h4>
            {{-- <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span> --}}
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fi-briefcase float-right"></i>
            <h6 class="text-muted text-uppercase mb-3">Track User</h6>
            <h4 class="mb-3" data-plugin="counterup">{{$track_user}} </h4>
 
        </div>
    </div>
</div>
<!-- end row -->


@endsection
@push('scripts')
        <script type="text/javascript">
            
        </script>
        @include("admin.script.form-modal-ajax")
@endpush