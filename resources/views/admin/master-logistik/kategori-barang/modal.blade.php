<div class="modal fade text-left" id="kategoriBarang" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-logistik-simpang-kategori-barang') }}" method="post"   enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="kode_kategori" value="">
                    <label>Kategori Barang: </label>
                    <div class="form-group">
                        <input type="text" name="nama_kategori"
                               class="form-control bg-transparent" >
                    </div>

                    <label>Keterangan : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_kategori" cols="30"
                                  rows="3"  ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
