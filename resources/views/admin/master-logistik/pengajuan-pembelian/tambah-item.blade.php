<div class="modal fade text-left" id="TambahItem" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Data Pengajuan Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-logistik-tambah-item-pembelian') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-date" class="form-label">Kode Pengajuan</label>
                                        <select name="qs_actual_id" id="qs_actual_id" class="form-control">
                                            <option selected disabled>Pilih Kode Pengajuan</option>
                                            @foreach($QsActual as $item)
                                                <option value="{{$item->id}}">{{ $item->kode_pengajuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-inline" class="form-label">Tanggal Pengajuan</label>
                                        <input type="date" class="form-control mb-1" placeholder=" "
                                               id="tanggal_pengajuan" name="tanggal_pengajuan"
                                               min="<?php echo date('Y-m-d'); ?>"/>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-date" class="form-label">Nama Toko</label>
                                        <select name="toko_id" id="toko_id" class="form-control">
                                            <option selected disabled>Pilih Toko</option>
                                            @foreach($toko as $item)
                                                <option value="{{$item->id}}">{{ $item->nama_toko}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-time" class="form-label">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control">
                                            <option selected disabled>Pilih Kategori</option>
                                            @foreach($kategori as $item)
                                                <option value="{{$item->id}}">{{ $item->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-datetime" class="form-label">Nama Item</label>
                                        <input type="text" class="form-control" placeholder="" id="item" name="item"/>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-multi" class="form-label">Kuantitas*</label>
                                        <input type="number" class="form-control" placeholder="Kuantitas" id="kuantitas"
                                               name="kuantitas"/>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-multi" class="form-label">Satuan*</label>
                                        <select name="satuan_id" id="satuan_id" class="form-control" required>
                                            <option selected disabled>Pilih Satuan</option>
                                            @foreach($satuan as $item)
                                                <option value="{{$item->id}}">{{ $item->nama_satuan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label for="flatpickr-range" class="form-label">Harga Satuan</label>
                                        <input type="number" class="form-control" placeholder="" id="harga"
                                               name="harga"/>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label class="form-label" for="bootstrap-maxlength-example2">Catatan</label>
                                        <textarea id="catatan_pembelian"
                                                  class="form-control bootstrap-maxlength-example"
                                                  name="catatan_pembelian" rows="3" maxlength="255"></textarea>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-disabled-range" class="form-label">Cara Pembayaran</label>
                                        <select name="cara_bayar" id="cara_bayar" class="form-control" required>
                                            <option selected disabled>Pilih Kategori</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="hutang">Hutang</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-inline" class="form-label">Batas Waktu Pembayaran</label>
                                        <input type="date" class="form-control mb-1" placeholder=" "
                                               id="batas_waktu_pembayaran" name="batas_waktu_pembayaran"
                                               min="<?php echo date('Y-m-d'); ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-agent" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success mr-1">
                        <i class="bx bx-save mt"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
