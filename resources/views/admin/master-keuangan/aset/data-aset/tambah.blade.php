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
    <form action="{{ route('master-keuangan.aset.data-aset.simpan-data-aset') }}" id="form-tambah-karyawan"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id">
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
                                    <input class="form-control" type="hidden" name="kode_aset" id="kode_aset" required/>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Nama Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="nama_aset" id="nama_aset"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Kategori
                                            Aset</label>
                                        <div class="col-md-9">
                                            <select id="id_kategori_aset" name="id_kategori_aset"
                                                    class="form-select form-select-lg form-control" required>
                                                <option selected disabled>Pilih Kategori</option>
                                                @foreach($KategoriAset as $item)
                                                    <option
                                                        value="{{$item->id}}">{{ $item->nama_kategori_aset}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Merk</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="merk_aset" id="merk_aset"
                                                   placeholder="nama merk" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Spesifikasi</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="spesifikasi_aset"
                                                   id="spesifikasi_aset" placeholder="Spesifikasi" required/>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Catatan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="catatan_aset"
                                                   id="catatan_aset" placeholder="Catatan" required/>
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
                                            <input class="form-control" type="date" name="tanggal_beli_aset"
                                                   id="tanggal_beli_aset" placeholder="Tanggal Beli" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Tanggal
                                            Pakai</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="date" name="tanggal_pakai_aset"
                                                   id="tanggal_pakai_aset" placeholder="Tanggal Beli" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Lokasi Awal
                                            Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="lokasi_awal_aset"
                                                   id="lokasi_awal_aset" placeholder="Lokasi Awal" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Pajak</label>
                                        <div class="col-md-9">
                                            <input type="checkbox" name="pajak_aset" id="pajak_aset" placeholder="Pajak"
                                                   required/> Ya
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Kategori
                                            Pajak</label>
                                        <div class="col-md-9">
                                            <select id="id_kategori_pajak" name="id_kategori_pajak"
                                                    class="form-select form-select-lg form-control" required>
                                                <option selected disabled>Kategori Pajak</option>
                                                @foreach($KategoriPajak as $item)
                                                    <option
                                                        value="{{$item->id}}">{{ $item->nama_kategori_pajak}}</option>
                                                @endforeach
                                            </select>
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
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Aset Tidak
                                            Berwujud</label>
                                        <div class="col-md-9">
                                            <input type="checkbox" name="aset_tidak_berwujud" id="aset_tidak_berwujud"
                                                   placeholder="nama aset" required/> Ya
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Metode
                                            Penyusutan</label>
                                        <div class="col-md-9">
                                            <select id="id_metode_penyusutan" name="id_metode_penyusutan"
                                                    class="form-select form-select-lg form-control" required>
                                                <option selected disabled>Kategori Metode Penyusutan</option>
                                                @foreach($MetodePenyusutan as $item)
                                                    <option
                                                        value="{{$item->id}}">{{ $item->nama_metode_penyusutan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Akun Aset</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="akun_aset" id="akun_aset"
                                                   placeholder="Akun Aset" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Akun Akumulasi
                                            Penyusutan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text"
                                                   name="akun_akumulasi_penyusutan_aset"
                                                   id="akun_akumulasi_penyusutan_aset"
                                                   placeholder="Akun Akumulasi Penyusutan" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Akun Beban
                                            Penyusutan</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="akun_beban_penyusutan_aset"
                                                   id="akun_beban_penyusutan_aset" placeholder="Akun Beban Penyusutan"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Lampiran</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="lampiran_aset"
                                                   id="lampiran_aset" placeholder="Akun Beban Penyusutan"
                                                   onchange="previewFile()">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 "></div>
                                        <div class="col-md-2 ">
                                            <div id="file-preview">
                                                <img id="preview-image" class="img-preview mt-6"
                                                     style="max-width: 50px; max-height: 50px;">
                                            </div>
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
                                            <input class="form-control" type="text" name="kuantitas" id="kuantitas"
                                                   placeholder="Kuantitas" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Satuan</label>
                                        <div class="col-md-9">
                                            <select id="id_satuan" name="id_satuan"
                                                    class="form-select form-select-lg form-control" required>
                                                <option selected disabled>Kategori Satuan</option>
                                                @foreach($satuan as $item)
                                                    <option value="{{$item->id}}">{{ $item->nama_satuan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-email-input" class="col-md-3 col-form-label">Umur Aset</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-control" type="date" name="umur_aset"
                                                           id="umur_aset" placeholder="Umur Aset" required/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-url-input" class="col-md-3 col-form-label">Rasio</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="number" name="rasio" id="rasio"
                                                   placeholder="Rasio" required/>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label for="html5-tel-input" class="col-md-3 col-form-label">Nilai Sisa</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="nilai_sisa" id="nilai_sisa"
                                                   placeholder="Nilai Sisa" required/>
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
@push('page-scripts')
    <script>


        function previewFile() {
            const fileInput = document.getElementById('lampiran_aset');
            const filePreview = document.getElementById('file-preview');


            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {

                        const img = document.createElement('img');
                        img.src = e.target.result;

                        img.style.maxWidth = '100%';
                        img.style.height = 'auto';

                        filePreview.innerHTML = '';
                        filePreview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {

                    filePreview.innerHTML = 'File preview is not available for this file type.';
                }
            } else {

                filePreview.innerHTML = '';
            }
        }

    </script>

@endpush
