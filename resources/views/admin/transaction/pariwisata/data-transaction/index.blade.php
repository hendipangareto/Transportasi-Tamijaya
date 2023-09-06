@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Data Transaksi</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Pariwisata
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
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4 class="card-title">Data Transaksi Pariwisata</h4>
                    <div class="d-flex">
                        <button onclick="filterData()" type="button" class="btn btn-outline-warning mr-1 "><i
                                class="bx bx-filter-alt"></i><span class="align-middle ml-25">Filter</span></button>
                        <button onclick="archieveData()" type="button" class="btn btn-outline-danger mr-1 "><i
                                class="bx bx-folder"></i><span class="align-middle ml-25">Archieve</span></button>
                        <button onclick="exportData()" type="button" class="btn btn-outline-primary mr-1 "><i
                                class="bx bx-export"></i><span class="align-middle ml-25">Export</span></button>
                    </div>
                </div>
                <style>
                    .table-transaction thead tr th {
                        font-size: 10px !important;
                        padding-top: 15px;
                        padding-bottom: 15px;
                    }

                    .table-transaction tbody tr td {
                        font-size: 12px !important;
                    }

                </style>
                <div class="card-content pt-1">
                    <div class="card-body px-1">
                        <table class="table table-bordered table-hover table-transaction" id="table-all-transaction">
                            <thead>
                                <tr>
                                    <th class="w-5p">No</th>
                                    <th class="w-10p">Kode</th>
                                    <th class="w-20p">Customer</th>
                                    <th class="w-15p">Armada</th>
                                    <th>Departure</th>
                                    <th class="w-12p text-right">Nominal</th>
                                    <th class="w-8p">Status</th>
                                    <th class="w-5p text-center">Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all_transactions as $key => $item)
                                    <tr>
                                        <td class="w-5p">{{ $key + 1 }}</td>
                                        <td class="w-10p">{{ $item->booking_transactions_code }}
                                        </td>
                                        <td class="w-20p">{{ $item->customer_name }}</td>
                                        <td class="w-15p">{{ $item->armada }}</td>
                                        <td >{{ $item->date_departure }}</td>
                                        <td class="w-12p text-right">
                                            Rp. {{ number_format($item->booking_transactions_total_costs) }}
                                        </td>
                                        <td class="w-8p">{{ $item->status_name }}
                                        </td>
                                        <td class="w-5p text-center">
                                            <div class="dropdown">
                                                <span
                                                    class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    role="menu">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <label class="dropdown-item pointer"
                                                        onclick="openModal('pariwisata-transaction','detail', {{ $item->id }})"><i
                                                            class="bx bx-info-circle mr-1"></i> detail</label>
                                                    <label class="dropdown-item pointer"
                                                        onclick="openModal('pariwisata-transaction','edit', {{ $item->id }})"><i
                                                            class="bx bx-edit-alt mr-1"></i> edit</label>
                                                    <label class="dropdown-item pointer"
                                                        onclick="manageData('delete', {{ $item->id }})"><i
                                                            class="bx bx-trash mr-1"></i>
                                                        delete</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak terdapat data transaksi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.transaction.pariwisata.data-transaction.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/transaction/display-pariwisata.js') }}"></script>
@endpush
