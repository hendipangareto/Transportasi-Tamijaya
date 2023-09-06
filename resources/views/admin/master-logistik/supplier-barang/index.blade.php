@extends('admin.layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #4bdce8">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Data Supplier Barang</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#SupllierBarang"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <form action="" method="">
                            <div class="table-responsive mt-2" id="table-supplier">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">Kode</th>
                                        <th class="w-3p">Nama</th>
                                        <th class="w-3p">Alamat</th>
                                        <th class="w-10p">Kontak</th>
                                        <th class="w-10p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($supplier as $item)
                                        <tr class="text-center">
                                            <td>{{$no++}}</td>
                                            <td>{{ $item->code_supplier }}</td>
                                            <td>{{ $item->nama_supplier }}</td>
                                            <td>{{ $item->alamat_supplier }}</td>
                                            <td>{{ $item->kontak_supplier }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                   data-target="#DetailSupllierBarang"><i class="bx bx-detail"></i></a>
                                                <a href="#" class="btn btn-warning" data-toggle="modal"
                                                   data-target="#EditBarang"><i class="bx bx-edit"></i></a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                   data-target="#"><i class="bx bx-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center" style="background-color: #c2b677">Data
                                                tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.master-logistik.supplier-barang.modal')
    @include('admin.master-logistik.supplier-barang.modal-detail')
    @include('admin.master-logistik.supplier-barang.modal-edit')
@endsection
@push('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.table-supplier').DataTable();
        });
    </script>
@endpush


