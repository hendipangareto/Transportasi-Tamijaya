<div class="modal fade text-left" id="TambahKategori" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Kategori Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>ID Kategori Aset : </label>
                    <div class="form-group">
                        <input type="text" id="agent_code" name="akun_code"
                               class="form-control bg-transparent" placeholder="Kategori Aset">
                    </div>
                    <label>Nama Tipe Aset : </label>
                    <div class="form-group">
                        <input type="text" id="nama_akun" name="nama_akun"
                               class="form-control bg-transparent" placeholder="Tipe Aset">
                    </div>
                    <label>Nama Kategori Aset: </label>
                    <div class="form-group">
                        <input type="text" id="nama_akun" name="nama_akun"
                               class="form-control bg-transparent" placeholder="Nama Kategori Aset">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="agent_description"
                                  id="agent_description" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
