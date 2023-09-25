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
                        <li class="breadcrumb-item active">Master Metode Penyusutan
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
                            <h2 class="h4 ">Data Master Metode Penyusutan</h2>
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
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahMetodePenyusutan">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                    <a target="_blank"
                                       href="{{ route('master-keuangan.metode-penyusutan.cetak-pdf') }}"
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
{{--                    <form action="">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-2 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Metode Penyusutan</label>--}}
{{--                                    <input type="text" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="" style="color: white">Filter</label><br>--}}
{{--                                    <button class="btn btn-outline-primary">Filter <i--}}
{{--                                            class="bx bx-filter"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table-bagian">
                            <thead>
                            <tr class="text-center">
                                <th class="w-2p">No</th>
                                <th class="w-10p">Kode Penyusutan</th>
                                <th class="w-4p">Metode Penyusutan</th>
                                <th class="w-4p">Keterangan</th>
                                <th class="w-10p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($MetodePenyusutan as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $item->kode_metode_penyusutan }}</td>
                                    <td>{{ $item->nama_metode_penyusutan }}</td>
                                    <td>{{ $item->keterangan_metode_penyusutan}}</td>

                                    <td>
                                        <a href=""
                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailMetodePenyusutan-{{ $item->id }}"><i
                                                class="bx bx-info-circle font-size-base"></i>
                                        </a>
                                        <a href=""
                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#UpdateMetodePenyusutan-{{ $item->id }}"><i
                                                class="bx bx-edit font-size-base"></i>
                                        </a>
                                        <a href="{{ route('master-keuangan.metode-penyusutan.delete-metode-penyusutan', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm delete-button"><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data metode penyusutan!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.master-keuangan.metode-penyusutan.modal-tambah')
    @include('admin.master-keuangan.metode-penyusutan.modal-detail')
    @include('admin.master-keuangan.metode-penyusutan.modal-edit')
    {{--    @include('admin.master-keuangan.aset.data-aset.modal-tambah')--}}
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
