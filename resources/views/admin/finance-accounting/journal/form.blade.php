<form action="javascript:void(0)" id="form-journal" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id" name="id" value="">
    <div class="row">
        <div class="col-md-2">
            <label>Nomor Jurnal: </label>
            <div class="form-group">
                <input type="text" id="journal_number" name="journal_number" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-md-3">
            <label>Tanggal: </label>
            <div class="form-group">
                <input type="date" id="journal_date" value="{{ date('Y-m-d') }}" name="journal_date"
                    class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-md-3">
            <label>Deskripsi: </label>
            <div class="form-group">
                <input type="text" id="journal_description" name="journal_description"
                    class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex justify-content-between mt-2">
                {{-- <button class="btn btn-primary"><i class="bx bx-book"></i>Account</button> --}}
                <button class="btn btn-primary btn-sm" type="button" onclick="addJournal()"><i
                        class="bx bx-plus"></i>TAMBAH</button>
            </div>
        </div>
    </div>
    <div class="row">

        <style>
            #table-input-journal thead tr th {
                font-size: 11px !important;
                padding-top: 10px;
                padding-bottom: 10px;
            }

        </style>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="table-input-journal">
                <thead>
                    <tr>
                        <th class="w-15p">Kode Perkiraan</th>
                        <th class="w-25p">Nama Account</th>
                        <th class="w-15p text-right">Debit</th>
                        <th class="w-15p text-right">Kredit</th>
                        <th>Keterangan</th>
                        <th class="w-5p text-center">Act.</th>
                    </tr>
                </thead>
                <tbody id="input-body-journal">
                </tbody>
            </table>
            <div>
                <div class="row">
                    <div class="col-md-9 d-flex justify-content-between">
                        <fieldset class="form-group">
                            <label for="basicInput" class="text-success">DEBIT</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input type="text" class="form-control bg-transparent" id="journal_debit"
                                    name="journal_debit" readonly>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="basicInput" class="text-danger">KREDIT</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input type="text" class="form-control bg-transparent" id="journal_kredit"
                                    name="journal_kredit" readonly>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="basicInput">BALANCE</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input type="text" class="form-control bg-transparent" id="journal_balance"
                                    name="journal_balance" readonly>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" id="add-journal" class="btn btn-success mt-1  float-right"
                            onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@push('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endpush
