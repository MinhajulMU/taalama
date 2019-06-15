@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>Pelajaran Selesai </h1>
        </div>
    <div class="circle" >
        <span>skor</span>
        <span style="font-size: 350%;display: block;">{{$nilai['score']}}</span>
    </div>
    <div class="text-center">
        <h3><b>{{$topik}}</b></h3>
    </div>
    <div class="text-center">
        <a href="/topik">
            <button class="btns" style="background-color: #f78616;color:#fff;">Main Lagi</button>
        </a>
        <a href="#">
            <button class="btns">History Nilai</button>
        </a>
    </div>
    </div>
</section>

@endsection