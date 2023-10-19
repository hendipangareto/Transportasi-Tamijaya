@extends('admin.layouts.app')
{{--@section('content-header')--}}
{{--    <div class="content-header-left col-12 mb-2 mt-1">--}}
{{--        <div class="row breadcrumbs-top">--}}
{{--            <div class="col-12">--}}
{{--                <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
{{--                <div class="breadcrumb-wrapper col-12">--}}
{{--                    <ol class="breadcrumb p-0 mb-0">--}}
{{--                        <li class="content-header-title float-left pr-1 mb-0">Form Logistik Keluar--}}
{{--                        </li>--}}
{{--                        <a class="content-header-title float-left pr-1 mb-0">LOGISTIK</a>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Pengajuan Pembelian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="{{ route('master-logistik-laporan-pengajuan-pembelian') }}"
                                       class="btn btn-warning mr-1"><i class="bx bx-arrow-back"></i>Kembali</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">No
                                                    Pengajuan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder="Auto generate"
                                                       aria-describedby="defaultFormControlHelp" readonly/>
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
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahDetailLaporan"><i class="bx bx-plus-circle"></i> Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post">
                            <table class="table table-bordered table-hover table-responsive-lg"
                                   id="table-pengajuan-pembelian">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-3p">Nama Toko</th>
                                    <th class="w-3p">Item</th>
                                    <th class="w-10p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-5p">Harga Satuan (Rp)</th>
                                    <th class="w-5p">Harga Total (Rp)</th> <!-- New column for Harga Total -->
                                    <th class="w-10p">Status Transaksi</th>
                                    {{--                                    <th class="w-10p">Action</th>--}}
                                </tr>
                                </thead>


                                @php
                                    $totalLunas = 0;
                                    $totalHutang = 0;
                                @endphp

                                <tbody>
                                @forelse($detail as $item)
                                    @php
                                        $totalLunas += ($item->cara_bayar === 'lunas') ? ($item->kuantitas * $item->harga) : 0;
                                        $totalHutang += ($item->cara_bayar === 'hutang') ? ($item->kuantitas * $item->harga) : 0;
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->toko }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>@currency($item->harga)</td>
                                        <td><b style="color: #9f191f">@currency($item->kuantitas * $item->harga)</b>
                                        </td>

                                        <td><b style="color: {{ (strtoupper($item->cara_bayar) === 'LUNAS') ? '#0077ff' : ((strtoupper($item->cara_bayar) === 'HUTANG') ? '#ff000c' : '') }};  ">{{ strtoupper($item->cara_bayar) }}</b></td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data Pengajuan Pembelian.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="row mt-5">
                                <div class="col-md-12 col-12 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2 row">
                                                <label class="col-md-6 col-form-label">Total Nota</label>
                                                <label for="html5-url-input" class="col-md-1 col-form-label"> = </label>
                                                <div class="col-md-5">
                                                    <input class="form-control" name="status_absensi" id="totalNota" type="text" value="@currency($totalLunas + $totalHutang)" readonly/>
                                                </div>
                                            </div>

                                            <div class="mb-1 row">
                                                <label class="col-md-4 col-form-label">Diskon</label>
                                                <div class="col-md-2">
                                                    <input class="form-control" name="diskon" id="diskon" type="text" oninput="updateDiskon()"/>
                                                </div>
                                                <label for="html5-url-input" class="col-md-1 col-form-label"> = </label>
                                                <div class="col-md-5">
                                                    <input class="form-control" name="total_diskon" id="totalDiskon" type="text" readonly/>
                                                </div>
                                            </div>

                                            <div class="mb-1 row">
                                                <label class="col-md-4 col-form-label">ppn</label>
                                                <div class="col-md-2">
                                                    <input class="form-control" name="ppn" id="ppn" oninput="updatePpn()" type="text"/>
                                                </div>
                                                <label for="html5-url-input" class="col-md-1 col-form-label"> = </label>
                                                <div class="col-md-5">
                                                    <input class="form-control" name="total_ppn" id="totalPpn" type="text" readonly/>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-1 row">
                                                <label class="col-md-6 col-form-label">Total Belanja</label>
                                                <label for="html5-url-input" class="col-md-1 col-form-label"> = </label>
                                                <div class="col-md-5">
                                                    <input class="form-control" name="totalBelanja" id="totalBelanja" value="" type="text" readonly/>
                                                </div>
                                            </div>
                                            <div class="mb-1 row">
                                                <div class="col-md-7 col-form-label">
                                                    <label for="">Lampiran Dokumen</label>
                                                    <input class="form-control mt-1" name="status_absensi" id="absensi"
                                                                                           type="file"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Hutang</h5>
                                                    <p class="card-text" style="color: #9f191f">
                                                        @currency($totalHutang)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Lunas</h5>
                                                    <p class="card-text">
                                                        @currency($totalLunas)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header  pb-0  d-flex justify-content-between">
                                <h4 class="card-title"></h4>
                                <a href="" class="btn btn-warning mr-1" type="submit"><i
                                        class="bx bx-save"></i>Ajukan</a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.master-logistik.laporan-pembelian.modal-tambah')
@endsection
@push('page-scripts')
    <script>

        function updateDiskon() {
            var totalNota = document.getElementById('totalNota').value.replace(/[^\d]/g, '');
            var diskonPercentage = document.getElementById('diskon').value;

            if (totalNota !== "" && diskonPercentage !== "") {
                var diskonAmount = (diskonPercentage / 100) * totalNota;
                var totalDiskon = diskonAmount;
                document.getElementById('totalDiskon').value = formatCurrency(totalDiskon);
            }
        }

        // function formatCurrency(amount) {
        //     return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        // }


        function updatePpn() {
            var totalNota = document.getElementById('totalNota').value.replace(/[^\d]/g, '');
            var ppn = document.getElementById('ppn').value;

            if (totalNota !== "" && ppn !== "") {
                var totalPpn = (ppn / 100) * totalNota;
                document.getElementById('totalPpn').value = formatCurrency(totalPpn);
                updateTotalBelanja();
            }
        }

        function updateTotalBelanja() {
            var totalNota = document.getElementById('totalNota').value.replace(/[^\d]/g, '');
            var diskon = document.getElementById('diskon').value;
            var ppn = document.getElementById('ppn').value;

            if (totalNota !== "" && diskon !== "" && ppn !== "") {
                var diskonAmount = (diskon / 100) * totalNota;
                var ppnAmount = (ppn / 100) * totalNota;
                var totalBelanja = totalNota - diskonAmount + ppnAmount;
                document.getElementById('totalBelanja').value = formatCurrency(totalBelanja);
            }
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }









        // HAPUS DATA
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
                var $PengajuanPembelianId = $(this).data('id');

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
                            url: '{{ route('master-logistik-delete-pengajuan-pembelian') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'employee_id': $PengajuanPembelianId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data Pengajuan Pembelian"
                                });
                            },
                            error: function (error) {
                                console.log(err);
                            }
                        });
                    }
                });
            });
        });

    </script>
@endpush

