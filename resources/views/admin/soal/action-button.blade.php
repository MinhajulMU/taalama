<div class="button-list" data-id="{{$id}}" data-table-target="table-soal">
    <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" data-toggle="modal" data-target="#edit-user" onclick="return editDataUser(this);" ><i class="fa fa-wrench"></i></button>
    <button data-url="{{route('admin.soal.delete')}}" class="btn btn-icon waves-effect waves-light btn-danger" onclick="hapusData(this);"> <i class="fa fa-remove"></i> </button>
</div>