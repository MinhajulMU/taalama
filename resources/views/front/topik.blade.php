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
            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/quran.png" alt="">
                        </div>
                        <h3>Huruf Hijaiyah</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/cat.png" alt="">
                        </div>
                        <h3>Nama-Nama Binatang</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/allah-word.png" alt="">
                        </div>
                        <h3>Asmaul Husna</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/family.png" alt="">
                        </div>
                        <h3>Nama Anggota Keluarga</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/pencil-case.png" alt="">
                        </div>
                        <h3>Peralatan Sekolah</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/question">
                    <div class="box">
                        <div class="frame">
                            <img src="asset/images/icon/acupuncture.png" alt="">
                        </div>
                        <h3>Nama Anggota Tubuh</h3>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
@endsection