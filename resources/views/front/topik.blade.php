@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>Saya Ingin Belajar</h1>
        </div>
        <div class="row" style="margin-top: -30px;">
            @foreach ($topik as $item)
                <div class="col-md-4">
                <a href="/materi/{{$item->id}}" style="text-decoration:none;">
                        <div class="box">
                            <div class="frame">
                                <img src="{{asset('storage/'.$item->icon)}} " alt="">
                            </div>
                            <h3>{{$item->nama_topik}} </h3>
                        </div>
                    </a>
                </div>                
            @endforeach



        </div>
    </div>
</section>
@endsection