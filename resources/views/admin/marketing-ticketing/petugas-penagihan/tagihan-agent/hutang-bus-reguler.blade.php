<h5 class="card-title">Bus Reguler</h5>
<div class="table-responsive">
    <!--    {{--                            <input type="hidden" id="tablePerjalananBusReguler" value="{{$data->count()}}">--}}-->
    <table class="table datatables table-bordered table-hover"
           id="table-tagihan-agent-bus-reguler">
        <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-5p">Tanggal Transaksi</th>
            <th class="w-5p">Kode Transaksi</th>
            <th class="w-20p">Tipe Armada</th>
            <th class="w-3p">Jumlah Ticket</th>
            <th class="w-10p">Total Transaksi</th>
            <th class="w-3p">Ceklist</th>
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
            <td class="text-center">
                <input type="checkbox">
            </td>
        </tr>
        </tbody>
    </table>
</div>

<hr class="pt-1">

<div class="row">
    <div class="col-md-12">
        <input type="text" class="form-control" value="Total Nilai Transaksi : RP #######" readonly style="font-size: 15px; font-weight: bold">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-8">
        <table width="60%">
            <tbody>
            <tr>
                <th>Cara Pembayaran</th>
                <td>:</td>
                <td>$$$$$$$$</td>
            </tr>
            <tr>
                <th>Nama Bank</th>
                <td>:</td>
                <td>$$$$$$$$</td>
            </tr>
            <tr>
                <th>No Rekening</th>
                <td>:</td>
                <td>$$$$$$$$</td>
            </tr>
            <tr>
                <th>Dokumen File</th>
                <td>:</td>
                <td><input type="file" class="form-control"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="float-right">
            <button class="btn btn-success" title="approved" onclick="approved()"><i class="bx bx-check-circle"></i> Approved</button>
        </div>
    </div>
</div>
