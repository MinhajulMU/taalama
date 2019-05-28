<!-- Signup modal content -->
<div id="tambah-soal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h3 class=" text-center m-b-30 "><b>Tambah Soal</b> 
                </h3>

                <form id="tambah-soal" data-table-target="table-soal"  class="form-horizontal" action="{{route('admin.soal.store')}}" method="POST">
                <fieldset id="fieldset">
                    <div class="form-group m-b-25">
                        <div class="col-12" id="message">
                            
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="username">Nama Topik</label>
                            <select name="topik" id="" class="form-control">
                                @foreach ($topik as $item)
                                    <option value="{{$item->id}}">{{$item->nama_topik}} </option>                                    
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Soal</label>
                            <textarea name="soal" id="" cols="30" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-12">
                            <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Tambah</button>
                        </div>
                    </div>
                </fieldset>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->