<div class="modal fade text-left" id="modal-add-penumpang-suites" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Penumpang Suites</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="#" id="form-office" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="">
                        <div class="col-md-6">
                            <label>Nama: </label>
                            <div class="form-group">
                                <input type="text" id="nama_penumpang" name="nama_penumpang"
                                       class="form-control" placeholder="Masukan nama penumpang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>No HP: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="hp_penumpang" placeholder="masukan no hp penumpang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titik Keberangkatan: </label>
                            <div class="form-group">
                                <select name="titik_berangkat" id="titik_berangkat" class="form-control">
                                    <option value="" selected disabled>Pilih titik keberangkatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Titik Kedatangan: </label>
                            <div class="form-group">
                                <select name="titik_kedatangan" id="titik_kedatangan" class="form-control">
                                    <option value="" selected disabled>Pilih titik kedatangan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Harga Ticket: </label>
                            <div class="form-group">
                                <input type="text" name="harga_ticket" class="form-control" placeholder="Auto generate" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Cara Pembayaran: </label>
                            <div class="form-group">
                                <select name="cara_pembayaran" id="cara_pembayaran" class="form-control">
                                    <option value="" selected disabled>Pilih cara pembayaran</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>No Kursi: </label>
                            <div class="form-group">
                                <select name="nomor_kursi" id="nomor_kursi" class="form-control">
                                    <option value="" selected disabled>Pilih no kursi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-office" class="btn btn-success"><i
                            class="bx bx-check-circle"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
