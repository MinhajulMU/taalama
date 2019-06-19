@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>Leaderboard</h1>
            <div class="row">
                    @foreach ($score as $item)
                    <div class="col-md-6">
                        <div class="card" style="margin-bottom:10px;">
                            <div class="card-body">
                                <h4 class="card-title"><b>{{$item->nama_lengkap}}</b></h4>
                                <span class="badge badge-primary">{{$item->jumlah_score}}</span> 
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

        </div>
    
    </div>
</section>

@endsection