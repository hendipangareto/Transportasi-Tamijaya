<div class="modal fade text-left" id="TambahPengajuanPembelian" tabindex="-1" role="dialog"
     aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Data Pengajuan Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-logistik-tambah-pengajuan-pembelian') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="kode_pengajuan" id="kode_pengajuan">
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

{{--========================UPDATE DATA REKAP PENGAJUAN========================================--}}

@foreach($qsActual as $item)
    <div class="modal fade text-left" id="UpdatePengajuanPembelian-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Update Data Supllier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('master-logistik-update-pengajuan-pembelian', $item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="kode_pengajuan" id="kode_pengajuan">
                                        <div class="col-md-6 col-12 mb-2">
                                            <label for="flatpickr-date" class="form-label">Nama Toko</label>
                                            <select name="toko_id" id="toko_id" class="form-control" required>
                                                @foreach ($toko as $tk)
                                                    <option
                                                        value="{{ $tk->id }}" {{ $tk->id == $item->toko_id ? 'selected' : '' }}>{{ $tk->nama_toko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <label for="flatpickr-time" class="form-label">Kategori</label>
                                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                                @foreach($kategori as $kt)
                                                    <option value="{{$kt->id}}">{{ $kt->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <label for="flatpickr-datetime" class="form-label">Nama Item</label>
                                            <input type="text" class="form-control" value="{{ $item->item }}" id="item"
                                                   name="item" required/>
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="flatpickr-multi" class="form-label">Kuantitas*</label>
                                                    <input type="number" class="form-control"
                                                           value="{{ $item->kuantitas }}"
                                                           id="kuantitas" name="kuantitas" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="flatpickr-multi" class="form-label">Satuan*</label>
                                                    <select name="satuan_id" id="satuan_id" class="form-control"
                                                            required>
                                                        @foreach($satuan as $st)
                                                            <option value="{{$st->id}}">{{ $st->nama_satuan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12 mb-2">
                                            <label for="flatpickr-range" class="form-label">Harga Satuan</label>
                                            <input type="text" class="form-control" value="{{ $item->harga }}"
                                                   id="harga" name="harga" required/>
                                        </div>
                                        <div class="col-md-12 col-12 mb-2">
                                            <label class="form-label" for="bootstrap-maxlength-example2">Catatan</label>
                                            <textarea id="catatan_pembelian"
                                                      class="form-control bootstrap-maxlength-example"
                                                      name="catatan_pembelian" rows="3" maxlength="255"
                                                      data-value="{{ $item->catatan_pembelian }}">{{ $item->catatan_pembelian }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="flatpickr-disabled-range" class="form-label">Cara
                                                Pembayaran</label>
                                            <select name="cara_bayar" id="cara_bayar" class="form-control" required>
                                                <option
                                                    value="lunas" {{ $item->cara_bayar == 'lunas' ? 'selected' : '' }}>
                                                    Lunas
                                                </option>
                                                <option
                                                    value="hutang" {{ $item->cara_bayar == 'hutang' ? 'selected' : '' }}>
                                                    Hutang
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="flatpickr-inline" class="form-label">Batas Waktu
                                                Pembayaran</label>
                                            <input type="date" class="form-control mb-1"
                                                   id="batas_waktu_pembayaran" name="batas_waktu_pembayaran"
                                                   value="{{ $item->batas_waktu_pembayaran }}" required/>
                                            <input type="hidden" class="form-control mb-1"
                                                   id="tanggal_pengajuan" name="tanggal_pengajuan"
                                                   value="{{ $item->tanggal_pengajuan }}"/>
                                        </div>



                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Status Pengiriman Dana</label>
                                                <select name="status_pengiriman" class="form-control" id="statusPengiriman">
                                                    <option value="" selected disabled>Pilih Status Pengiriman</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="transfer">Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="tujuanDiv" style="display: none;">
                                            <div class="form-group">
                                                <label for="">Tujuan</label>
                                                <input type="text" name="tujuan" class="form-control" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="lampiranDiv" style="display: none;">
                                            <div class="form-group">
                                                <label for="">Lampiran Dokumen</label>
                                                <input type="file" name="lampiran" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="akunBankDiv" style="display: none;">
                                            <div class="form-group">
                                                <label for="">Akun Bank</label>
                                                <select name="akun_bank" class="form-control" id="akunBank">
                                                    <option value="" selected disabled>Pilih Akun Bank</option>
                                                    <option value="bca">BCA</option>
                                                    <option value="bri">BRI</option>
                                                    <option value="mandiri">MANDIRI</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="float-left">
                                                <a class="btn btn-danger" target="_blank"  href="{{ route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-print-kwitansi-pengajuan-dana') }}" id="cetakBtn" style="display: none;"><i class="bx bx-printer"></i> Cetak Kwitansi</a>
                                            </div>
                                            {{--                                <div class="float-right">--}}
                                            {{--                                    <button class="btn btn-primary" onclick="submitForm()"><i class="bx bx-check"></i> Submit</button>--}}
                                            {{--                                </div>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" id="add-agent" class="btn btn-warning mr-1" data-dismiss="modal"><i
                                    class="bx bx-arrow-back"></i> Kembali
                            </button>
                            <button type="submit" class="btn btn-success mr-1"><i
                                    class="bx bx-save mt"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach
