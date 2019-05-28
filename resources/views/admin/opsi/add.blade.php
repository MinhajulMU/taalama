<!-- Signup modal content -->
<div id="tambah-opsi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h3 class=" text-center m-b-30 "><b>Tambah Opsi</b> 
                </h3>

                <form id="tambah-opsi" data-table-target="table-opsi"  class="form-horizontal" action="{{route('admin.opsi.store')}}" method="POST">
                <fieldset id="fieldset">
                    <div class="form-group m-b-25">
                        <div class="col-12" id="message">
                            
                        </div>
                    </div>

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="username">Nama Soal</label>
                            <select name="soal" id="" class="form-control">
                                @foreach ($soal as $item)
                                    <option value="{{$item->id}} ">{{$item->title}} </option>                                    
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Opsi</label>
                            <textarea name="opsi" id="" cols="30" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Icon</label>
                            <input type="file" name="icon" required>
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress">Benar/Salah</label>
                             <div class="row">
                                 <div class="col-6">
                                    <input type="radio" name="is_true" id="" value="0" checked> Salah
                                 </div>
                                 <div class="col-6">
                                    <input type="radio" name="is_true" id=""  value="1"> Benar
                                 </div>
                             </div>
                             
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