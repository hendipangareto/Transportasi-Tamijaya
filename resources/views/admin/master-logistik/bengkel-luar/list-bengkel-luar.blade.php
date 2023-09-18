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
                        <li class="breadcrumb-item active">Master Bengkel Luar
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
            <div class="card shadow">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 ">Data Master Bengkel Luar</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" >
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4"> </h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href=" "
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahBengkel">
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
                                    <label for="">Provinsi/Kota:</label>
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
                        <table class="table table-bordered table-hover" id="table_sub_bagian">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <td class="w-2p">No</td>
                                <th class="w-2p">Kode Bengkel</th>
                                <th class="w-10p">Nama Bengkel</th>
                                <th class="w-10p">Nomor Telepon</th>
                                <th class="w-10p">Nomor HP</th>
                                <th class="w-10p">PIC</th>
                                <th class="w-10p">Alamat</th>
                                <th class="w-10p">Provinsi/Kota</th>
                                <th class="w-3p">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">
                            <tr class="text-center">
                            @forelse ($BengkelLuar as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_bengkel_luar }} </td>
                                    <td>{{ $item->nama_bengkel_luar }} </td>
                                    <td>{{ $item->hp_bengkel_luar }} </td>
                                    <td>{{ $item->tlp_bengkel_luar }} </td>
                                    <td>{{ $item->pic_bengkel_luar }} </td>
                                    <td>{{ $item->alamat_bengkel_luar }} </td>
                                    <td>{{ $item->province }} - {{ $item->city }} </td>
                                    <td>
                                        <a href=""
                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailBengkelLuar-{{ $item->id }}"><i
                                                class="bx bx-info-circle font-size-base"></i>
                                        </a>
                                        <a href=""
                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#EditBengkel"><i
                                                class="bx bx-pencil font-size-base"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger btn-delete-employee "
                                                data-iddelete=""><i class="bx bx-trash font-size-base"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data bengkel luar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.master-logistik.bengkel-luar.modal-tambah')
    @include('admin.master-logistik.bengkel-luar.modal-detail')
    @include('admin.master-logistik.bengkel-luar.modal-edit')
@endsection

@push('page-scripts')
    <script>


        $(document).ready(function () {
            $("#table-employee").DataTable();
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
