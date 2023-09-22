@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Request Gaji
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
                            <h2 class="h4 mb-1">Data Master Request Gaji Karyawan</h2>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 mb-1"></h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href=""
                                       class="btn btn-warning mr-1">
                                        <i class="bx bx-arrow-back"></i> Tambah Data</a>
                                    {{--                                    <a target="_blank"--}}
                                    {{--                                       href=""--}}
                                    {{--                                       type="button"--}}
                                    {{--                                       class="btn btn-danger text-white mr-1">--}}
                                    {{--                                        <i class="bx bx-printer"></i> Report PDF--}}
                                    {{--                                    </a>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="col-lg">
                            <div class="demo-inline-spacing mt-3">
                                <div class="list-group list-group-horizontal-md text-md-center">
                                    <a class="list-group-item list-group-item-action active" id="home-list-item"
                                       data-bs-toggle="list" href="#horizontal-home">GAJI / PREMI</a>
                                    <a class="list-group-item list-group-item-action" id="profile-list-item"
                                       data-bs-toggle="list" href="#horizontal-profile">KASBON</a>
                                </div>
                                <div class="tab-content px-0 mt-0">
                                    <div class="tab-pane fade show active" id="horizontal-home">

                                        <h5 class="mt-3"><B>KALKULASI GAJI :</B></h5>
                                        <hr>
                                        <div class="row mt-5">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-text-input"
                                                                   class="col-md-3 col-form-label">Bulan / Tahun</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="date"
                                                                       placeholder="nama aset"/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-search-input"
                                                                   class="col-md-3 col-form-label">Nama Pegawai</label>
                                                            <div class="col-md-9">
                                                                <select id="largeSelect"
                                                                        class="form-select form-select-lg form-control">
                                                                    <option>Pilih Nama Pegawai</option>
                                                                    <option value="1">One</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-3 col-form-label">Departemen</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-3 col-form-label">Jabatan</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class=" row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Gaji Pokok</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class=" row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjangan
                                                                Transport</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class=" row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjungan
                                                                Akademik</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class=" row">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjangan BPJS
                                                                KESEHATAN</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-text-input"
                                                                   class="col-md-3 col-form-label">. </label>
                                                            <div class="col-md-9">
                                                                {{--                                                                <input class="form-control" type="text" disabled/>--}}
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 mt5 row">
                                                            <label for="html5-search-input"
                                                                   class="col-md-3 col-form-label">Kode Pegawai</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-3 col-form-label">Status
                                                                Pegawai</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-3 col-form-label">.</label>
                                                            <div class="col-md-9">
                                                                {{--                                                                <input type="checkbox" placeholder="Pajak"/> Ya--}}
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjangan Masa
                                                                Kerja</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjangan
                                                                Kapasitas</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">Tunjangan
                                                                Struktur</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <label for="html5-tel-input"
                                                                   class="col-md-3 col-form-label">BPJS
                                                                Ketenagakerjaan</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5><b>ABSENSI</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label class="col-md-2 col-form-label"> - masuk</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> Hari</label>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> - Izin</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> Hari</label>
                                                        </div>
                                                        <div class=" row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> - Sakit</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> Hari</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> - Alpha</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> Hari</label>
                                                        </div>
                                                        <div class="row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> - Libur</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> Hari</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5><b>POTONGAN</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> - Absensi</label>
                                                            <div class="col-md-1">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> Jam</label>

                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> X </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text"/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> - Terlambat</label>
                                                            <div class="col-md-1">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> Jam</label>

                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> X </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text"/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> - Pulang
                                                                Awal</label>
                                                            <div class="col-md-1">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> Jam</label>

                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> X </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text"/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-9 col-form-label"> - Kasbon</label>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5><b>TAMBAHAN</b></h5>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> - Lembur</label>
                                                            <div class="col-md-1">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                            <label for="html5-email-input"
                                                                   class="col-md-2 col-form-label"> Jam</label>

                                                            <label for="html5-url-input"
                                                                   class="col-md-2 col-form-label"> X </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text"/>
                                                            </div>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="  row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-9 col-form-label"> -
                                                                Bonus/Insentive</label>
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <h4 class="col-md-9">TOTAL DITERIMA</h4>
                                                            {{--                                                            <label for="html5-email-input" class="col-md-9 col-form-label"> - Bonus/Insentive</label>--}}
                                                            <label for="html5-url-input"
                                                                   class="col-md-1 col-form-label"> = </label>
                                                            <div class="col-md-2">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col ml-auto">
                                                        <div class="dropdown float-right mb-3">
                                                            <a href=" "
                                                               class="btn btn-warning mr-1"><i
                                                                    class="fe fe-arrow-left"></i> Kembali
                                                            </a>
                                                            <button type="submit" class="btn btn-success">Simpan <i
                                                                    class="bx bx-save"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="horizontal-profile">

                                        <h5 class="mt-3"><b>KASBON</b></h5>
                                        <hr>
                                        <div class="row  ">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-text-input"
                                                                   class="col-md-3 col-form-label">Bulan / Tahun</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="date"
                                                                       placeholder="nama aset"/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-search-input"
                                                                   class="col-md-3 col-form-label">Nama Pegawai</label>
                                                            <div class="col-md-9">
                                                                <select id="largeSelect"
                                                                        class="form-select form-select-lg form-control">
                                                                    <option>Pilih Nama Pegawai</option>
                                                                    <option value="1">One</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-3 col-form-label">Departemen</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-3 col-form-label">Jabatan</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-text-input"
                                                                   class="col-md-3 col-form-label">. </label>
                                                            <div class="col-md-9">

                                                            </div>
                                                        </div>
                                                        <div class="mb-3 mt5 row">
                                                            <label for="html5-search-input"
                                                                   class="col-md-3 col-form-label">Kode Pegawai</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-email-input"
                                                                   class="col-md-3 col-form-label">Status
                                                                Pegawai</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="html5-url-input"
                                                                   class="col-md-3 col-form-label">.</label>
                                                            <div class="col-md-9">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5><b>PENGAJUAN KASBON</b></h5>
                                        <hr>
                                        <div class="row  ">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="mb-3 row">
                                                            <label for="html5-text-input"
                                                                   class="col-md-3 col-form-label">Nominal</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-search-input"
                                                                   class="col-md-3 col-form-label">Keterangan</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" name="deskripsi_kategori_aset"
                                                                          id="deskripsi_kategori_aset" cols="50"
                                                                          rows="3">
                                                                </textarea>
                                                            </div>
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-scripts')

    <script>
        // Aktifkan tab pertama saat halaman dimuat
        $(document).ready(function () {
            $('#home-list-item').tab('show');
        });

        // Tangani perubahan tab ketika pengguna mengklik tab lain
        $('.list-group-item').on('click', function (e) {
            e.preventDefault(); // Mencegah tindakan default dari link
            $(this).tab('show'); // Aktifkan tab yang diklik
        });
    </script>
@endpush
