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
        <div class="row options" style="margin-top :-30px;">
                
        </div>
    </div>
</section>
<section id="cek">
    <div class="wrap">
        <div class="row">
            <div class="col-md-6">
                <div id="prev-question">
                    <a href="#">
                        <button class="btns">Previous</button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div id="next-question">
                    <a href="#">
                        <button class="btns2">Next</button>
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
           var lembar_soal = JSON.parse(`{!! $question !!}`);
            if(localStorage.getItem('soal_current_number') == null){
                localStorage.setItem('soal_current_number',0);
            }
            let current_number = parseInt(localStorage.getItem('soal_current_number'));
            let pilgan_names = ['A','B','C','D'];

            function loadSoal(){
                 console.log(current_number,lembar_soal.length - 1);
                if(current_number == 0){
                    //current_number = 0;
                    $("#next-question").removeClass('invisible');
                    $("#prev-question").addClass('invisible');
                    console.log('a');
                }else if(current_number == lembar_soal.length - 1){
                    //current_number = lembar_soal.soal.length - 1;
                    $("#prev-question").removeClass('invisible');
                    $("#next-question").addClass('invisible');
                    console.log('b');
                }else{
                    $("#prev-question").removeClass('invisible');
                    $("#next-question").removeClass('invisible');
                }
                let soal = lembar_soal[current_number];
                let jawaban = soal.option;
                //console.log(soal.option);
                


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
                
                $("#saya .judul h1").html(soal['title']);
                // if(jawaban !== null){
                    
                //     jawab(parseInt(jawaban));
                //     console.log(parseInt(jawaban));
                //     console.log('jawab');
                // }
            }

            function init(){
                var html = "";
                let flag = false;
                for(let i=0;i<lembar_soal.length;i++){
                    if(!flag){
                        if(lembar_soal.soal[i].jawaban == null){
                            current_number = i;
                            flag = true;
                        }
                    }
                    // html+=(`<button class="btn `+(lembar_soal.soal[i].jawaban !== null ? 'btn-success' : 'btn-secondary') +` btn-pilgan" id="btn-pilgan-`+i+`" type="button" onclick="pilihSoal(`+i+`)">
                    //         <span>`+(i + 1)+`</span>
                    //         <span class="pilgan">`+(lembar_soal.soal[i].jawaban !== null ? pilgan_names[lembar_soal.soal[i].jawaban] : '')+`</span>
                    //     </button>`);
                }
                
                // $("#number-btn-container").html(html);
                // pilihSoal(current_number);
            }

            function jawab(id_jawaban,id_soal){
                // let a = lembar_soal.soal[id_soal];
                if (lembar_soal[id_soal].option[id_jawaban]['is_true'] == 1) {
                    Swal({
                        title: 'Jawaban Anda Benar!',
                        text: 'Selamat Jawaban Anda Benar',
                        type: 'success',
                        confirmButtonText: 'Ok'
                        }).then(function(){
                            if (current_number != lembar_soal.length - 1) {
                                pilihSoal(current_number+1);                                
                            }

                        })
                    console.log('benar');
                }else{
                    Swal({
                        title: 'Jawaban Anda Salah!',
                        text: 'Jawaban ',
                        type: 'error',
                        confirmButtonText: 'Ok'
                        }).then(function(){
                            if (current_number != lembar_soal.length - 1) {
                                pilihSoal(current_number+1);                                
                            }
                        })

                    console.log('salah');
                }
                $('.box1').removeClass('active');
                $('.option'+id_jawaban).addClass('active');
                
                
                $("#pilgan li").removeClass('active');
                $("#pilgan #pilgan-"+id_jawaban).addClass('active');
                $("#btn-pilgan-"+current_number).addClass('btn-success');
                $("#btn-pilgan-"+current_number+" span.pilgan").html(pilgan_names[id_jawaban]);
            }

            function pilihSoal(soal_ke){
                current_number = parseInt(soal_ke);
                loadSoal();
            }

            $(document).ready(function(event){
//                init();
//                console.log(lembar_soal);
                loadSoal();
//                let soal = lembar_soal;
                $("#next-question").click(function(){
                    pilihSoal(current_number+1);
                });

                $("#prev-question").click(function(){
                    pilihSoal(current_number-1);
                });
            });
    </script>
@endpush