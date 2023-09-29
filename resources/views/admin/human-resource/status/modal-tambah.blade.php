<div class="modal fade text-left" id="TambahModalStatus" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
                        <form action="{{ route('human-resource.status.tambah-status') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="status_code" name="status_code" value="">
{{--                                <label>Kode Status: </label>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="text" readonly id="status_code" name="status_code"--}}
{{--                                        class="form-control bg-transparent">--}}
{{--                                </div>--}}
                                <label>Nama Status: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Silahkan masukan nama Agent" id="status_name" name="status_name"
                                        class="form-control">
                                </div>
                                <label>Deskripsi Status: </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="status_description" id="status_description" cols="30"
                                        rows="3" placeholder="Silahkan masukan deskripsi agent"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                                        class="bx bx-save mt"></i> Update</button>
                            </div>
                        </form>


        </div>
    </div>
</div>
