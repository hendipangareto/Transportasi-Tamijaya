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
                        <li class="breadcrumb-item active">Pembayaran
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
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">List Pembayaran</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button type="button" class="btn btn-primary" onclick="openModal()">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <a href="{{ route('finance-accounting-menu-keuangan-finance-pembayaran-index') }}"
                       class="btn btn-warning"> <i class="bx bx-arrow-back"></i> Kembali</a>

                </div>
                <div class="card-content pt-1">
                    <div class="card-body" id="data-rencana-belanja">
                        <div class="card-title">

                            <div class="table-responsive">

                                <input type="hidden" id="totalQsActual"
                                       value="{{ $notifikasi ->count()}}">
                                <table class="table datatables table-bordered table-hover table-data"
                                       id="table-daftar-pengajuan-pembelian">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-10p">Nama Toko</th>
                                        <th class="w-10p">Dana Diajaukan <br> (Rp)</th>
                                        <th class="w-5p">Status Transaksi</th>
{{--                                        <th class="w-5p">Action</th>--}}
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
                                    @forelse ($notifikasi as $item)
                                        @php
                                            $totalLunas += (strtoupper($item->cara_bayar) === 'LUNAS') ? ($item->kuantitas * $item->harga) : 0;
                                            $totalHutang += (strtoupper($item->cara_bayar) === 'HUTANG') ? ($item->kuantitas * $item->harga) : 0;
                                        @endphp
                                        <tr class="text-center">
                                            <td>{{$no++}}</td>
                                            <td>{{$item->toko}}</td>

                                            <td>@currency($totalLunas + $totalHutang)</td>
                                            <td>
                                                <b style="color: {{ (strtoupper($item->cara_bayar) === 'LUNAS') ? '#0077ff' : ((strtoupper($item->cara_bayar) === 'HUTANG') ? '#ff000c' : '') }};  ">{{ strtoupper($item->cara_bayar) }}</b>
                                            </td>

{{--                                            <td class="text-center">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div--}}
{{--                                                        class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"--}}
{{--                                                        data-toggle="modal"--}}
{{--                                                        data-target="#DetailSubBagian-{{ $item->id }}">--}}
{{--                                                        <i class="bx bx-info-circle font-size-base"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div--}}
{{--                                                        class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"--}}
{{--                                                        data-toggle="modal"--}}
{{--                                                        data-target="#UpdatePengajuanPembelian-{{ $item->id }}">--}}
{{--                                                        <i class="bx bx-edit font-size-base"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div--}}
{{--                                                        class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button"--}}
{{--                                                        data-id="{{ $item->id }}">--}}
{{--                                                        <i class="bx bx-trash font-size-base"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}

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

                </div>
            </div>
        </div>

    @include('admin.finance-accounting.menu-keuangan.finance.pembayaran.modal')
@endsection
        @push('page-scripts')
            <script>

                function openModal() {
                    $("#modal-add-pembayaran").modal('show');
                }

                $(function () {
                    if (parseInt($("#tablesPembayaran").val()) > 0) {
                        $("#table-pembayaran-menu-keuangan").DataTable();
                    }
                });


                $(document).ready(function () {
                    $('#bank_id').change(function () {
                        var bankCode = $(this).val();

                        if (bankCode) {
                            $.ajax({
                                type: "GET",
                                url: "{{ route('finance-accounting-menu-keuangan-finance-pembayaran-get-bank_code') }}",
                                data: {'bank_code': bankCode},
                                success: function (data) {
                                    if (data && data.bank_code) {
                                        $('#code_bank_id').val(data.bank_code);
                                    } else {
                                        $('#code_bank_id').val('');
                                    }
                                },
                                error: function () {
                                    $('#code_bank_id').val('');
                                }
                            });
                        } else {
                            $('#code_bank_id').val('');
                        }
                    });
                });

            </script>
@@endpush

