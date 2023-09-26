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
                        <li class="breadcrumb-item active">Master Kategori Pajak
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
                            <h2 class="h4 ">Data Master Kategori Aset</h2>
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
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahKategoriPajak">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                    <a target="_blank" href="{{ route('master-keuangan.aset.cetak-pdf') }}?metode_penyusutan={{ request()->input('id_metode_penyusutan') }}" type="button" class="btn btn-danger text-white mr-1">
                                        <i class="bx bxs-file-pdf"></i> Report PDF
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form >
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Penyusutan Aset :</label>
                                    <div class="form-group">
                                        <select name="id_metode_penyusutan" id="id_metode_penyusutan" class="form-control">
                                            <option selected disabled>Pilih Metode Penyusutan</option>
                                            @foreach($MetodePenyusutan as $bg)
                                                @php
                                                    $selected = ($params['id_metode_penyusutan'] == $bg->id) ? "selected" : "";
                                                @endphp
                                                <option value="{{$bg->id}}" {{ $selected }}>{{$bg->nama_metode_penyusutan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button type="submit" class="btn btn-outline-primary">Filter <i class="bx bx-filter"></i></button>
                                    <a href="{{ route('master-keuangan.aset.list-kategori-pajak') }}" class="btn btn-outline-warning">Clear <i class="bx bx-filter"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive"  >
                        <table class="table table-bordered table-hover" id="table-kategori-aset">
                            <thead>
                            <tr class="text-center">
                                <th class="w-2p">No</th>
                                <th class="w-4p">Kode Kategori</th>
                                <th class="w-4p">Nama Kategori</th>
                                <th class="w-4p">Metode Penyusutan</th>
                                <th class="w-4p">Umur Ekonomis <br> (tahun)</th>
                                <th class="w-4p">Tarif <br> (%)</th>
                                <th class="w-10p">Keterangan</th>
                                <th class="w-2p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($KategoriPajak as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $item->kode_kategori_pajak }}</td>
                                    <td>{{ $item->nama_kategori_pajak}}</td>
                                    <td>{{ $item->metode_penyusutan}}</td>
                                    <td>{{ $item->tahun_pajak}}</td>
                                    <td>{{ $item->tarif_pajak}}</td>
                                    <td>{{ $item->deskripsi_pajak}}</td>
{{--                                    <td>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailKategoriPajak-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-info-circle font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href=""--}}
{{--                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#UpdateKategoriPajak-{{ $item->id }}"><i--}}
{{--                                                class="bx bx-edit font-size-base"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('master-keuangan.aset.delete-kategori-pajak', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm delete-button"><i class="bx bx-trash"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#DetailKategoriPajak-{{ $item->id }}">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#UpdateKategoriPajak-{{ $item->id }}">
                                                <i class="bx bx-edit font-size-base"></i>
                                            </div>
                                            <a class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                               href="{{ route('master-keuangan.aset.delete-kategori-pajak', ['id' => $item->id]) }}">
                                                <i class="bx bx-trash font-size-base"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data  kategori pajak.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.master-keuangan.kategori-pajak.modal-tambah')
    @include('admin.master-keuangan.kategori-pajak.modal-edit')
    @include('admin.master-keuangan.kategori-pajak.modal-detail')

@endsection


@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-kategori-aset").DataTable();
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

@endpush@endpush
