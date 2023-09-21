<div class="modal fade text-left" id="TambahMetodePenyusutan" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Metode Penyusutan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.metode-penyusutan.tambah-metode-penyusutan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_metode_penyusutan" name="kode_metode_penyusutan" value="">
{{--                    <label>ID Metode Penyusutan: </label>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" id="agent_code" name="akun_code"--}}
{{--                               class="form-control bg-transparent" placeholder="Kategori Aset">--}}
{{--                    </div>--}}
                    <label>Nama Metode Penyusutan : </label>
                    <div class="form-group">
                        <input type="text" id="nama_metode_penyusutan" name="nama_metode_penyusutan"
                               class="form-control bg-transparent" placeholder="Nama metode penyusutan">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan_metode_penyusutan"
                                  id="keterangan_metode_penyusutan" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi metode penyusutan">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
