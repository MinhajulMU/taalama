@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>Member Page </h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3><b>Identitas Diri</b></h3>
                <ul class="list-group">
                    <li class="list-group-item">{{Auth::user()->name}} </li>
                    <li class="list-group-item">{{Auth::user()->email}} </li>
                  </ul>
                
            </div>
            <div class="col-md-8">
                    <h3><b>Track Latihan</b></h3>
                    @if (count($track) == 0)
                            <h3 class="text-center font-weight-bold text-red" style="color:red;">Anda Belum Memiliki Track Pembelajaran</h3>
                        @endif
                    @foreach ($track as $item)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold">{{$item->topik['nama_topik']}} </h4>
                                <span class="card-text text-left">{{date('d-M-Y',strtotime($item->created_at))}}</span>
                                <span class="badge badge-primary badge-pill text-right" style="float:right;font-size: 17pt;margin-top: -30px;">{{$item->score}}</span>
                            </div>
                        </div>
                        <br>
                    @endforeach
                    {{$track->links()}}
            </div>
        </div>

    </div>
</section>

@endsection