@extends('layouts.admin')
@section('title')
   Opsi Soal | Taalama
@endsection
@section('breadcumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="breadcrumb-item"><a href="#">Taalama</a></li>
    <li class="breadcrumb-item active">Opsi Soal Pembelajaran</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0">Tambah Opsi Soal</h4>

            @include('admin.opsi.add')
            {{-- @include('admin.user.edit-user') --}}


            <div class="button-list">
                <!-- Custom width modal -->
                <button type="button" class="btn btn-info waves-light waves-effect w-md" data-toggle="modal" data-target="#tambah-opsi" data-table="#tabel-opsi"><i class="mdi mdi-library-plus"></i> Tambah Opsi Soal</button>
            </div>
        </div>
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Opsi Soal Taalama</b></h4>
            <p class="text-muted font-14 m-b-30">
            
            </p>

            <table id="table-opsi" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Soal</th>
                    <th>Opsi</th>
                    <th>Icon</th>
                    <th>Benar/Salah</th>
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
                $("#table-opsi").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.opsi.index') !!}',
                    order:[0,'desc'],
                    columns:[
                        {data:'id', name: 'id'},
                        {data:'soal', name: 'soal'},
                        {data:'title',name :'title'},
                        {data:'icon',name: 'icon',searchable:false,orderable: false},
                        {data:'is_true',name :'is_true'},
                        {data:'aksi',name: 'aksi',searchable:false,orderable: false}                        
                    ]
                });
            } );

        </script>
        @include("admin.script.form-modal-ajax")
@endpush