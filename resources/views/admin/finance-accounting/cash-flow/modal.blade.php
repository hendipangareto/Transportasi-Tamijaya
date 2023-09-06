<div class="modal fade text-left" id="modal-cash-flow" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Cash Flow</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-cash-flow" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Account: </label>
                    <div class="form-group">
                        <select name="id_account" id="id_account" class="form-control">
                            <option value="">--Silahkan pilih data Account--</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Tanggal: </label>
                    <div class="form-group">
                        <input type="date" id="date_cf" name="date_cf" class="form-control"
                            placeholder="Silahkan masukan Cash Flow">
                    </div>

                    <label>Nominal: </label>
                    <div class="form-group">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="text" class="form-control bg-transparent input-number" id="amount" name="amount" />
                        </div>
                    </div>
                    <label>Deskripsi: </label>
                    <div class="form-group">
                        <textarea type="text" placeholder="Silahkan masukan catatan cash flow" id="description" name="description"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-cash-flow" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-cash-flow" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
