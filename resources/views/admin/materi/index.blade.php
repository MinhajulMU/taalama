@extends('layouts.admin')
@section('title')
    Materi | Taalama
@endsection
@section('breadcumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="breadcrumb-item"><a href="#">Taalama</a></li>
    <li class="breadcrumb-item active">Materi Pembelajaran</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0">Tambah Materi</h4>

            @include('admin.materi.add')
            {{-- @include('admin.user.edit-user') --}}


            <div class="button-list">
                <!-- Custom width modal -->
                <button type="button" class="btn btn-info waves-light waves-effect w-md" data-toggle="modal" data-target="#tambah-materi" data-table="#table-materi"><i class="mdi mdi-library-plus"></i> Tambah Materi</button>
            </div>
        </div>
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Materi Pembelajaran</b></h4>
            <p class="text-muted font-14 m-b-30">
            
            </p>

            <table id="table-materi" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Topik</th>
                    <th>Judul</th>
                    <th>content</th>
                    <th>Aksi</th>                                            
                </tr>
                </thead>


                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<!-- end row -->


@endsection
@push('scripts')
        <script type="text/javascript">
            
            function editDataUser(trigerer){
                    var tabel = $(trigerer).parent().data('table-target');
                    var modal = $(trigerer).data('target');
                    var tr =$(trigerer).parent().parent().parent();
                    data = $("table#"+tabel).DataTable().row(tr).data();
                    var form = modal+" form ";
                    var role = JSON.parse(data.role_id);
                    $(form+"input#name").val(data.name);
                    $(form+"input#email").val(data.email);
                    $(form+" input[type=checkbox]").prop("checked",false);
                    role.forEach(role_id => {
                        $(form+" input#role_"+role_id).prop("checked",true);
                    });
                    $(form+"input#id").val(data.id);
                }

            $(document).ready(function() {
                $("#table-materi").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.materi.index') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'nama_topik', name: 'nama_topik'},
                        {data:'title',name :'title'},
                        {data:'content',name: 'content'},
                        {data:'aksi',name: 'aksi',searchable:false,orderable: false}                        
                    ]
                });
            } );

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var replaceTitle = [/`/g,/\!/g,/\"/g,/\'/g,/\#/g,/\*/g];
                $("form#tambah-materi input#title").on('keyup',function(ev){
                    var text = $(this).val();
                    text = filterTitle(text);
                    $("form#tambah-materi input#slug").val(text);
                });

                $("form#tambah-materi input#slug").on('keyup',function(ev){
                    var text = $(this).val();
                    text = filterTitle(text);
                    $("form#tambah-materi input#slug").val(text);
                });

                $("form#edit-materi input#slug").on('keyup',function(ev){
                    var text = $(this).val();
                    text = filterTitle(text);
                    $("form#edit-materi input#slug").val(text);
                });

                function filterTitle(text){
                    text = text.replace(/\s/g,"-");
                    replaceTitle.forEach(element => {
                        text = text.replace(element,'');
                    });
                    text = text.toLowerCase();
                    return text;
                }

                var tinymce_config = {
                        path_absolute : "/",
                        selector: "textarea#elm1",
                        theme: "modern",
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ],
                        relative_urls: false,
                        file_browser_callback : function(field_name, url, type, win) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                                var cmsURL = "/" + 'laravel-filemanager?field_name=' + field_name;
                                if (type == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }

                                tinyMCE.activeEditor.windowManager.open({
                                    file : cmsURL,
                                    title : 'Filemanager',
                                    width : x * 0.8,
                                    height : y * 0.8,
                                    resizable : "yes",
                                    close_previous : "no"
                                });
                        }
                    };
                //if($("#elm1").length > 0){
                    tinymce.init(tinymce_config);
                //}
                //if($("#elm2").length > 0){
                    tinymce_config.selector ="textarea#elm2";
                    tinymce.init(tinymce_config);
                //}
                
                
            });
        </script>
        @include("admin.script.form-modal-ajax")
@endpush