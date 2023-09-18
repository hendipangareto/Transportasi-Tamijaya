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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#kategoriBarang"><i class="bx bx-plus-circle"></i>Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-2" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-kategori-logistik">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-3p">ID Kategori</th>
                                    <th class="w-10p">Nama Kategori</th>
                                    <th class="w-10p">Deskripsi</th>
                                    <th class="w-10p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($kategori as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->kode_kategori }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>{{ $item->deskripsi_kategori }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal"
                                               data-target="#"><i class="bx bx-info-circle"></i></a>
                                            <a href="#" class="btn btn-outline-warning" data-toggle="modal"
                                               data-target="#EditkategoriBarang-{{ $item->id }}"><i
                                                    class="bx bx-edit"></i></a>
                                            <a href="{{ route('master-logistik.delete-kategori-barang', ['id' => $item->id]) }}"
                                               class="btn btn-outline-danger delete-button"><i class="bx bx-trash"></i></a>
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

        //konfimarsi delete
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('delete-button')) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data (" {{ $item->nama_kategori }} ") akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.target.href;
                    }
                });
            }
        });

    </script>

@endpush
