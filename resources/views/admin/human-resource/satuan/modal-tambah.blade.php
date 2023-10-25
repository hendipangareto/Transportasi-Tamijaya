<div class="modal fade text-left" id="TambahSatuan" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('human-resource.status.simpan-satuan') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_satuan" name="kode_satuan" value="">

                    <label>Nama Satuan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama satuan" id="nama_satuan" name="nama_satuan"
                               class="form-control">
                    </div>
                    <label>Deskripsi Satuan: </label>
                    <div class="form-group">
                                    <textarea class="form-control" name="deskripsi_satuan" id="deskripsi_satuan" cols="30"
                                              rows="3" placeholder="Silahkan masukan deskripsi satuan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success"><i
                                class="bx bx-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
