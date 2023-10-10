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
                        <li class="breadcrumb-item active">Master Sub-Akun
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
                            <h2 class="h4 ">Data Master Sub-Akun</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href=" "
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahSubAkun">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                    <a target="_blank" href="{{ route('admin.master-keuangan.sub-akun.cetak-pdf') }}?akun={{ request()->input('id_akun') }}" type="button" class="btn btn-danger text-white mr-1">
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
                                    <label for="">Akun :</label>
                                    <div class="form-group">
                                        <select name="id_akun" id="id_akun" class="form-control">
                                            <option selected disabled>Pilih Akun</option>
                                            @foreach($akun as $ak)
                                                @php
                                                    $selected = ($params['id_akun'] == $ak->id) ? "selected" : "";
                                                @endphp
                                                <option value="{{$ak->id}}" {{$selected}}>{{$ak->nama_akun}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-outline-primary">Filter <i
                                            class="bx bx-filter"></i></button>
                                    <a href="{{ route('master-keuangan.sub-akun.list-sub-akun') }}"
                                       class="btn btn-outline-warning">Clear <i
                                            class="bx bx-filter"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive"  >
                        <table class="table table-bordered table-hover" id="table-bagian">
                            <thead>
                            <tr class="text-center">
                                <th class="w-2p">No</th>
                                <th class="w-4p">Kode Sub Akun</th>
                                <th class="w-4p">Nama Sub-Akun</th>
                                <th class="w-4p">Akun</th>
                                <th class="w-4p">Deskripsi</th>
                                <th class="w-2p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($SubAkun as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $item->kode_sub_akun }}</td>
                                    <td>{{ $item->nama_sub_akun }}</td>
                                    <td>{{ $item->akun}}</td>
                                    <td>{{ $item->deskripsi_sub_akun}}</td>
{{--                                    <td>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailSubAkun-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-info-circle font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#UpdateSubBagian-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-edit font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('admin.master-logistik.bagian.delete-sub-bagian', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm delete-button"><i class="bx bx-trash"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#DetailSubAkun-{{ $item->id }}">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#UpdateSubBagian-{{ $item->id }}">
                                                <i class="bx bx-edit font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                 data-id="{{ $item->id }}">
                                                <i class="bx bx-trash font-size-base"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data sub bagian.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@include('admin.master-keuangan.sub-akun.modal-tambah')

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
        $(document).ready(function () {
            $('.delete-button').click(function () {
                var subakunId = $(this).data('id');

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
                            url: '{{ route('admin.master-keuangan.sub-akun.delete') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'sub_akun_id': subakunId
                            },
                            success: function (response) {
                                console.log(response);
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data sub akun"
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
