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
                    <div class="card-header">
                        <button class="btn btn-primary">Pengiriman Dana</button>
                        <a href=" "
                           class="btn btn-outline-secondary">Rekap Dana Diberikan</a>

                    </div>
                    <form action="{{ route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-dikirim') }}"
                          method="post" enctype="multipart/form-data">
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
                                            {{--                                            <th class="w-5p">Action</th>--}}
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
                                                @if($item->status_pimpinan == null)
                                                    <td><a class="badge bg-warning" style="color: #ffffff">Required</a>
                                                    </td>
                                                @elseif($item->status_pimpinan == 1)
                                                    <td><a class="badge bg-warning" style="color: #ffffff">Pencairan
                                                            Dana</a></td>
                                                @endif
                                                <td class="text-center" style="color: #ff000c">
                                                    @if($item->tanggal_pengajuan !== null)
                                                        <input class="check-terpilih-daftar-pilihan-pekerjaan"
                                                               name="id_qs[]" value="{{$item->id}}" type="checkbox">
                                                    @else
                                                        <input class="check-disabled-enabled-{{$no}}" disabled
                                                               name="id_qs[]" value="{{$item->id}}" type="checkbox">
                                                    @endif
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
                                                <p class="card-text" style="color: #9f191f" id="totalLunasValue">
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
