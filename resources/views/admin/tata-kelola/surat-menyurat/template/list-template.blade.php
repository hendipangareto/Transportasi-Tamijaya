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
                            <h4 class="card-title" style="color: black"><b>Data Master </b>| <i
                                    class="bx bx-mail-send"></i> Template Surat</h4>

                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#TambahTemplate"><i class="bx bx-plus-circle"></i>Tambah Data</a>
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
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#DetailSurat-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <a href="{{ route('data-kelola.surat-menyurat.download-pdf', ['filename' => $item->lampiran_dokumen]) }}"
                                                   class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
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

    @include('admin.tata-kelola.surat-menyurat.template.modal')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#surat-menyurat").DataTable();
        });



        function previewFile() {
            var preview = document.querySelector('#file-preview');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                var img = document.createElement('img');
                img.src = reader.result;
                img.style.maxWidth = '100%';
                preview.innerHTML = '';
                preview.appendChild(img);
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>

@endpush
