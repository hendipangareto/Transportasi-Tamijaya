@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Booking Transaction</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reservasi Transaksi
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
                <div class="card-header  pb-0  d-flex justify-content-between">
                    <h4 class="card-title">Detail Transaksi : R018233</h4>
                    <button class="btn btn-warning"><i class="bx bx-arrow-back mr-1"></i>Kembali</button>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <div class="alert bg-rgba-primary">
                            <div class="row">
                                <style>
                                    .table-order thead tr th {
                                        padding-top: 10px;
                                        padding-bottom: 10px;
                                        font-size: 12px;
                                    }

                                    .customer-detail tbody tr td {
                                        padding-top: 2px;
                                        padding-bottom: 2px;
                                        font-size: 12px;
                                    }

                                </style>
                                <div class="col-md-4">
                                    <div class="d-block">
                                        <i class="bx bx-bus align-middle" style="font-size: 24px"></i>
                                        <div class="badge badge-primary " style="padding-right: 5px;padding-left:5px">
                                            SUITESS</div>
                                        {{-- <h6 for="" class="mt-1 font-weight-bold">UGHSKOSIS</h6> --}}
                                    </div>

                                    <table class="table-borderless mb-0 customer-detail">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Total</td>
                                                <td>:</td>
                                                <td>Rp. 2.200.000</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Terbayar</td>
                                                <td>:</td>
                                                <td>0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn-sm btn btn-outline-primary px-1"><i
                                                class="bx bx-printer"></i>Cetak Tiket</button>
                                        <button class="btn-sm btn btn-outline-primary px-1"><i
                                                class="bx bx-money"></i>Pembayaran</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <table class="table-borderless mb-0 customer-detail">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Pemesan</td>
                                                <td>:</td>
                                                <td>Johanes Adhitya Hartanto</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">No Telepon</td>
                                                <td>:</td>
                                                <td>08783276126</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Tanggal</td>
                                                <td>:</td>
                                                <td>7 Maret 2022</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Pukul</td>
                                                <td>:</td>
                                                <td>10.45 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table-borderless mb-0 customer-detail">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Dari</td>
                                                <td>:</td>
                                                <td>Jogja - Garasi Tinosidin</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Tujuan</td>
                                                <td>:</td>
                                                <td>Bali - Garasi Denpasar</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Jadwal</td>
                                                <td>:</td>
                                                <td>SCH-0399123</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Keterangan</td>
                                                <td>:</td>
                                                <td>Jalan sana sini</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Kursi yang di pesan</h6>
                                <table class="table table-resposinve table-bordered  table-order mb-0">
                                    <thead>
                                        <tr>
                                            <th class="w-10p">No.</th>
                                            <th class="w-25p">Kode</th>
                                            <th class="w-25p text-right">Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="badge badge-success "
                                                    style="padding-right: 5px;padding-left:5px">
                                                    6A</div>
                                            </td>
                                            <td>R0291383</td>
                                            <td class="text-right">550.000</td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn-sm btn btn-outline-primary py-0"
                                                        style="padding-left:12px;padding-right:12px"><i
                                                            class="bx bx-printer"></i>Cetak</button>
                                                    <button class="btn-sm btn btn-outline-warning py-0"
                                                        style="padding-left:12px;padding-right:12px"><i
                                                            class="bx bx-money"></i>Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6>Booking History</h6>
                                <table class="table table-resposinve table-bordered  table-order mb-0">
                                    <thead>
                                        <tr>
                                            <th class="w-35p">Tanggal/Jam</th>
                                            <th>Deskripsi</th>
                                            <th class="w-25p">User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>20 Mar 2022 - 08:40</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
@endpush
