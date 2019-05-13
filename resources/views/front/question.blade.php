@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>'Iwazzatun' dalam bahasa Indonesia Adalah ... </h1>
        </div>
        <div class="row" style="margin-top :-30px;">
            <div class="col-md-4">
                <a href="/benar" class="aa">
                    <div class="box1">

                        <div class="frame">
                            <img src="asset/images/icon/goose.png" alt="">
                        </div>
                        <h3><b>Angsa</b></h3>

                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/salah" class="aa">
                    <div class="box1">

                        <div class="frame">
                            <img src="asset/images/icon/pork.png" alt="">
                        </div>
                        <h3><b>Babi</b></h3>

                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/salah" class="aa">
                    <div class="box1">

                        <div class="frame">
                            <img src="asset/images/icon/dog.png" alt="">
                        </div>
                        <h3><b>Anjing</b></h3>

                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="cek">
    <div class="wrap">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <a href="/question">
                        <button class="btns">Lewati</button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <a href="/salah">
                        <button class="btns2">Periksa</button>
                    </a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    
</section>
@endsection