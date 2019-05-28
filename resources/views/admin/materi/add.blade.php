<div class="modal fade bs-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" id="tambah-materi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Materi</h5>
            </div>
            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                </h2>
                
                <form id="tambah-materi" class="form-horizontal" data-table-target="table-materi" action="{{route('admin.materi.store')}}"  method="POST" enctype="multipart/form-data">
                    <div class="form-group m-b-25">
                        <div class="col-12" id="message">
                            
                        </div>
                    </div>
                    <fieldset>
                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="judul">Judul</label>
                                <input class="form-control" type="text" id="title" required="" name="title" placeholder="title">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="primary-content">
                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="username">Konten </label>
                                <textarea id="elm1" name="content" id="content"></textarea>
                            </div>
                        </div>                
                    </fieldset>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="excerpt">Nama Topik</label>
                            <select name="topik" id="" class="form-control">
                                @foreach ($topik as $item)
                                    <option value="{{$item->id}}">{{$item->nama_topik}}</option>                                    
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="excerpt">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                            <small class="text-muted">
                                *don't change if you were not understand
                            </small>
                        </div>
                    </div>
                   
                    
                    <fieldset>
                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-12">
                                <button class="btn w-lg btn-rounded btn-success waves-effect waves-light" type="submit">Tambah</button>
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