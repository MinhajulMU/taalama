@extends('layouts.index')
@section('title')
    Ta'alama
@endsection
@section('content')
<section id="saya">
    <div class="wrap">
        <div class="judul"> 
            <br>
            <h1>'Iwazzatun' dalam bahasa Indonesia Adalah ...</h1>
        </div>
        <div class="row options" style="margin-top :-30px;">
                
        </div>
    </div>
</section>
<section id="cek">
    <div class="wrap">
        <div class="row">
            <div class="col-md-6">
                {{-- <div id="prev-question">
                    <a href="#">
                        <button class="btns">Previous</button>
                    </a>
                </di v> --}}
                <div id="count-soal" style="font-size:200%;font-weight:bold;color:#999;">
                    
                </div>
            </div>
            <div class="col-md-6">
                <div id="next-question">
                    <a href="#">
                        <button class="btns2">Next </button>
                    </a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    
</section>
@endsection
@push('scripts')
    <script>
            var skor = 0;
            var topik_id = window.location.pathname.split('/')[2];
            var lembar_soal = JSON.parse(`{!! $question !!}`);
            if(localStorage.getItem('soal_current_number') == null){
                localStorage.setItem('soal_current_number',0);
            }
            let current_number = parseInt(localStorage.getItem('soal_current_number'));

            function loadSoal(){
                console.log(current_number,lembar_soal.length - 1);
                let soal = lembar_soal[current_number];
                let jawaban = soal.option;           
                //load question
                $("#saya .judul h1").html(soal['title']);
                $(".options").html('');
                let i = 0;
                jawaban.slice(-3).forEach(function(value){
                    $('.options').append(`<div class="col-md-4">
                        <a href="#" class="aa" onclick="jawab(`+i+`,`+current_number+`)">
                            <div class="box1 option`+i+`">

                                <div class="frame">
                                    <img src="storage/`+value['icon']+`" alt="">
                                </div>
                                <h3><b>`+value['title']+`</b></h3>
                            </div>
                        </a>
                    </div>
                    `);
                        i++;
                });
                
                $('#count-soal').html('<span style="color: orange;font-size:200%;">'+ (current_number+1) +'</span> / '+lembar_soal.length+'');
                
            }
            function send_result() {
                let nilai = (skor/lembar_soal.length)*100;

                $.ajax({
                        type: "POST",
                        url: 'http://localhost:8000/ujian/submit',
                        data: {
                            user_id: {{Auth::user()->id}},
                            nilai: nilai,
                            topik_id: topik_id
                        },
                        method: 'post',
                        success: function (response) {
                            console.log(response.id);
                            window.location.href = "http://localhost:8000/nilai/"+response.id;
                        },
                        error: function(error){
                            console.log(error);
                        }
                });                
            }
            

            function jawab(id_jawaban,id_soal){


                if (lembar_soal[id_soal].option[id_jawaban]['is_true'] == 1) {
                    skor = skor+1;   
                    Swal({
                        title: 'Jawaban Anda Benar!',
                        text: 'Selamat Jawaban Anda Benar',
                        type: 'success',
                        confirmButtonText: 'Ok'
                        }).then(function(){
                            if (current_number+1 == lembar_soal.length) {
                                send_result();
                            }else{
                                pilihSoal(current_number+1);
                            }                            

                        })

                }else{
                    let options = lembar_soal[id_soal].option;
                    let benar = '';
                    options.forEach(element => {
                        if (element['is_true'] == 1) {
                            benar = element['title'];
                        }
                    });
                    Swal({
                        title: 'Jawaban Anda Salah!',
                        html: 'Jawaban yang benar adalah <b style="color:green;">'+benar+'</b>',
                        type: 'error',
                        confirmButtonText: 'Ok'
                        }).then(function(){
                            if (current_number+1 == lembar_soal.length) {
                                send_result();
                            }else{
                                pilihSoal(current_number+1);
                            }
                        })


                }
                $('.box1').removeClass('active');
                $('.option'+id_jawaban).addClass('active');
                console.log('skor '+skor);                
                
            }

            function pilihSoal(soal_ke){
                current_number = parseInt(soal_ke);
                loadSoal();
            }

            $(document).ready(function(event){
                loadSoal();
                $("#next-question").click(function(){
                    //pilihSoal(current_number+1);
                    let options = lembar_soal[current_number].option;
                    let benar = '';
                    options.forEach(element => {
                        if (element['is_true'] == 1) {
                            benar = element['title'];
                        }
                    });
                    Swal({
                        title: 'Jawaban Anda Salah!',
                        html: 'Jawaban yang benar adalah <b style="color:green;">'+benar+'</b>',
                        type: 'error',
                        confirmButtonText: 'Ok'
                        }).then(function(){
                            if (current_number+1 == lembar_soal.length) {
                                send_result();
                            }else{
                                pilihSoal(current_number+1);
                            }
                        })

                    console.log('skor '+skor);
                });

                // $("#prev-question").click(function(){
                //     pilihSoal(current_number-1);
                // });
            });
    </script>
@endpush