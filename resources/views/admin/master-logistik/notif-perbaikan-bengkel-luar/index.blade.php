@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Logistik</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Perbaikan Bengkel Luar
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
                            <h4 class="card-title">Perbaikan Bengkel Luar</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            .<table class="table datatables table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Armada</th>
                                    <th class="w-10p">Bagian</th>
                                    <th class="w-15p">Keluhan</th>
                                    <th class="w-15p">Nama Bengkel Luar</th>
                                    <th class="w-5p">Tanggal Masuk</th>
                                    <th class="w-5p">Estimasi Harga (Rp)</th>
                                    <th class="w-5p">Estimasi Waktu Selesai</th>
                                    <th class="w-5p">Ajukan</th>
                                    <th class="w-5p">Approval</th>
                                    <th class="w-5p">Status</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" >
                                                <i class="bx bx-edit font-size-base"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
@endpush
