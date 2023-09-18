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
                        <li class="breadcrumb-item active">Master Toko
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
                    <h4 class="card-title" style="color: black"><b>Data Master </b>| Toko</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#TambahBagian"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-hover" id="table-bagian">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-4p">Kode Bagian</th>
                                    <th class="w-4p">Nama Bagian</th>
                                    <th class="w-4p">Deskripsi</th>
                                    <th class="w-4p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($toko as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->kode_bagian }}</td>
                                        <td>{{ $item->nama_bagian }}</td>
                                        <td>{{ $item->deskripsi_bagian }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal"
                                               data-target="#DetailBagian-{{ $item->id }}"><i class="bx bx-info-circle"></i></a>
                                            <a href="#" class="btn btn-outline-warning" data-toggle="modal"
                                               data-target="#EditBagian-{{ $item->id }}"><i class="bx bx-edit"></i></a>
                                            {{--                                                <a href="{{ route('admin.master-logistik.bagian.delete-bagian', $item->id) }}" class="btn btn-outline-danger"><i class="bx bx-trash"></i></a>--}}
                                            <a href="{{ route('admin.master-logistik.bagian.delete-bagian', ['id' => $item->id]) }}"
                                               class="btn btn-outline-danger btn-sm delete-button"><i
                                                    class="bx bx-trash"></i></a>

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

{{--    @include('admin.master-logistik.bagian.modal-tambah')--}}
{{--    @include('admin.master-logistik.bagian.modal-edit')--}}
{{--    @include('admin.master-logistik.bagian.modal-detail')--}}
{{--    @include('admin.master-logistik.bagian.modal-delete')--}}
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
