@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Keuangan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Tipe Aset
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
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>Data Master </b>| Tipe Aset</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#TambahTipeAset"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-hover" id="table-satuan">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-10p">Kode Tipe Aset</th>
                                    <th class="w-4p">Nama Tipe Aset</th>
                                    <th class="w-4p">Deskripsi Tipe Aset</th>
                                    <th class="w-2p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($TipeAset as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item -> kode_tipe_aset}}</td>
                                        <td>{{$item->nama_tipe_aset}}</td>
                                        <td>{{$item->deskripsi_tipe_aset}}</td>
{{--                                        <td>--}}
{{--                                            <a href=""--}}
{{--                                               class="btn btn-sm btn-outline-primary" data-toggle="modal"--}}
{{--                                               data-target="#DetailTipeAset-{{ $item->id }}"><i--}}
{{--                                                    class="bx bx-info-circle font-size-base"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href=""--}}
{{--                                               class="btn btn-sm btn-outline-warning" data-toggle="modal"--}}
{{--                                               data-target="#EditTipeAset-{{ $item->id }}"><i--}}
{{--                                                    class="bx bx-edit font-size-base"></i>--}}
{{--                                            </a>--}}

{{--                                            <a href="{{ route('master-keuangan.aset.delete-tipe-aset', ['id' => $item->id]) }}"--}}
{{--                                               class="btn btn-outline-danger btn-sm delete-button"><i--}}
{{--                                                    class="bx bx-trash"></i></a>--}}
{{--                                        </td>--}}
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#DetailTipeAset-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#EditTipeAset-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <a class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                                   href="{{ route('master-keuangan.aset.delete-tipe-aset', ['id' => $item->id]) }}">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data satuan.</td>
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

    @include('admin.master-keuangan.aset.tipe-aset.modal-tambah')
    @include('admin.master-keuangan.aset.tipe-aset.modal-edit')
    @include('admin.master-keuangan.aset.tipe-aset.modal-detail')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-satuan").DataTable();
        });


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


        //konfimarsi delete
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('delete-button')) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi penghapusan, lanjutkan ke tautan penghapusan
                        window.location.href = e.target.href;
                    }
                });
            }
        });
    </script>

@endpush
