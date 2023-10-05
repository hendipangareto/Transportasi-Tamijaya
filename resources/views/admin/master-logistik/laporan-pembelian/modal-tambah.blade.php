<div class="modal fade text-left" id="TambahDetailLaporan" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-logistik-simpan-laporan-pengajuan-pembelian') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="kode_laporan_pembelian"  id="kode_laporan_pembelian">
{{--                                    <div class="col-md-6 col-12">--}}
{{--                                        <label for="flatpickr-inline" class="form-label">Nama Produk</label>--}}
{{--                                        <input type="text" class="form-control mb-1" placeholder=" " id="tanggal_pengajuan" name="tanggal_pengajuan"/>--}}
{{--                                    </div>--}}
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-date" class="form-label">Kuantitas</label>
                                        <input type="number" class="form-control mb-1" placeholder=" " id="kuantitas" name="kuantitas"/>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="flatpickr-multi" class="form-label">Satuan*</label>
                                                <select name="satuan_id" id="satuan_id" class="form-control" required>
                                                    <option selected disabled>Pilih Satuan</option>
                                                    @foreach($satuan as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_satuan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="flatpickr-multi" class="form-label">Harga Satuan*</label>
                                                <input type="number" class="form-control" placeholder="Harga Satuan"
                                                       id="harga_satuan" name="harga_satuan"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-disabled-range" class="form-label">Cara Pembayaran</label>
                                        <select name="cara_bayar" id="cara_bayar" class="form-control" required>
                                            <option selected disabled>Pilih Pembayaran</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="hutang">Hutang</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-disabled-range" class="form-label">Tipe Pembayaran</label>
                                        <select name="tipe_bayar" id="tipe_bayar" class="form-control" required>
                                            <option selected disabled>Tipe Pembayaran</option>
                                            <option value="cash">chas</option>
                                            <option value="transfer">transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-disabled-range" class="form-label">Nama Bank</label>
                                        <select name="bank_id" id="bank_id" class="form-control" required>
                                            <option selected disabled>Tipe Pembayaran</option>
                                            @foreach($bank as $bk)
                                            <option value="{{$bk->id}}">{{$bk->bank_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-inline" class="form-label">Batas Waktu Pembayaran</label>
                                        <input type="date" class="form-control mb-1" placeholder=" "
                                               id="batas_pembayaran" name="batas_pembayaran"  min="<?php echo date('Y-m-d'); ?>" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-inline" class="form-label">Nomor Rekening</label>
                                        <input type="date" class="form-control mb-1" placeholder=" "
                                               id="no_rekening" name="no_rekening"/>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label" for="bootstrap-maxlength-example2">Catatan</label>
                                        <textarea id="catatan_laporan_pembelian"
                                                  class="form-control bootstrap-maxlength-example"
                                                  name="catatan_laporan_pembelian" rows="3" maxlength="255"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-agent" class="btn btn-warning mr-1" data-dismiss="modal"><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit"   class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




