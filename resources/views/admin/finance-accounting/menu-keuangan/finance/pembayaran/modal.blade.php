<form action="{{route('finance-accounting-menu-keuangan-finance-pembayaran-store')}}" enctype="multipart/form-data"
      method="post">
    @csrf
    <div class="modal fade text-left" id="modal-add-pembayaran" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>No Pengajuan: </label>
                    <div class="form-group">
                        <input type="text" id="pengajuan_no" name="pengajuan_no"
                               class="form-control" placeholder="No pengajuan otomatis" readonly>
                    </div>
                    <label>Tanggal Penerimaan: </label>
                    <div class="form-group">
                        <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"
                               class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <label>Nama Bank: </label>
                    <div class="form-group">
                        <select name="bank_id" id="bank_id" class="form-control">
                            <option selected disabled>Pilih bank</option>
                            @foreach($bank as $bnk)
                                <option value="{{$bnk->id}}">{{$bnk->bank_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Code Bank: </label>
                    <div class="form-group">
                        <input type="text" id="code_bank_id" name="code_bank_id"
                               style="font-style: italic"
                               class="form-control"
                               placeholder="Kode bank otomatis"
                               readonly>
                    </div>
                    <label>Nominal (Rp): </label>
                    <div class="form-group">
                        <input type="number" id="nominal_pengajuan" name="nominal_pengajuan"
                               class="form-control" placeholder="Silahkan masukan nominal rp">
                    </div>
                    <label>Nama PIC: </label>
                    <div class="form-group">
                        <input type="text" id="pic_pembayaran" name="pic_pembayaran"
                               class="form-control" placeholder="Silahkan masukan nama pic">
                    </div>
                    <label>Description: </label>
                    <div class="form-group">
                           <textarea class="form-control" id="description_pembayaran" name="description_pembayaran"
                                     placeholder="Silahkan masukan deskripsi"></textarea>
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
@foreach($data as $item)
    <form action="{{route('finance-accounting-menu-keuangan-finance-pembayaran-update',$item->id)}}"
          enctype="multipart/form-data"
          method="post">
        @csrf
        <div class="modal fade text-left" id="modal-edit-pembayaran{{$item->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modal-title"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Form Update Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="{{$item->id}}">
                        <label>No Pengajuan: </label>
                        <div class="form-group">
                            <input type="date" id="edit_pengajuan_no" name="edit_pengajuan_no"
                                   class="form-control" value="{{$item->pengajuan_no}}" readonly>
                        </div>
                        <label>Tanggal Pengajuan: </label>
                        <div class="form-group">
                            <input type="date" id="edit_tanggal_pengajuan" name="edit_tanggal_pengajuan"
                                   class="form-control" value="{{$item->tanggal_pengajuan}}">
                        </div>
                        <label>Nama Bank: </label>
                        <div class="form-group">
                            <select name="edit_bank_id" id="edit_bank_id" class="form-control">
                                @foreach($bank as $bnk)
                                    @php
                                        $selected = ($item->bank_id == $bnk->id) ? "selected" : "";
                                    @endphp
                                    <option value="{{$bnk->id}}">{{$bnk->bank_name. ' / '.$bnk->bank_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Nominal (Rp): </label>
                        <div class="form-group">
                            <input type="number" id="edit_nominal_pengajuan" name="edit_nominal_pengajuan"
                                   class="form-control" value="{{$item->nominal_pengajuan}}">
                        </div>
                        <label>Nama PIC: </label>
                        <div class="form-group">
                            <input type="text" id="edit_pic_pembayaran" name="edit_pic_pembayaran"
                                   class="form-control" value="{{$item->pic_pembayaran}}">
                        </div>
                        <label>Description: </label>
                        <div class="form-group">
                            <textarea class="form-control" id="edit_description_pembayaran"
                                      name="edit_description_pembayaran">{{$item->description_pembayaran}}</textarea>
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
@foreach($data as $item)
    <div class="modal fade text-left" id="modal-detail-pembayaran{{$item->id}}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <label>No Pengajuan: </label>
                    <div class="form-group">
                        <input type="date"
                               class="form-control bg-transparent" value="{{$item->pengajuan_no}}" readonly>
                    </div>
                    <label>Tanggal Pengajuan: </label>
                    <div class="form-group">
                        <input type="date"
                               class="form-control bg-transparent" value="{{$item->tanggal_pengajuan}}" readonly>
                    </div>
                    <label>Nama Bank: </label>
                    <div class="form-group">
                        <select class="form-control" disabled>
                            @foreach($bank as $bnk)
                                @php
                                    $selected = ($item->bank_id == $bnk->id) ? "selected" : "";
                                @endphp
                                <option value="{{$bnk->id}}">{{$bnk->bank_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Kode Bank: </label>
                    <div class="form-group">
                        <input type="text"
                               class="form-control bg-transparent" value="{{$item->bank_code}}" readonly>
                    </div>
                    <label>Nominal (Rp): </label>
                    <div class="form-group">
                        <input type="text"
                               class="form-control bg-transparent" value="{{'Rp'.number_format($item->nominal_pengajuan)}}"
                               readonly>
                    </div>
                    <label>Nama PIC: </label>
                    <div class="form-group">
                        <input type="text" readonly
                               class="form-control bg-transparent" value="{{$item->pic_pembayaran}}">
                    </div>
                    <label>Description: </label>
                    <div class="form-group">
                        <textarea class="form-control bg-transparent" readonly>{{$item->description_pembayaran}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
