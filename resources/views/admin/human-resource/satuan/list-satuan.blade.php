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
                        <li class="breadcrumb-item active">Data Master Satuan
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
                            <h4 class="card-title">List Data Satuan</h4>
                            <div class="col ml-auto">
                                <div class="float-right">
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#TambahSatuan"><i class="bx bx-plus-circle"></i> Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-satuan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Kode Satuan</th>
                                    <th class="w-20p">Nama Satuan</th>
                                    <th class="w-25p">Deskripsi</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($satuan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item -> kode_satuan}}</td>
                                        <td>{{$item->nama_satuan}}</td>
                                        <td>{{$item->deskripsi_satuan}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#DetailSatuan-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#EditSatuan-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer btn-delete-satuans"
                                                    data-id="{{ $item->id }}" title="delete">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
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

    @include('admin.human-resource.satuan.modal-tambah')
    @include('admin.human-resource.satuan.modal-detail')
    @include('admin.human-resource.satuan.modal-edit')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-satuan").DataTable();
        });

        $(".btn-delete-satuans").click(function (e) {
            e.preventDefault()
            var satuanId = $(this).data('id');
            console.log(satuanId)
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
                        url: '{{route('human-resource.status.delete')}}',
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': satuanId
                        },
                        success: function (response) {
                            location.reload();
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil menghapus data satuan"
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
