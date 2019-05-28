<!-- Signup modal content -->
<div id="tambah-topik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h3 class=" text-center m-b-30 "><b>Tambah Topik</b> 
                </h3>

                <form id="tambah-topik" data-table-target="table-topik"  class="form-horizontal" action="{{route('admin.topik.store')}}" method="POST">
                <fieldset id="fieldset">
                    <div class="form-group m-b-25">
                        <div class="col-12" id="message">
                            
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="username">Nama Topik</label>
                            <input class="form-control" name="nama_topik" type="text" id="name" required="" placeholder="Nama Topik">
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Icon</label>
                            <input type="file" name="icon" id="" class="form-control">
                         </div>
                    </div>



                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="3" class="form-control" required></textarea>
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