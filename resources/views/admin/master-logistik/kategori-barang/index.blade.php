@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Logistik</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Kategori
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
                            <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Kategori Barang</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <div class="card-header" >
                            <div class="toolbar row ">
                                <div class="col-md-12 d-flex">
                                    <h2 class="h4"> </h2>
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                               data-target="#kategoriBarang"><i class="bx bx-plus-circle"></i>Tambah Data</a>
                                            <a target="_blank" href="{{ route('master-logistik.cetak-pdf-kategori-barang') }}" class="btn btn-danger mr-1"><i class="bx bx-printer"></i>Report PDF </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-kategori-logistik">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-4p">Kode Kategori</th>
                                    <th class="w-4p">Nama Kategori</th>
{{--                                    <th class="w-4p">Deskripsi</th>--}}
                                    <th class="w-2p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($kategori as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->kode_kategori }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
{{--                                        <td>{{ $item->deskripsi_kategori }}</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal"--}}
{{--                                               data-target="#DetailKategori-{{ $item->id }}"><i class="bx bx-info-circle"></i></a>--}}
{{--                                            <a href="#" class="btn btn-outline-warning" data-toggle="modal"--}}
{{--                                               data-target="#EditkategoriBarang-{{ $item->id }}"><i--}}
{{--                                                    class="bx bx-edit"></i></a>--}}
{{--                                            <a href="{{ route('master-logistik.delete-kategori-barang', ['id' => $item->id]) }}"--}}
{{--                                               class="btn btn-outline-danger delete-button"><i class="bx bx-trash"></i></a>--}}
{{--                                        </td>--}}
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#DetailKategori-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#EditkategoriBarang-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                     data-id="{{ $item->id }}">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data kategori.</td>
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

    @include('admin.master-logistik.kategori-barang.modal')
    @include('admin.master-logistik.kategori-barang.modal-edit')
@endsection
@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-kategori-logistik").DataTable();
        });

        //menampilkan sweetalert2
        @if(session('pesan-berhasil'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("pesan-berhasil") }}'
        });
        @elseif(session('pesan-gagal'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session("pesan-gagal") }}'
        });
        @endif

        $(document).ready(function () {
            $('.delete-button').click(function () {
                var employeeId = $(this).data('id');

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
                            url: '{{ route('master-logistik.delete-kategori-barang') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'employee_id': employeeId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data gaji karyawan"
                                });
                            },
                            error: function (error) {
                                console.log(err);
                            }
                        });
                    }
                });
            });
        });

    </script>

@endpush
