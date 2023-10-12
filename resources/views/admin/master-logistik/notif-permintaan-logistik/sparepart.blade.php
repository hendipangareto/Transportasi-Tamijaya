<table class="table datatables table-bordered table-hover"
       id="table-daftar-laporan-dana-form-pemandu">
    <thead>
    <tr>
        <th class="w-3p">Sparepart</th>
        <th class="w-5p">Tanggal Laporan</th>
        <th class="w-5p">No Invoice Laporan</th>
        <th class="w-15p">Pic Pelapor</th>
        <th class="w-5p">Nilai Total Transaksi</th>
        <th class="w-10p">Status Sumber Dana</th>
        <th class="w-10p">Status Laporan Dana</th>
        <th class="w-5p">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Sparepart</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>
            <div class="d-flex">
                <div class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1"
                     title="print pdf">
                    <a target="_blank" href=""
                       class="bx bx-show-alt" style="color: white"></a>
                </div>
                <div class="badge-circle badge-circle-sm badge-circle-success pointer mr-1"
                     onclick="approve()"
                     title="approve">
                    <i class='bx bx-check-circle font-size-base' style="color: white"></i>
                </div>
                <div class="badge-circle badge-circle-sm badge-circle-danger pointer mr-1"
                     title="reject" onclick="reject()">
                    <a href="#" class="bx bx-x-circle" style="color: white"></a>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<div class="float-right">
    <button class="btn btn-primary">Notif Ke Bag Perawatan</button>
</div>
<br>
<br>
