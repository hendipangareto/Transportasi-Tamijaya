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
                        <li class="breadcrumb-item active">Master Bagian
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
                    <h4 class="card-title" style="color: black"><b>Data Master </b>| Bagian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal" data-target="#TambahKomponen"><i class="bx bx-plus-circle"></i>   Tambah Data</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2"  >
                            <table class="table table-bordered table-hover" id="table-bagian">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-4p">Kode Komponen</th>
                                    <th class="w-4p">Nama Komponen</th>
                                    <th class="w-4p">Sub Bagian</th>
                                    <th class="w-4p">Deskripsi Komponen</th>
                                    <th class="w-4p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($komponen as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_komponen}} </td>
                                        <td>{{ $item->nama_komponen}}</td>
                                        <td>{{ $item->sub_bagian}}</td>
                                        <td>{{ $item->deskripsi_komponen}}</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailKomponen"><i
                                                    class="bx bx-info-circle font-size-base"></i>
                                            </a>
                                            <a href=""
                                               class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#EditKomponen"><i
                                                    class="bx bx-pencil font-size-base"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger btn-delete-employee "
                                                    data-iddelete=""><i class="bx bx-trash font-size-base"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data bagian.</td>
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

    @include('admin.master-logistik.komponen.modal-tambah')

@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-bagian").DataTable();
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
        document.addEventListener('click', function(e) {
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
