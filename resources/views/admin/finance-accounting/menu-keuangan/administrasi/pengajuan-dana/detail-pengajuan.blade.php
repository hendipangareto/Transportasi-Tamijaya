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
                <div class="card-header">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">Detail Rekap Pengajuan Dana</h4>
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
                <div class="card-content pt-1">
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
                                <input type="hidden" id="totalTerpilih" value="{{$danaUser->count()}}">
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
                                    @forelse ($danaUser as $item)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->toko}}</td>
                                            <td>{{$item->item}}</td>
                                            <td>{{$item->kuantitas}}</td>
                                            <td>{{$item->satuan}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>@currency($item->kuantitas * $item->harga)</td>

                                            @if($item->status_pimpinan == null)
                                                <td><a class="badge bg-warning" style="color: #ffffff">Required</a></td>
                                            @elseif($item->status_pimpinan == 1)
                                                <td><a class="badge bg-success" style="color: #ffffff">Disetujui Pimpinan</a></td>
                                            @endif
                                            <td></td>

                                            <td>
                                                <div class="row d-flex">

                                                    <div class="col-md-2">
                                                        @if($danaUser->count() > 0)
                                                            <form action=" " method="post" class="d-inline">
                                                                @csrf
                                                                @foreach ($danaUser as $terpilihItem)

                                                                @endforeach

                                                            </form>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form action="{{ route('master-logistik-cairkan-dana-pengajuan-pembelian') }}" method="post" class="mb-1">
                                                            @csrf
                                                            <input type="hidden" name="id_qs" value="{{$item->id}}">
                                                            <button type="submit" class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer">
                                                                <span class="bx bx-check-circle"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @php
                                                            if($danaUser->count() > 0){
                                                        @endphp
                                                        <form action="{{route('master-logistik-proses-terpilih-pengajuan-pembelian')}}" class="d-inline" method="post">
                                                            @csrf
                                                            @foreach ($danaUser as $terpilihItem)
                                                                <input type="hidden" name="id_qs" value="{{$terpilihItem->id}}">
                                                            @endforeach
                                                            <button type="submit" class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" id="btn-submit-pengajuan-sm">
                                                                <i class="bx bx-check-circle"></i>
                                                            </button>
                                                        </form>
                                                        @php
                                                            }
                                                        @endphp
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
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Total Cash</label>
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Total Hutang</label>
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Total Pengajuan Dana</label>
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <button class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan
                                        </button>
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

