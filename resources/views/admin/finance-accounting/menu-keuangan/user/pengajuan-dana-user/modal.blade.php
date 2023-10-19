<form action="{{ route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-tambah-pengajuan-dana-user') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="modal fade text-left" id="modal-add-pengajuan-dana-belanja-user" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Toko <sub style="color: red">*</sub></label>
                                <select name="toko_id" id="toko_id" class="form-control">
                                    <option selected disabled>Pilih Toko</option>
                                    @foreach($toko as $item)
                                        <option value="{{$item->id}}">{{ $item->nama_toko}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach($kategori as $item)
                                        <option value="{{$item->id}}">{{ $item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Item<sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="nama_item" name="nama_item"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kuantitas <sub style="color: red">*</sub></label>
                                <input type="number" class="form-control" id="kuantitas_item" name="kuantitas_item" placeholder="Masukan kuantitas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <sub style="color: red">*</sub></label>
                                <select name="satuan_id" id="satuan_id" class="form-control" required>
                                    <option selected disabled>Pilih Satuan</option>
                                    @foreach($satuan as $item)
                                        <option value="{{$item->id}}">{{ $item->nama_satuan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Satuan <sub style="color: red">*</sub></label>
                                <input type="number" class="form-control" id="harga_item" name="harga_item" placeholder="Masukan harga Satuan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="catatan_pembelian_item" id="catatan_pembelian_item" class="form-control" placeholder="Masukan catatan item"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Cara Bayar <sub style="color: red">*</sub></label>
                                <select name="cara_bayar_item" id="cara_bayar_item" class="form-control">
                                    <option value="" selected disabled>Pilih cara bayar</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Batas Waktu Pembayaran</label>
                                <input type="date" class="form-control" id="batas_waktu_pembayaran_item" name="batas_waktu_pembayaran_item">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-check mt"></i> Submit
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>

{{--Modal edit--}}
@foreach($danaUser as $dataItem)
    <form action="{{ route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-update-pengajuan-dana-user', $dataItem->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal fade text-left" id="modal-edit-pengajuan-dana-belanja-user" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Form Edit Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $dataItem->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="toko_id">Nama Toko <sub style="color: red">*</sub></label>
                                    <select name="toko_id" id="toko_id" class="form-control">
                                        @foreach($toko as $tokoItem)
                                            <option value="{{ $tokoItem->id }}" {{ $tokoItem->id == $dataItem->toko_id ? 'selected' : '' }}>{{ $tokoItem->nama_toko }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        @foreach($kategori as $kategoriItem)
                                            <option value="{{ $kategoriItem->id }}" {{ $kategoriItem->id == $dataItem->kategori_id ? 'selected' : '' }}>{{ $kategoriItem->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_item">Nama Item <sub style="color: red">*</sub></label>
                                    <input type="text" class="form-control" name="nama_item" id="nama_item" value="{{ $dataItem->nama_item }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kuantitas_item">Kuantitas <sub style="color: red">*</sub></label>
                                    <input type="text" class="form-control" id="kuantitas_item" name="kuantitas_item" value="{{ $dataItem->kuantitas_item }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan_id">Satuan <sub style="color: red">*</sub></label>
                                    <select name="satuan_id" id="satuan_id" class="form-control" required>
                                        @foreach($satuan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_item">Harga Satuan <sub style="color: red">*</sub></label>
                                    <input type="text" class="form-control" id="harga_item" name="harga_item" value="{{ $dataItem->harga_item }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="catatan_pembelian_item">Catatan</label>
                                    <textarea name="catatan_pembelian_item" id="catatan_pembelian_item" class="form-control">{{ $dataItem->catatan_pembelian_item }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cara_bayar_item">Cara Bayar <sub style="color: red">*</sub></label>
                                    <select name="cara_bayar_item" id="cara_bayar_item" class="form-control">
                                        <option value="cash" {{ $dataItem->cara_bayar_item == 'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="transfer" {{ $dataItem->cara_bayar_item == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_waktu_pembayaran_item">Batas Waktu Pembayaran</label>
                                    <input type="date" class="form-control" id="batas_waktu_pembayaran_item" name="batas_waktu_pembayaran_item" value="{{ $dataItem->batas_waktu_pembayaran_item }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="bx bx-check mt"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

{{--Modal Detail--}}
@foreach($danaUser as $item)
<div class="modal fade text-left" id="modal-details-pengajuan-dana-belanja-user" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Detail Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Toko <sub style="color: red">*</sub></label>
                            <select name="toko_id" id="toko_id" class="form-control" readonly>

                                @foreach($toko as $tk)
                                    <option value="{{$tk->id}}">{{ $tk->nama_toko}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control" readonly>

                                @foreach($kategori as $kt)
                                    <option value="{{$kt->id}}">{{ $kt->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Item <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="{{ $item->nama_item }}" id="nama_item" name="nama_item" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kuantitas <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="{{ $item->kuantitas_item }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Satuan <sub style="color: red">*</sub></label>
                            <select name="satuan_id" id="satuan_id" class="form-control" readonly>

                                @foreach($satuan as $item)
                                    <option value="{{$item->id}}">{{ $item->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Harga Satuan <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="{{ $item->harga_item }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Catatan</label>
                            <textarea class="form-control" readonly data-value="{{ $item->catatan_pembelian_item }}">{{ $item->catatan_pembelian_item }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cara Bayar <sub style="color: red">*</sub></label>
                            <select name="edit_cara_bayar_item" id="edit_cara_bayar_item" class="form-control" disabled>
                                <option value="" selected disabled>Pilih cara bayar</option>
                                <option value="cash">{{ $item->cara_bayar_item }}</option>
                                <option value="transfer">{{ $item->cara_bayar_item }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Batas Waktu Pembayaran</label>
                            <input type="date" class="form-control" value="{{ $item->batas_waktu_pembayaran_item }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
