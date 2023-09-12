@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Keuangan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Data Master Aset
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="  " id="form-tambah-karyawan" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 ">Form Tambah Data Aset</h2>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Nama Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="nama aset"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Kategori
                                            Aset</label>
                                        <div class="col-md-9">
                                            <select id="largeSelect" class="form-select form-select-lg form-control">
                                                <option>Pilih Kategori</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Merk</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="nama merk"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Spesifikasi</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Spesifikasi"/>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Catatan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Catatan"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Tanggal
                                            Beli</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="date" placeholder="Tanggal Beli"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Tanggal
                                            Pakai</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="date" placeholder="Tanggal Beli"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Lokasi Awal
                                            Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Lokasi Awal"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Pajak</label>
                                        <div class="col-md-9">
                                            <input type="checkbox" placeholder="Pajak"/> Ya
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Kategori
                                            Pajak</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Catatan"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Aset Tidak Berwujud</label>
                                        <div class="col-md-9">
                                            <input  type="checkbox" placeholder="nama aset"/> Ya
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Metode Penyusutan</label>
                                        <div class="col-md-9">
                                            <select id="largeSelect" class="form-select form-select-lg form-control">
                                                <option>Pilih Penyusutan</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Akun Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Akun Aset"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Akun Akumulasi Penyusutan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Akun Akumulasi Penyusutan"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Akun Beban Penyusutan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Akun Beban Penyusutan"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Lampiran</label>
                                        <div class="col-md-9">

                                            <input class="form-control" type="file" placeholder="Akun Beban Penyusutan"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kuantitas</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Tanggal Beli"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Satuan</label>
                                        <div class="col-md-9">
                                            <select id="largeSelect" class="form-select form-select-lg form-control">
                                                <option>Pilih Satuan</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Umur Aset</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" placeholder="Tanggal Beli"/>
                                                </div>
                                                <div class="col-md-2">
                                                   Tahun
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" type="text" placeholder="Tanggal Beli"/>
                                                </div>
                                                <div class="col-md-2">
                                                    Bulan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Rasio</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Rasio"/>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Nilai Sisa</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="Nilai Sisa"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 ">
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Aset</h5>
                                    <hr>
                                    <h5 class="card-text">Rp.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"> Nilai Buku</h5>
                                    <hr>
                                    <h5 class="card-text">Rp.</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col ml-auto">
                        <div class="dropdown float-right mb-3">
                            <a href="{{ route('master-keuangan.aset.list-data-aset') }}"
                               class="btn btn-warning mr-1"><i
                                    class="fe fe-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">Simpan <i
                                    class="fe fe-check-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

