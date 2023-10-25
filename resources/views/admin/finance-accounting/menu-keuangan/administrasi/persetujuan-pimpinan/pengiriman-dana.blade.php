@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Administrasi
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">Detail Pengajuan Dana</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index')}}"
                                       type="button" class="btn btn-warning">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1 mt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tanggal Pengajuan</label>
                                        <input type="date" name="date_pengajuan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">No Pengajuan</label>
                                        <select name="no_pengajuan" class="form-control">
                                            <option value="" selected disabled>Pilih no pengajuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <input type="hidden" id="totalTerpilih" value="{{$PencairanDana->count()}}">
                                <table class="table datatables table-bordered table-hover table-data"
                                       id="table-rekapitulasi-pekerjaan-terpilih">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-10p">Nama Toko</th>
                                        <th class="w-5p">Nama Item</th>
                                        <th class="w-8p">Kuantitas</th>
                                        <th class="w-10p">Satuan</th>
                                        <th class="w-10p">Harga Satuan <br> (Rp.)</th>
                                        <th class="w-10p">Harga Total <br> (Rp)</th>
                                        <th class="w-10p">Status Transaksi</th>
                                        <th class="w-10p">Akun Perkiraan <input type="checkbox" id="check-all"></th>
                                        <th class="w-10p">Approve Keuangan <input type="checkbox" id="check-all"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="show-data-rencana-kerja-terpilih">
                                    @php
                                        $totalLunas = 0;
                                        $totalHutang = 0;
                                    @endphp
                                    @forelse ($PencairanDana as $item)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->toko}}</td>
                                            <td>{{$item->item}}</td>
                                            <td>{{$item->kuantitas}}</td>
                                            <td>{{$item->satuan}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>@currency($item->kuantitas * $item->harga)</td>

                                            <td><b style="color: {{ (strtoupper($item->cara_bayar) === 'LUNAS') ? '#0077ff' : ((strtoupper($item->cara_bayar) === 'HUTANG') ? '#ff000c' : '') }};  ">{{ strtoupper($item->cara_bayar) }}</b></td>
                                            <td class="text-center" style="color: #ff000c">
                                                @php
                                                    if($item->tanggal_pengajuan !== null){
                                                @endphp
                                                <input class="check-terpilih-daftar-pilihan-pekerjaan"
                                                       name="id_qs[]"
                                                       value="{{$item->id}}" type="checkbox">
                                                @php
                                                    }else{
                                                @endphp
                                                <input class="check-disabled-enabled-{{$no}}" disabled
                                                       name="id_qs[]" value="{{$item->id}}" type="checkbox">
                                                @php
                                                    }
                                                @endphp
                                            </td>

                                            <td class="text-center" style="color: #ff000c">
                                                @php
                                                    if($item->tanggal_pengajuan !== null){
                                                @endphp
                                                <input class="check-terpilih-daftar-pilihan-pekerjaan"
                                                       name="id_qs[]"
                                                       value="{{$item->id}}" type="checkbox">
                                                @php
                                                    }else{
                                                @endphp
                                                <input class="check-disabled-enabled-{{$no}}" disabled
                                                       name="id_qs[]" value="{{$item->id}}" type="checkbox">
                                                @php
                                                    }
                                                @endphp
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row mt-2">
                                <div class="col-md-6 col-12 ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Lunas/Cash</h5>
                                                    <p class="card-text" style="color: #9f191f">

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Hutang</h5>
                                                    <p class="card-text" style="color: #9f191f">

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Pengajuan</h5>
                                                    <p class="card-text">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pengiriman Dana</label>
                                        <select name="status_pengiriman" class="form-control">
                                            <option value="" selected disabled>Pilih Status Pengiriman</option>
                                            <option value="cash">Cash</option>
                                            <option value="transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tujuan</label>
                                        <input type="text" name="tujuan" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Lampiran Dokumen</label>
                                        <input type="file" name="lampiran" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Akun Bank</label>
                                        <select name="akun_bank" class="form-control" id="akunBank">
                                            <option value="" selected disabled>Pilih Akun Bank</option>
                                            <option value="bca">BCA</option>
                                            <option value="bri">BRI</option>
                                            <option value="bri">MANDIRI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-left">
                                        <button class="btn btn-danger" id="cetakBtn" style="display: none;"><i class="bx bx-printer"></i> Cetak Kwitansi</button>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-success" id="submitBtn"><i class="bx bx-check-circle"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
    <script>


        const statusPengiriman = document.querySelector('select[name="status_pengiriman"]');
        const lampiranDokumen = document.querySelector('input[name="lampiran"]');
        const akunBank = document.querySelector('select[name="akun_bank"]');
        const cetakBtn = document.getElementById('cetakBtn');
        const submitBtn = document.getElementById('submitBtn');

        statusPengiriman.addEventListener('change', function () {
            if (statusPengiriman.value === 'cash') {
                cetakBtn.style.display = 'block';
                akunBank.style.display = 'none';
            } else if (statusPengiriman.value === 'transfer') {
                cetakBtn.style.display = 'none';
                akunBank.style.display = 'block';
            }
        });

        submitBtn.addEventListener('click', function () {
            // Your logic to send a notification and attach documents goes here
            // For now, let's assume it's a simple alert message.
            alert('Notification sent and documents attached.');
        });






    // =============================================================================
        $(document).ready(function () {
            $("#table-rekapitulasi-pekerjaan-terpilih").DataTable();
        });

        $("#table-rekapitulasi-pekerjaan-terpilih").on("click", ".btn-hapus-item-pekerjaan-terpilih", function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            var rowData = $(this).closest("tr").find("td").map(function () {
                return $(this).text();
            }).get();

            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                confirmButtonText: 'Yes',
                showCancelButton: true,
                closeOnConfirm: false
            }).then((result) => {
                if (result['isConfirmed']) {
                    sendToRekapTable(rowData); // Call the function to send data to the destination table
                    form.submit(); // You may submit the form to delete the item from the current table
                }
            });
        });

        function sendToRekapTable(rowData) {
            var newRow = "<tr>";
            for (var i = 0; i < rowData.length; i++) {
                newRow += "<td>" + rowData[i] + "</td>";
            }
            newRow += "</tr>";
            $("#rekap-table-id").append(newRow); // Append to the rekap table, replace "rekap-table-id" with your actual table ID
        }

        $(function () {
            var countSelected = 0;

            if (parseInt($("#totalQsActual").val()) > 0) {
                $("#table-daftar-pengajuan-pembelian").DataTable();
            }

            if (parseInt($("#totalTerpilih").val()) > 0) {
                $("#table-rekapitulasi-pengajuan-pembelian").DataTable();
            }

            if (parseInt($("#totalPekerjaan").val()) > 0) {
                $("#tbl-pekerjaan").DataTable();
            }

            $("#btn-modal-daftar-pilihan-pekerjaan").click(function () {
                $("#modal-daftar-pilihan-pekerjaan").modal('show');
            });
            $("#btn-modal-daftar-pilihan-pekerjaan-terpilih").click(function () {
                $("#modal-daftar-pilihan-pekerjaan-terpilih").modal('show');
            });

            $("#table-daftar-pengajuan-pembelian").on("click", ".check-terpilih-daftar-pilihan-pekerjaan", function (e) {
                $('#btn-submit-daftar-pilihan-pekerjaan').prop('disabled', !$('.check-terpilih-daftar-pilihan-pekerjaan:checked').length);
            });


            $("#checkAll").click(function () {
                $('.check-terpilih-daftar-pilihan-pekerjaan').not(this).prop('checked', this.checked);
                $('#btn-submit-daftar-pilihan-pekerjaan').prop('disabled', !$('.check-terpilih-daftar-pilihan-pekerjaan:checked').length);
            });

            $("#table-rekapitulasi-pengajuan-pembelian").on("click", ".btn-hapus-item-pekerjaan-terpilih", function (e) {
                e.preventDefault();
                var form = $(this).parents('form');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    icon: 'warning',
                    confirmButtonText: 'Yes',
                    showCancelButton: true,
                    closeOnConfirm: false
                }).then((result) => {
                    if (result['isConfirmed']) {
                        form.submit();
                    }
                });
            });

            $("#btn-submit-pekerjaan-sm").on("click", function (e) {
                e.preventDefault();
                var form = $(this).parents('form');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    icon: 'warning',
                    confirmButtonText: 'Yes',
                    showCancelButton: true,
                    closeOnConfirm: false
                }).then((result) => {
                    if (result['isConfirmed']) {
                        form.submit();
                    }
                });
            });


        })


        function handleFileSelect(event) {
            const file = event.target.files[0];
            document.getElementById("fileNameInput").value = file.name;
        }


    </script>
@endpush


