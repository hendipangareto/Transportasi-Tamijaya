<form action="">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="" class="col-form-label col-md-2">Nama Item</label>
                <div class="col-md-4">
                    <select name="" id="" class="form-control">
                        <option value="" selected disabled>Pilih item</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
<hr>
<h5 class="card-title">Registrasi Sparepart Keluar</h5>
<hr>
<div class="table-responsive">
    <table class="table datatables table-bordered table-hover"
           id="table-sparepart-keluar">
        <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-15p">Nama Item</th>
            <th class="w-10p">Merek</th>
            <th class="w-5p">Vol Gudang</th>
            <th class="w-5p">Jumlah Keluar</th>
            <th class="w-15p">Petugas Pengambil</th>
            <th class="w-5p">Tanggal Diambil</th>
            <th class="w-5p">Cek</th>
            <th class="w-5p">Stock Akhir</th>
            <th class="w-5p">Satuan</th>
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
        </tr>
        </tbody>
    </table>
</div>
<div class="float-right">
    <button class="btn btn-success"><i class='bx bx-check-circle'></i> Simpan</button>
</div>
<br>
