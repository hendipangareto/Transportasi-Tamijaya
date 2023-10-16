<div class="table-responsive">
    <!--    {{--                            <input type="hidden" id="tablePerjalananBusReguler" value="{{$data->count()}}">--}}-->
    <table class="table datatables table-bordered table-hover"
           id="table-perjalanan-bus-reguler">
        <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-5p">Tanggal Laporan</th>
            <th class="w-5p">Kode Booking</th>
            <th class="w-15p">Tipe Armada</th>
            <th class="w-5p">Nopol Armada</th>
            <th class="w-10p">Total Transaksi</th>
            <th class="w-15p">Status Pembayaran</th>
            <th class="w-5p">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>Cash</td>
            <td class="text-center">
                <div class="d-flex text-center">
                    <div class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1">
                        <a href="#" class="bx bx-show-alt" style="color: white"></a>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<hr class="pt-1">

<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="" class="col-md-4 col-form-label" style="font-weight: bold; font-size: 15px">Total Nilai Transaksi :</label>
            <div class="col-md-8">
                <input type="text" class="form-control" value="RP. #####" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="float-right">
            <button class="btn btn-primary"><i class="bx bx-download"></i> Cetak Kwitansi</button>
            <button class="btn btn-warning" onclick="sendKwitansi()"><i class="bx bx-send"></i> Kirim Kwitansi Pembayaran</button>
            <button class="btn btn-success"><i class="bx bx-check-circle"></i> simpan</button>
        </div>
    </div>
</div>
