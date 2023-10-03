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
                        <li class="breadcrumb-item active">Jurnal Umum
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
                            <h4 class="card-title">List Jurnal Umum</h4>
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
                <div class="card-content pt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="hidden" id="tablesjurnalUmums" value="{{$data->count()}}">
                            <table class="table datatables table-bordered table-hover" id="table-jurnal-umum-menu-keuangan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Tanggal</th>
                                    <th class="w-10p">Nama Sub Akun</th>
                                    <th class="w-10p">Tipe Transaksi</th>
                                    <th class="w-10p">Debit</th>
                                    <th class="w-10p">Kredit</th>
                                    <th class="w-10p">Keterangan</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                @endphp
                                @forelse($data as $item)
                                    @php

                                        $nilaiDebit = 0;
                                        $nilaicredit = 0;

                                        if($item->jenis_debit_credit == 'debit'){
                                            $nilaiDebit = $item->nilai_debit_credit;
                                        }else{
                                            $nilaicredit = $item->nilai_debit_credit;
                                        }

                                        $debit = $nilaiDebit;
                                        $credit = $nilaicredit;

                                        $totalDebit += $debit;
                                        $totalCredit += $credit;

                                    @endphp
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->tanggal}}</td>
                                        <td>{{$item->group_account_name}}</td>
                                        <td>{{$item->tipe_transaksi}}</td>
                                        <td>{{'Rp' . number_format($nilaiDebit)}}</td>
                                        <td>{{'Rp' . number_format($nilaicredit)}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#detail-jurnal-umum{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                    data-toggle="modal" title="edit"
                                                    data-target="#modal-edit-jurnal-umum{{$item->id}}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer delete-jurnals-umum"
                                                    data-id="{{ $item->id }}" title="delete">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-primary-lighter">
                                        <td colspan="8">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Total Debit</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               value="{{ 'Rp ' . number_format($totalDebit, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Total Credit</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               value="{{ 'Rp ' . number_format($totalCredit, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.menu-keuangan.finance.jurnal-umum.modal')
@endsection

@push('page-scripts')
    <script>

        function openModal() {
            $("#modal-add-jurnal-umum").modal('show');
        }

        $(function () {
            if (parseInt($("#tablesjurnalUmums").val()) > 0) {
                $("#table-jurnal-umum-menu-keuangan").DataTable();
            }
        });

        $(document).ready(function () {
            $('#group_akun_name').change(function () {
                var groupAkunCode = $(this).val();

                if (groupAkunCode) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('finance-accounting-menu-keuangan-finance-jurnal-umum-getCodeGroupAccount') }}",
                        data: {'group_account_code': groupAkunCode},
                        success: function (data) {
                            if (data && data.group_account_code) {
                                $('#code_group_akun').val(data.group_account_code);
                            } else {
                                $('#code_group_akun').val('');
                            }
                        },
                        error: function () {
                            $('#code_group_akun').val('');
                        }
                    });
                } else {
                    $('#code_group_akun').val('');
                }
            });
        });

        $(".delete-jurnals-umum").click(function (e) {
            e.preventDefault()
            var jurnalId = $(this).data('id');
            console.log(jurnalId)
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
                        url: '{{ route('finance-accounting-menu-keuangan-finance-jurnal-umum-delete') }}',
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': jurnalId
                        },
                        success: function (response) {
                            location.reload();
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil menghapus data jurnal"
                            });
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

    </script>
@endpush
