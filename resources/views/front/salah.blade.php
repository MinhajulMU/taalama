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
                    <div class="box1 active">

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
<section id="cek" class="salah">
    <div class="wrap">
        <div class="row">
            <div class="col-md-6">
                <div class="aaa">
                    <div class="row">
                        <div class="col-3" style="text-align:center;">
                            <img src="asset/images/icon/cancel.png" alt="">
                        </div>
                        <div class="col-9">
                            <h2 style="color:#c10121;padding:0; margin:0;"><b>Kamu Salah</b></h2>
                            <h2 style="color: #fff;padding:0; margin:0;">Jawaban yang Benar Adalah: <b>Angsa</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <a href="/selesai">
                        <button class="btns2">Lanjutkan</button>
                    </a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    
</section>
@endsection