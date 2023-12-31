@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active">Request Pengajuan Dana</li>
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
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">List Request Pengajuan Dana</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="#" class="btn btn-danger">
                                        <i class="bx bxs-file-pdf"></i> Print Pdf
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
                                        <input type="date" name="tanggal_pengajuan" class="form-control">
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
                                        <label for="">PIC</label>
                                        <select name="pic_pengajuan" class="form-control">
                                            <option value="" selected disabled>Pilih Pic</option>
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
                    <div class="card-body card-dashboard">


                        <div class="table-responsive">
                            <input type="hidden" id="totalTerpilih" value="{{$terpilih->count()}}">
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

                                    <th class="w-5p">Action</th>
                                </tr>
                                </thead>
                                <tbody id="show-data-rencana-kerja-terpilih">
                                @php
                                    $totalLunas = 0;
                                    $totalHutang = 0;
                                @endphp
                                @forelse ($terpilih as $item)
                                    <tr class="text-center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->toko}}</td>
                                        <td>{{$item->item}}</td>
                                        <td>{{$item->kuantitas}}</td>
                                        <td>{{$item->satuan}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td>@currency($item->kuantitas * $item->harga)</td>

                                        <td>
                                            @if($item->status_pimpinan != 2)
                                                <a href="{{ route('master-logistik-setujui-pengajuan-pembelian', $item->id) }}"
                                                   class="btn btn-primary" id="btn-setujui-{{ $item->id }}"
                                                   onclick="changeButtonColor('btn-setujui-{{ $item->id }}'); showButton('btn-tolak-{{ $item->id }}'); hideButton('btn-setujui-{{ $item->id }}')">
                                                    <i class="bx bx-check-circle"></i> Setujui
                                                </a>
                                            @endif
                                            @if($item->status_pimpinan != 1)
                                                <a href="{{ route('master-logistik-tolak-pengajuan-pembelian', $item->id) }}"
                                                   class="btn btn-danger" id="btn-tolak-{{ $item->id }}"
                                                   onclick="changeButtonColor('btn-tolak-{{ $item->id }}'); showButton('btn-setujui-{{ $item->id }}'); hideButton('btn-tolak-{{ $item->id }}')">
                                                    <i class="bx bx-x-circle"></i> Tolak
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row d-flex">
                                                <div class="col-md-2">
                                                    <form action="{{ route('master-logistik-terpilih-delete-pengajuan-pembelian') }}" method="post" class="mb-1">
                                                        @csrf
                                                        <input type="hidden" name="id_qs" value="{{$item->id}}">
                                                        <button type="submit" class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer">
                                                            <span class="bx bx-x"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    @php
                                                        if($terpilih->count() > 0){
                                                    @endphp
                                                    <form action="{{route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-disetuju-pimpinan')}}" class="d-inline" method="post">
                                                        @csrf
                                                        @foreach ($terpilih as $terpilihItem)
                                                            <input type="hidden" name="id_qs" value="{{$terpilihItem->id}}">
                                                        @endforeach
                                                        <button type="submit" class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" id="btn-submit-pekerjaan-sm">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </form>
                                                    @php
                                                        }
                                                    @endphp
                                                </div>
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <a class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-detail', $item->id) }}">--}}
{{--                                                            <i class="bx bx-info-circle font-size-base"></i>--}}
{{--                                                        </a>--}}
{{--                                                        @if ($item->status === 'Request')--}}
{{--                                                            <a class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer" href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-detail', $item->id) }}">--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
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
                <br>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
    <script>
        function changeButtonColor(buttonId) {
            document.getElementById(buttonId).style.backgroundColor = "grey"; // Ganti warna tombol saat diklik
        }

        function showButton(buttonId) {
            document.getElementById(buttonId).style.display = "inline"; // Menampilkan tombol
        }

        function hideButton(buttonId) {
            document.getElementById(buttonId).style.display = "none"; // Menyembunyikan tombol
        }

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


    </script>
@endpush
