@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul">
            <br>
            <h1>Nama-Nama Binatang</h1>
        </div>
       <div class="content" >
        <div class="frame" style="width: 100%;margin-top: -50px; padding: 10px;text-align: center;">
                <img src="asset/images/slide/3.png" alt="" style="width: 400px;">
        </div>
           
       </div>
    </div>

</section>
<section id="cek">
        <div class="wrap">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <a href="/topik">
                            <button class="btns">Kembali</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <a href="/question">
                            <button class="btns2">Lanjut</button>
                        </a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
        
    </section>
@endsection