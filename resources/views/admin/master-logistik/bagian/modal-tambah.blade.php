<div class="modal fade text-left" id="TambahBagian" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Bagian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.bagian.tambah-bagian') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_bagian" name="kode_bagian" value="">
                    <label>Nama Bagian: </label>
                    <div class="form-group">
                        <input type="text"  id="nama_bagian" name="nama_bagian"
                               class="form-control bg-transparent" placeholder="nama bagian">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_bagian" id="deskripsi_bagian" cols="30"
                                  rows="3" placeholder="Silahkan masukan deskripsi bagian"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit"  class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
