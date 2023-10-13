<div class="table-responsive">
    {{--                            <input type="hidden" id="tableDaftarTransaksiKasir" value="{{$data->count()}}">--}}
    <table class="table datatables table-bordered table-hover"
           id="table-notif-atk-permintaan-logistik">
        <thead>
        <tr>
            <th rowspan="2" class="w-3p">No</th>
            <th rowspan="2" class="w-5p">Tanggal Order</th>
            <th rowspan="2" class="w-15p">Pic Pemohon</th>
            <th rowspan="2" class="w-15p">Nama Item</th>
            <th rowspan="2" class="w-5p">Bagian</th>
            <th rowspan="2" class="w-5p">Sub Bagian</th>
            <th rowspan="2" class="w-5p">Komponen</th>
            <th rowspan="2" class="w-5p">Stock Gudang</th>
            <th rowspan="2" class="w-5p">Jumlah Permintaan</th>
            <th rowspan="2" class="w-5p">Satuan</th>
            <th colspan="2" class="w-10p text-center">Status Ketersediaan</th>
            <th rowspan="2" class="w-5p">Ajukan Pembelian</th>
            <th rowspan="2" class="w-5p">Status</th>
        </tr>
        <tr>
            <th>Tersedian</th>
            <th>Tidak Tersedian</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-center" style="color: #880000; font-style: italic;">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
        </tr>
        <tr>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td class="text-center"><input type="checkbox"></td>
            <td class="text-center"><input type="checkbox"></td>
            <td class="text-center"><input type="checkbox"></td>
            <td>#</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="float-right">
    <button class="btn btn-success" onclick="notifPembelianAtk()"><i class='bx bxs-message-rounded-dots'></i> Pembelian ATK</button>
    <button class="btn btn-primary" onclick="notifUsers()"><i class='bx bxs-message' ></i> Notif Ke User</button>
</div>
<br>
