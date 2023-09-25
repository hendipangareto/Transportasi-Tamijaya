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
                        <input type="hidden" id="Tablesemployee" value="">
                        <table class="table table-bordered table-hover" id="table-list-employees">
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
                                    <td>{{ $item->tanggal_pakai_aset}}</td>
                                    <td>{{ $item->lokasi_awal_aset}}</td>
                                    <td>{{ $item->pajak_aset}}</td>
                                    <td>{{ $item->id_kategori_pajak}}</td>
                                    <td>{{ $item->aset_tidak_berwujud}}</td>
                                    <td>{{ $item->metode_penyusutan}}</td>
                                    <td>{{ $item->akun_aset}}</td>
                                    <td>{{ $item->akun_akumulasi_penyusutan_aset}}</td>
                                    <td>{{ $item->akun_beban_penyusutan_aset}}</td>
                                    <td>{{ $item->lampiran_aset}}</td>
                                    <td>{{ $item->kuantitas}}</td>
                                    <td>{{ $item->satuan}}</td>
                                    <td>{{ $item->umur_aset}}</td>
                                    <td>{{ $item->rasio}}</td>
                                    <td>{{ $item->nilai_sisa   }}</td>
                                    <td>
                                        <a href=""
                                           class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailKategori-{{ $item->id }}"><i
                                                class="bx bx-info-circle font-size-base"></i>
                                        </a>
                                        <a href=""
                                           class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#UpdateKategori-{{ $item->id }}"><i
                                                class="bx bx-edit font-size-base"></i>
                                        </a>
                                        <a href="{{ route('master-keuangan.aset.delete-kategori-aset', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm delete-button"><i class="bx bx-trash"></i></a>
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
{{--    @include('admin.master-keuangan.aset.data-aset.modal-tambah')--}}
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
    </script>

@endpush
