@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Umum</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Data Master Status
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
                    <div class="toolbar row">
                        <div class="col-md-12 d-flex">
                            <h2 class="card-title">Data Master Status</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#TambahModalStatus">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
                                    </button>
                                    <a target="_blank"
                                       href="#"
                                       type="button"
                                       class="btn btn-danger text-white">
                                        <i class="bx bxs-file-pdf"></i> Report Pdf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        {{--                        <form action="">--}}
                        {{--                            @csrf--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-md-2 col-sm-12">--}}
                        {{--                                    <div class="form-group">--}}
                        {{--                                        <label for="">Metode Penyusutan</label>--}}
                        {{--                                        <input type="text" class="form-control">--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 col-sm-12">--}}
                        {{--                                    <div class="form-group">--}}
                        {{--                                        <label for="" style="color: white">Filter</label><br>--}}
                        {{--                                        <button class="btn btn-outline-primary">Filter <i--}}
                        {{--                                                class="bx bx-filter"></i></button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-master-status-hrd">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Kode Status</th>
                                    <th class="w-5p">Status</th>
                                    <th class="w-25p">Deskripsi</th>
                                    <th class="w-5p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($status as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->status_code }}</td>
                                        <td>{{ $item->status_name }}</td>
                                        <td>{{ $item->status_description }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#DetailModalStatus-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#UpdateModalStatus-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer btn-delete-statuss"
                                                    data-id="{{ $item->id }}" title="delete">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Data tidak ditemukan</td>
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

    @include('admin.human-resource.status.modal-tambah')
    @include('admin.human-resource.status.modal-detail')
    @include('admin.human-resource.status.modal-edit')
    {{--    @include('admin.master-keuangan.aset.data-aset.modal-tambah')--}}
@endsection

@push('page-scripts')
    <script>

        $(document).ready(function () {
            $("#table-master-status-hrd").DataTable();
        });

        // Delete
        $("#table-master-status-hrd").on('click', '.btn-delete-statuss', function () {
            var statusId = $(this).data('id');
            console.log(statusId)
            Swal.fire({
                title: "Yakin hapus data ini?",
                text: "Data yang dihapus tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('human-resource-status-delete')}}",
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': statusId
                        },
                        success: function (response) {
                            location.reload();
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil menghapus data status"
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
