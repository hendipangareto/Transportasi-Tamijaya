@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 ">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Keuangan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Kategori Aset
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 ">Data Master Kategori Aset</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4"></h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="#"
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahKategoriAset">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                    <a target="_blank"
                                       href=" "
                                       type="button"
                                       class="btn btn-danger text-white mr-1">
                                        <i class="bx bxs-file-pdf"></i> Report PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Tipe Aset :</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-outline-primary">Filter <i
                                            class="bx bx-filter"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value="">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <th class="w-2p">No</th>
                                <th class="w-2p">Id Kategori Aset</th>
                                <th class="w-2p">Tipe Aset</th>
                                <th class="w-10p">Kategori Aset</th>
                                <th class="w-10p">Deskripsi</th>
                                <th class="w-3p">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">
                            <tr class="text-center">
                                <td>1</td>
                                <td>1101</td>
                                <td>1101</td>
                                <td>Mobil Pickup</td>
                                <td>Kendaraan</td>
                                <td>
                                    <a href=""
                                       class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                       data-target="#DetailKategoriAset"><i
                                            class="bx bx-info-circle font-size-base"></i>
                                    </a>
                                    <a href=""
                                       class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                       data-target="#EditKategoriAset"><i
                                            class="bx bx-pencil font-size-base"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger btn-delete-employee "
                                            data-iddelete=""><i class="bx bx-trash font-size-base"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.master-keuangan.aset.kategori-aset.modal-tambah')
    @include('admin.master-keuangan.aset.kategori-aset.modal-detail')
    @include('admin.master-keuangan.aset.kategori-aset.modal-edit')
    {{--    @include('admin.master-keuangan.aset.data-aset.modal-tambah')--}}
@endsection

@push('page-scripts')
    <script>


        $(document).ready(function () {
            $("#table-employee").DataTable();
        });

    </script>

@endpush

