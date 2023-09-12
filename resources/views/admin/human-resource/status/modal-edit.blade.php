<div class="modal fade text-left" id="EditModalStatus" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action=" " id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Status: </label>
                    <div class="form-group">
                        <input type="text" readonly id="agent_code" name="agent_code"
                               class="form-control bg-transparent">
                    </div>
                    <label>Nama Status: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Agent" id="agent_name" name="agent_name"
                               class="form-control">
                    </div>
                    <label>Deskripsi Status: </label>
                    <div class="form-group">
                                    <textarea class="form-control" name="agent_description" id="agent_description" cols="30"
                                              rows="3" placeholder="Silahkan masukan deskripsi agent"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1" onclick="manageData('update')"><i
                            class="bx bx-save mt"></i> Update</button>
                </div>
            </form>


        </div>
    </div>
</div>
