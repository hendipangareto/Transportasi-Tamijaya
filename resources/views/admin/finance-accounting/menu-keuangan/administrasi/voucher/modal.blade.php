{{--Modal Tambah--}}
<form action="{{route('finance-accounting-menu-keuangan-administrasi-voucher-store')}}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="modal-add-voucher" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Voucher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kode Voucher:</label>
                                <input type="text" id="kode_voucher"
                                       class="form-control" placeholder="Kode automatic" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nilai Voucher</label>
                                <input type="number" id="nilai_voucher" name="nilai_voucher"
                                       class="form-control" placeholder="Masukan nilai voucher">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Voucher</label>
                                <input type="number" id="Jumlah_voucher_dibuat" name="Jumlah_voucher_dibuat"
                                       class="form-control" placeholder="Masukan jumlah voucher">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">PIC Pembuat</label>
                                <input type="text" id="pic_pembuat" name="pic_pembuat"
                                       class="form-control" placeholder="Masukan nama pic pembuat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Pembuatan</label>
                                <input type="date" id="tanggal_buat_voucher" name="tanggal_buat_voucher"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Voucher Keluar</label>
                                <input type="date" id="tanggal_keluar_voucher" name="tanggal_keluar_voucher"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pic Pengeluar Voucher</label>
                                <input type="text" id="pic_pengeluar_voucher" name="pic_pengeluar_voucher"
                                       class="form-control" placeholder="Masukan nama pic pengeluar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jumlah Voucher Keluar</label>
                                <input type="number" id="jumlah_voucher_keluar" name="jumlah_voucher_keluar"
                                       class="form-control" placeholder="Jumlah Voucher keluar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i
                            class="bx bx-check mt"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

{{--Modal Edit--}}
@foreach($voucher as $item)
    <form action="{{route('finance-accounting-menu-keuangan-administrasi-voucher-update', $item->id)}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="modal fade text-left" id="modal-edit-voucher{{$item->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modal-title"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Form Edit Voucher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="{{$item->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kode Voucher:</label>
                                    <input type="text"
                                           class="form-control" value="{{$item->kode_voucher}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nilai Voucher</label>
                                    <input type="number" id="edit_nilai_voucher" name="edit_nilai_voucher"
                                           class="form-control" value="{{$item->nilai_voucher}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah Voucher</label>
                                    <input type="number" id="edit_Jumlah_voucher_dibuat" name="edit_Jumlah_voucher_dibuat"
                                           class="form-control" value="{{$item->Jumlah_voucher_dibuat}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">PIC Pembuat</label>
                                    <input type="text" id="edit_pic_pembuat" name="edit_pic_pembuat"
                                           class="form-control" value="{{$item->pic_pembuat}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Pembuatan</label>
                                    <input type="date" id="edit_tanggal_buat_voucher" name="edit_tanggal_buat_voucher"
                                           class="form-control" value="{{$item->tanggal_buat_voucher}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Voucher Keluar</label>
                                    <input type="date" id="edit_tanggal_keluar_voucher" name="edit_tanggal_keluar_voucher"
                                           class="form-control" value="{{$item->tanggal_keluar_voucher}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pic Pengeluar Voucher</label>
                                    <input type="text" id="edit_pic_pengeluar_voucher" name="edit_pic_pengeluar_voucher"
                                           class="form-control" value="{{$item->pic_pengeluar_voucher}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Jumlah Voucher Keluar</label>
                                    <input type="number" id="edit_jumlah_voucher_keluar" name="edit_jumlah_voucher_keluar"
                                           class="form-control" value="{{$item->jumlah_voucher_keluar}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i
                                class="bx bx-check mt"></i> Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

{{--Modal Detail--}}
@foreach($voucher as $item)
    <div class="modal fade text-left" id="modal-detail-voucher{{$item->id}}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Detail Voucher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kode Voucher:</label>
                                <input type="text"
                                       class="form-control" value="{{$item->kode_voucher}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nilai Voucher</label>
                                <input type="number" class="form-control" value="{{$item->nilai_voucher}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Voucher</label>
                                <input type="number" class="form-control" value="{{$item->Jumlah_voucher_dibuat}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">PIC Pembuat</label>
                                <input type="text" class="form-control" value="{{$item->pic_pembuat}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Pembuatan</label>
                                <input type="date" class="form-control" value="{{$item->tanggal_buat_voucher}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Voucher Keluar</label>
                                <input type="date" class="form-control" value="{{$item->tanggal_keluar_voucher}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pic Pengeluar Voucher</label>
                                <input type="text" class="form-control" value="{{$item->pic_pengeluar_voucher}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jumlah Voucher Keluar</label>
                                <input type="number" class="form-control" value="{{$item->jumlah_voucher_keluar}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="float-right">
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="bx bx-arrow-back"></i> Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
