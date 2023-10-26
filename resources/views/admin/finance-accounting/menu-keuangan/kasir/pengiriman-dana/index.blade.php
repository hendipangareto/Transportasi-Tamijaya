@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>Kasir </b>| Pengiriman Dana</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahPengajuanPembelian"><i class="bx bx-plus-circle"></i> Tambah
                                        Data</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">No
                                                    Pengajuan</label>
                                                <select name="status_pengiriman" class="form-control">
                                                    <option value="" selected disabled>--Pilih No Pengajuan--</option>
                                                    <option value=" "> </option>
                                                    <option value=" "> </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">Tanggal
                                                    Pengajuan</label>
                                                <input type="date" class="form-control" id="defaultFormControlInput"
                                                       placeholder="John Doe"
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('master-logistik-terkirim-pengajuan-dana')}}" method="post">
                        @csrf
                        <div class="card-body" id="data-rencana-belanja">
                            <div class="card-title">

                                <div class="table-responsive">

                                    <input type="hidden" id="totalQsActual"
                                           value="{{ $dataIndex ->count()}}">
                                    <table class="table datatables table-bordered table-hover table-data"
                                           id="table-daftar-pengajuan-pembelian">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="w-3p">No</th>
                                            <th class="w-10p">Nama Toko</th>
                                            <th class="w-5p">Nama Item</th>
                                            <th class="w-8p">Kuantitas</th>
                                            <th class="w-10p">Satuan</th>
                                            <th class="w-10p">Harga Satuan <br> (Rp.)</th>
                                            <th class="w-10p">Harga Total <br> (Rp)</th>
                                            <th class="w-5p">Status Transaksi</th>
                                            <th class="w-10p">Pilih <input type="checkbox" id="checkAll"></th>
                                            <th class="w-5p">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="show-data-rencana-kerja-terpilih">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @php
                                            $totalLunas = 0;
                                            $totalHutang = 0;
                                        @endphp
                                        @forelse ($dataIndex as $item)
                                            @php
                                                $totalLunas += (strtoupper($item->cara_bayar) === 'LUNAS') ? ($item->kuantitas * $item->harga) : 0;
                                                $totalHutang += (strtoupper($item->cara_bayar) === 'HUTANG') ? ($item->kuantitas * $item->harga) : 0;
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{$no++}}</td>
                                                <td>{{$item->toko}}</td>
                                                <td>{{$item->item}}</td>
                                                <td>{{$item->kuantitas}}</td>
                                                <td>{{$item->satuan}}</td>
                                                <td>{{$item->harga}}</td>
                                                <td>@currency($item->kuantitas * $item->harga)</td>
                                                <td>
                                                    <b style="color: {{ (strtoupper($item->cara_bayar) === 'LUNAS') ? '#0077ff' : ((strtoupper($item->cara_bayar) === 'HUTANG') ? '#ff000c' : '') }};  ">{{ strtoupper($item->cara_bayar) }}</b>
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
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <div
                                                            class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                            data-toggle="modal"
                                                            data-target="#DetailSubBagian-{{ $item->id }}">
                                                            <i class="bx bx-info-circle font-size-base"></i>
                                                        </div>
                                                        <div
                                                            class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                            data-toggle="modal"
                                                            data-target="#UpdatePengajuanPembelian-{{ $item->id }}">
                                                            <i class="bx bx-edit font-size-base"></i>
                                                        </div>
                                                        <div
                                                            class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button"
                                                            data-id="{{ $item->id }}">
                                                            <i class="bx bx-trash font-size-base"></i>
                                                        </div>
                                                    </div>
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
                        </div>

                        <div class="row mt-5 card-body">
                            <div class="col-md-6 col-12 ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title mt-1">Total Lunas/Cash</h5>
                                                <p class="card-text" style="color: #9f191f">
                                                    @currency($totalLunas)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title mt-1">Total Hutang</h5>
                                                <p class="card-text" style="color: #9f191f">
                                                    @currency($totalHutang)
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
                                                    @currency($totalLunas + $totalHutang)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Status Pengiriman Dana</label>
                                    <select name="status_pengiriman" class="form-control" id="statusPengiriman">
                                        <option value="" selected disabled>Pilih Status Pengiriman</option>
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="tujuanDiv" style="display: none;">
                                <div class="form-group">
                                    <label for="">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-2" id="lampiranDiv" style="display: none;">
                                <div class="form-group">
                                    <label for="">Lampiran Dokumen</label>
                                    <input type="file" name="lampiran" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2" id="akunBankDiv" style="display: none;">
                                <div class="form-group">
                                    <label for="">Akun Bank</label>
                                    <select name="akun_bank" class="form-control" id="akunBank">
                                        <option value="" selected disabled>Pilih Akun Bank</option>
                                        <option value="bca">BCA</option>
                                        <option value="bri">BRI</option>
                                        <option value="mandiri">MANDIRI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="float-left">
                                    <a class="btn btn-danger" target="_blank"  href="{{ route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-print-kwitansi-pengajuan-dana') }}" id="cetakBtn" style="display: none;"><i class="bx bx-printer"></i> Cetak Kwitansi</a>
                                </div>
{{--                                <div class="float-right">--}}
{{--                                    <button class="btn btn-primary" onclick="submitForm()"><i class="bx bx-check"></i> Submit</button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button class="btn btn-warning d-inline" id="btn-submit-daftar-pilihan-pekerjaan"
                                        disabled>
                                    <i class="fe fe-check-circle"></i> Ajukan
                                </button>
                            </div>
                            <p>&nbsp;</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{--    @include('admin.master-logistik.pengajuan-pembelian.modal-tambah')--}}
@endsection

@push('page-scripts')
    <script>
        document.getElementById('statusPengiriman').addEventListener('change', function() {
            const selectedOption = this.value;
            const tujuanDiv = document.getElementById('tujuanDiv');
            const lampiranDiv = document.getElementById('lampiranDiv');
            const akunBankDiv = document.getElementById('akunBankDiv');
            const cetakBtn = document.getElementById('cetakBtn');

            if (selectedOption === 'cash') {
                tujuanDiv.style.display = 'block';
                lampiranDiv.style.display = 'block';
                akunBankDiv.style.display = 'none';
                cetakBtn.style.display = 'block';
            } else if (selectedOption === 'transfer') {
                tujuanDiv.style.display = 'none';
                lampiranDiv.style.display = 'block';
                akunBankDiv.style.display = 'block';
                cetakBtn.style.display = 'none';
            } else {
                tujuanDiv.style.display = 'none';
                lampiranDiv.style.display = 'none';
                akunBankDiv.style.display = 'none';
                cetakBtn.style.display = 'none';
            }
        });

        function submitForm() {
            const selectedOption = document.getElementById('statusPengiriman').value;
            let message = '';
            if (selectedOption === 'cash') {
                message = 'Lampiran dokumen berisi bukti penerimaan dana cash (kuitansi)';
            } else if (selectedOption === 'transfer') {
                message = 'Lampiran dokumen berisi bukti transfer';
            }

            Swal.fire({
                title: 'Notifikasi',
                text: message,
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }
        // =================================================================================================================
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

        // Mengambil elemen-elemen yang diperlukan
        const volPekRencElements = document.querySelectorAll('#table-rencana-kerja tbody tr td:nth-child(9)');
        const totalVolPekRencElement = document.querySelector('#table-rencana-kerja tfoot tr td[colspan="9"]');

        // Menghitung total Volume Pek Renc
        let totalVolPekRenc = 0;
        volPekRencElements.forEach(element => {
            const volPekRenc = parseFloat(element.innerText); //
            if (!isNaN(volPekRenc)) {
                totalVolPekRenc += volPekRenc;
            }
        });

        // Menampilkan total Volume Pek Renc di elemen <tfoot>
        totalVolPekRencElement.innerText = totalVolPekRenc;

        function checkList(button) {
            var row = button.parentNode.parentNode;
            row.classList.toggle('checked');
        }


        @if(session('pesan-berhasil'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("pesan-berhasil") }}'
        });
        @elseif(session('pesan-gagal'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session("pesan-gagal") }}'
        });
        @endif
        $(document).ready(function () {
            $('.delete-button').click(function () {
                var employeeId = $(this).data('id');

                Swal.fire({
                    title: "Yakin akan menghapus data?",
                    text: "Data yang dihapus tidak dapat dikembalikan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'your_api_endpoint_url', // Ganti dengan URL yang sesuai
                            type: 'DELETE',
                            data: {
                                '_token': 'your_csrf_token', // Ganti dengan token CSRF yang valid
                                'employee_id': employeeId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data gaji karyawan"
                                });
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
