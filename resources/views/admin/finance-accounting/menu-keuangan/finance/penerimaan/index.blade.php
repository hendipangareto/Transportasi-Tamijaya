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
                        <li class="breadcrumb-item active">Penerimaan
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
                            <h4 class="card-title">List Penerimaan</h4>
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
                            <input type="hidden" id="tablesPenerimaan" value="{{$data->count()}}">
                            <table class="table datatables table-bordered table-hover"
                                   id="table-penerimaan-menu-keuangan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Kode Bank</th>
                                    <th class="w-10p">Nama Bank</th>
                                    <th class="w-5p">Tanggal</th>
                                    <th class="w-10p">Nominal (Rp)</th>
                                    <th class="w-10p">Nama PIC</th>
                                    <th class="w-10p">Deskripsi</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->bank_code}}</td>
                                        <td>{{$item->bank_name}}</td>
                                        <td>{{$item->tanggal_penerimaan}}</td>
                                        <td>{{'Rp'.number_format($item->nominal)}}</td>
                                        <td>{{$item->pic_name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#modal-detail-penerimaan{{$item->id}}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                    data-toggle="modal" title="edit"
                                                    data-target="#modal-edit-penerimaan{{$item->id}}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer delete-penerimaan"
                                                    data-id="{{ $item->id }}" title="delete">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">Data tidak ditemukan</td>
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

    @include('admin.finance-accounting.menu-keuangan.finance.penerimaan.modal')
@endsection

@push('page-scripts')
    <script>

        function openModal() {
            $("#modal-add-penerimaan").modal('show');
        }

        $(function () {
            if (parseInt($("#tablesPenerimaan").val()) > 0) {
                $("#table-penerimaan-menu-keuangan").DataTable();
            }
        });

        $(document).ready(function () {
            $('#bank_id').change(function () {
                var bankCode = $(this).val();

                if (bankCode) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('finance-accounting-menu-keuangan-finance-penerimaan-get-bank_code') }}",
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

        $(".delete-penerimaan").click(function (e) {
            e.preventDefault()
            var penerimaanId = $(this).data('id');
            console.log(penerimaanId)
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
                        url: '{{ route('finance-accounting-menu-keuangan-finance-penerimaan-delete') }}',
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': penerimaanId
                        },
                        success: function (response) {
                            location.reload();
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil menghapus data penerimaan"
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
