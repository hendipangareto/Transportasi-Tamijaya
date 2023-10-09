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
                        <li class="breadcrumb-item active">Master Tata Kelola
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
                            <h4 class="card-title" style="color: black"><b>Data Master </b>| <i class="bx bx-mail-send"></i> Tata Kelola</h4>

                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#TambahSurat"><i class="bx bx-plus-circle"></i>Tambah Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content mt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="surat-menyurat">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-4p">Nama Surat</th>
                                    <th class="w-4p">Deskripsi</th>
                                    <th class="w-2p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($surat as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $item->nama_surat }}</td>
                                        <td>{{ $item->deskripsi }}</td>

                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#DetailSurat-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <a href="{{ route('download-pdf', ['filename' => $item->lampiran_dokumen]) }}" class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                      >
                                                    <i class="bx bx-download font-size-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data tata kelola !</td>
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

@include('admin.tata-kelola.surat-menyurat.modal')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#surat-menyurat").DataTable();
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
            const fileInput = document.getElementById('lampiran_dokumen');
            const filePreview = document.getElementById('file-preview');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.type.startsWith('image/')) {
                    // Display image preview
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '30%';
                        img.style.height = 'auto';

                        filePreview.innerHTML = '';
                        filePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    // Display PDF preview
                    const object = document.createElement('object');
                    object.data = URL.createObjectURL(file);
                    object.type = 'application/pdf';
                    object.width = '100%';


                    filePreview.innerHTML = '';
                    filePreview.appendChild(object);
                } else {
                    filePreview.innerHTML = 'File preview is not available for this file type.';
                }
            } else {
                filePreview.innerHTML = '';
            }
        }


    </script>

@endpush
