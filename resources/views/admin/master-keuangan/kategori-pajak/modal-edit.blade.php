<div class="modal fade text-left" id="EditKategoriPajak" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Kategori Pajak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>ID Kategori Pajak : </label>
                    <div class="form-group">
                        <input type="text" id="agent_code" name="akun_code"
                               class="form-control bg-transparent" placeholder="Kategori Aset">
                    </div>
                    <label>Nama Kategori : </label>
                    <div class="form-group">
                        <input type="text" id="nama_akun" name="nama_akun"
                               class="form-control bg-transparent" placeholder="Tipe Aset">
                    </div>
                    <label>Metode Perhitungan: </label>
                    <div class="form-group">
                        <select id="largeSelect" class="form-select form-select-lg form-control">
                            <option>Pilih Penyusutan</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tahun : </label>
                                <input type="text" id="agent_code" name="akun_code"
                                       class="form-control bg-transparent" placeholder="Tahun">
                            </div>
                            <div class="col-md-6">
                                <label>Tarif (%) : </label>
                                <input type="text" id="agent_code" name="akun_code"
                                       class="form-control bg-transparent" placeholder="Tarif ">
                            </div>
                        </div>
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
