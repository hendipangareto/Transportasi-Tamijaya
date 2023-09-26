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
                        <li class="breadcrumb-item active">Master Data Aset
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
                            <h2 class="h4 ">Data Master Data Aset</h2>
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
                                    <a href="{{ route('master-keuangan.aset.data-aset.tambah-data-aset') }} "
                                       class="btn btn-primary mr-1">
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
                                    <label for="">Akun</label>
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
                        <table class="table table-bordered table-hover" id="table-aset">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <th class="w-2p">No</th>
                                <th class="w-2p">Id Aset</th>
                                <th class="w-10p">Nama Aset</th>
                                <th class="w-10p">Kategori Aset</th>
                                <th class="w-10p">Merk</th>
                                <th class="w-10p">Spesifikasi</th>
                                <th class="w-10p">Kuantitas</th>
                                <th class="w-10p">Satuan</th>
                                <th class="w-3p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($DataAset as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $item->kode_aset }}</td>
                                    <td>{{ $item->nama_aset}}</td>
                                    <td>{{ $item->kategori_aset}}</td>
                                    <td>{{ $item->merk_aset}}</td>
                                    <td>{{ $item->spesifikasi_aset}}</td>
                                    <td>{{ $item->catatan_aset}}</td>
                                    <td>{{ $item->tanggal_beli_aset}}</td>
{{--                                    <td>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailKategori-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-info-circle font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#UpdateKategori-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-edit font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('master-keuangan.aset.delete-kategori-aset', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm delete-button"><i class="bx bx-trash"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#DetailDataAset-{{ $item->id }}">
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
                                    <td colspan="9" class="text-center">Tidak ada data aset.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.master-keuangan.aset.data-aset.modal-edit')
    @include('admin.master-keuangan.aset.data-aset.modal-detail')
{{--    @include('admin.master-keuangan.aset.data-aset.modal-tambah')--}}
@endsection

@push('page-scripts')
    <script>


        $(document).ready(function () {
            $("#table-aset").DataTable();
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



        function previewFile() {
            const fileInput = document.getElementById('lampiran_aset');
            const filePreview = document.getElementById('file-preview');

            // Check if a file is selected
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];

                // Check if the selected file is an image (you can add more file types if needed)
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        // Create an <img> element to display the image preview
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-preview');

                        // Append the image preview to the filePreview div
                        filePreview.innerHTML = '';
                        filePreview.appendChild(img);
                    };

                    // Read the file as a data URL (for images)
                    reader.readAsDataURL(file);
                } else {
                    // Display a message for non-image files (you can customize this message)
                    filePreview.innerHTML = 'File preview is not available for this file type.';
                }
            } else {
                // Clear the file preview if no file is selected
                filePreview.innerHTML = '';
            }
        }

    </script>

@endpush
