@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Surat Menyurat</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Tata Kelola
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
                            <h6 class="card-title" style="color: black"><b>Surat Menyurat</b>| <i
                                    class='bx bx-envelope'></i>Dokumen Final</h6>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">

                    <div class="col-lg">
                        <div class="demo-inline-spacing ">
                            <div class="list-group list-group-horizontal-md text-md-center">
                                <a class="list-group-item list-group-item-action active" id="prestasi-pegawai"
                                   data-bs-toggle="list" href="#horizontal-home">Surat Masuk</a>
                                <a class="list-group-item list-group-item-action" id="profile-list-item"
                                   data-bs-toggle="list" href="#horizontal-profile">Surat Keluar</a>
                                <a class="list-group-item list-group-item-action" id="profile-list-item"
                                   data-bs-toggle="list" href="#dokumen-final">Kontrak</a>
                            </div>

                            <div class="tab-content px-0 mt-0">
                                <div class="tab-pane fade show active" id="horizontal-home">
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href="" class="btn btn-danger mr-1" data-toggle="modal"
                                               data-target="#TambahSurat"><i class="bx bx-archive-in"></i>Archieve Data</a>
                                            <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                               data-target="#TambahSuratMasuk"><i class="bx bx-plus-circle"></i>Tambah
                                                Data</a>
                                        </div>
                                    </div>
                                    <h6 class="mt-2">Surat Masuk</h6>
                                    @include('admin.tata-kelola.surat-menyurat.dokumen-final.surat-masuk.modal')
                                </div>

                                <div class="tab-pane fade" id="horizontal-profile">
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href="" class="btn btn-danger mr-1" data-toggle="modal"
                                               data-target="#TambahSurat"><i class="bx bx-archive-in"></i>Archieve Data</a>
                                            <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                               data-target="#TambahSuratKeluar"><i class="bx bx-plus-circle"></i>Tambah
                                                Data</a>
                                        </div>
                                    </div>
                                    <h6 class="mt-2">Surat Keluar</h6>
                                    @include('admin.tata-kelola.surat-menyurat.dokumen-final.surat-keluar.modal')
                                </div>
                                <div class="tab-pane fade" id="dokumen-final">
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href="" class="btn btn-danger mr-1" data-toggle="modal"
                                               data-target="#TambahSurat"><i class="bx bx-archive-in"></i>Archieve Data</a>
                                            <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                               data-target="#TambahKontrak"><i class="bx bx-plus-circle"></i>Tambah
                                                Data</a>
                                        </div>
                                    </div>
                                    <h6 class="mt-2">Kontrak</h6>
                                    @include('admin.tata-kelola.surat-menyurat.dokumen-final.kontrak.modal')
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{--    @include('admin.human-resource.pegawai.request-gaji.form-detail')--}}
@endsection

@push('page-scripts')
    <script>
        // Initialize DataTables when '#Tablesemployee' has a valid value
        $(function () {
            if (parseInt($("#Tablesemployee").val()) > 0) {
                $("#table-list-employees").DataTable();
            }
        });

        // Initialize DataTable for '#table-surat-masuk'
        $(document).ready(function () {
            $("#table-surat-masuk").DataTable();
        });

        // Handle success and error messages using Swal
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

        // Handle delete button click
        $(document).ready(function () {
            $('.delete-button').click(function () {
                var dokumenId = $(this).data('id');

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
                            url: '{{ route('data-kelola.surat-menyurat.delete-dokumen-final') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'dokumen_final_id': dokumenId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data gaji karyawan"
                                });
                            },
                            error: function (error) {
                                console.log(error); // Change 'err' to 'error'
                            }
                        });
                    }
                });
            });
        });

        // Add your 'changeDeparment' function here with the correct URL

        // Initialize DataTable for '#table-employee'
        $(document).ready(function () {
            $("#table-employee").DataTable();
        });

        // Initialize tabs
        $(document).ready(function () {
            $('#home-list-item').tab('show');
            $('.list-group-item').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });

        // Add your 'previewFile' function here

        // Handle delete button click for surat keluar
        $(document).ready(function () {
            $('.delete-data').click(function () {
                var SuratKeluarId = $(this).data('id');

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
                            url: '{{ route('data-kelola.surat-menyurat.delete-surat-keluar') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'keluar_surat_id': SuratKeluarId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data gaji karyawan"
                                });
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });


    </script>
@endpush




