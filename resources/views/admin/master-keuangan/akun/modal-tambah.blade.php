<div class="modal fade text-left" id="TambahAkun" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Barang: </label>
                    <div class="form-group">
                        <input type="text" id="agent_code" name="agent_code"
                               class="form-control bg-transparent" placeholder="kategori barang">
                    </div>
                    <label>Nama Barang: </label>
                    <div class="form-group">
                        <input type="text" id="agent_code" name="agent_code"
                               class="form-control bg-transparent" placeholder="kategori barang">
                    </div>
                    <label>Kategori Barang: </label>
                    <div class="form-group">
                        <select name="agent_domicile" id="agent_domicile" class="form-control">
                            <option value="">--Pilih Kategori Barang--</option>
                            <option value="JOGJAKARTA">Ban</option>
                        </select>
                    </div>
                    <label>Supplier Barang: </label>
                    <div class="form-group">
                        <select name="agent_domicile" id="agent_domicile" class="form-control">
                            <option value="">--Pilih Supplier Barang--</option>
                            <option value="JOGJAKARTA">PT.Maju Bersama</option>
                        </select>
                    </div>
                    {{--                    <label>Deskripsi Kategori: </label>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <textarea class="form-control" name="agent_description" id="agent_description" cols="30"--}}
                    {{--                                  rows="3" placeholder="Silahkan masukan deskripsi agent"></textarea>--}}
                    {{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-agent" class="btn btn-warning mr-1"  data-dismiss="modal"><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
