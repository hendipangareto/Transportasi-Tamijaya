{{--Form Add--}}
<form action="{{route('finance-accounting-menu-keuangan-finance-jurnal-umum-store')}}" enctype="multipart/form-data"
      method="post">
    @csrf
    <div class="modal fade text-left" id="modal-add-jurnal-umum" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Jurnal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Tanggal: </label>
                    <div class="form-group">
                        <input type="date" id="tanggal_jurnal" name="tanggal_jurnal"
                               class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <label>Tipe Transaksi: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tipe_jurnal" name="tipe_jurnal"
                               placeholder="Masukan tipe transaksi" value="Jurnal Umum">
                    </div>
                    <label>Nama Group Account: </label>
                    <div class="form-group">
                        <select name="group_akun_name" id="group_akun_name" class="form-control">
                            <option selected disabled>Pilih group akun</option>
                            @foreach($groupAccount as $groupAct)
                                <option value="{{$groupAct->id}}">{{$groupAct->group_account_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <label>Group Account code: </label>
                    <div class="form-group">
                        <input type="text" id="code_group_akun" name="code_group_akun"
                               style="font-style: italic"
                               class="form-control"
                               placeholder="Kode group akun otomatis"
                               readonly>
                    </div>
                    <label>Nilai: </label>
                    <div class="form-group">
                        <input type="radio" name="jenis_debit_credit" value="debit" id="debit_jurnal">
                        <label for="debitRadio" class="mr-5">Debit</label>
                        <input type="radio" name="jenis_debit_credit" value="credit" id="credit_jurnal">
                        <label for="creditRadio">Kredit</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control money" id="nilai_debit_credit"
                                   name="nilai_debit_credit"
                                   placeholder="Silahkan masukan nominal">
                        </div>
                    </div>
                    <label>Description: </label>
                    <div class="form-group">
                           <textarea class="form-control" id="description_jurnal" name="description_jurnal"
                                     placeholder="Masukan uraian"></textarea>
                    </div>
                    <label>Lampirkan Dokumen: </label>
                    <div class="form-group">
                        <input type="file" name="document"
                               class="form-control">
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

{{--Form Edit--}}
@foreach($data as $item)
    <form action="{{route('finance-accounting-menu-keuangan-finance-jurnal-umum-update', $item->id)}}"
          enctype="multipart/form-data"
          method="post">
        @csrf
        <div class="modal fade text-left" id="modal-edit-jurnal-umum{{$item->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modal-title"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Form Update Jurnal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="{{$item->id}}">
                        <label>Tanggal: </label>
                        <div class="form-group">
                            <input type="date" id="edit_tanggal_jurnal" name="edit_tanggal_jurnal"
                                   class="form-control" value="{{$item->tanggal}}">
                        </div>
                        <label>Tipe Transaksi: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit_tipe_jurnal" name="edit_tipe_jurnal"
                                   value="{{$item->tipe_transaksi}}">
                        </div>
                        <label>Nama Group Account: </label>
                        <div class="form-group">
                            <select name="edit_group_akun_name" id="edit_group_akun_name" class="form-control">
                                @foreach($groupAccount as $groupAct)
                                    @php
                                        $selected = ($item->group_account_id == $groupAct->id) ? "selected" : "";
                                    @endphp
                                    <option
                                        value="{{$groupAct->id}}">{{$groupAct->group_account_name. ' / '.$groupAct->group_account_code}}</option>
                                @endforeach

                            </select>
                        </div>
                        <label>Nilai: </label>
                        <div class="form-group">
                            @php
                                $checkedDebit = "";
                                $checkedCredit = "";

                                if($item->jenis_debit_credit == 'debit'){
                                    $checkedDebit = "checked";
                                    $checkedCredit = "";
                                }else{
                                    $checkedDebit = "";
                                    $checkedCredit = "checked";
                                }
                            @endphp
                            <input type="radio" name="edit_jenis_debit_credit" value="debit"
                                   id="debit_jurnal" {{$checkedDebit}}>
                            <label for="debitRadio" class="mr-5">Debit</label>
                            <input type="radio" name="edit_jenis_debit_credit" value="credit"
                                   id="credit_jurnal" {{$checkedCredit}}>
                            <label for="creditRadio">Kredit</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control money" id="edit_nilai_debit_credit"
                                       name="edit_nilai_debit_credit"
                                       value="{{$item->nilai_debit_credit }}" readonly>
                            </div>
                        </div>
                        <label>Description: </label>
                        <div class="form-group">
                           <textarea class="form-control" id="edit_description_jurnal" name="edit_description_jurnal"
                                     placeholder="Masukan uraian">{{$item->description}}</textarea>
                        </div>
                        <label>Lampirkan Dokumen: </label>
                        <div class="form-group">
                            <input type="text" id="edit_dokumen" name="edit_dokumen" class="form-control"
                                   value="{{$item->document}}" readonly>
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

{{--Form Detail--}}
@foreach($data as $item)
    <div class="modal fade text-left" id="detail-jurnal-umum{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Detail Jurnal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="{{$item->id}}">
                    <label>Tanggal: </label>
                    <div class="form-group">
                        <input type="date" readonly
                               class="form-control bg-transparent" value="{{$item->tanggal}}">
                    </div>
                    <label>Tipe Transaksi: </label>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent"
                               value="{{$item->tipe_transaksi}}" readonly>
                    </div>
                    <label>Nama Group Account: </label>
                    <div class="form-group">
                        <select class="form-control" disabled>
                            @foreach($groupAccount as $groupAct)
                                @php
                                    $selected = ($item->group_account_id == $groupAct->id) ? "selected" : "";
                                @endphp
                                <option
                                    value="{{$groupAct->id}}">{{$groupAct->group_account_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <label>Code Group Account: </label>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent"
                               value="{{$item->group_account_code}}" readonly>
                    </div>
                    <label>Nilai: </label>
                    <div class="form-group">
                        @php
                            $checkedDebit = "";
                            $checkedCredit = "";

                            if($item->jenis_debit_credit == 'debit'){
                                $checkedDebit = "checked";
                                $checkedCredit = "";
                            }else{
                                $checkedDebit = "";
                                $checkedCredit = "checked";
                            }
                        @endphp
                        <input type="radio" value="debit"
                               id="debit_jurnal" {{$checkedDebit}}>
                        <label for="debitRadio" class="mr-5">Debit</label>
                        <input type="radio" value="credit"
                               id="credit_jurnal" {{$checkedCredit}}>
                        <label for="creditRadio">Kredit</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control money bg-transparent"
                                   value="{{ 'Rp ' . number_format($item->nilai_debit_credit, 0, ',', '.') }}" readonly>
                        </div>
                    </div>
                    <label>Description: </label>
                    <div class="form-group">
                           <textarea class="form-control bg-transparent"
                                     placeholder="Masukan uraian" readonly>{{$item->description}}</textarea>
                    </div>
                    <label>Lampirkan Dokumen: </label>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent"
                               value="{{$item->document}}" readonly>
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
