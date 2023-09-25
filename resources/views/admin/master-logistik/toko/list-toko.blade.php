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
                        <li class="breadcrumb-item active">Master Kategori
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
                            <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Kategori Barang</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <div class="card-header" >
                            <div class="toolbar row ">
                                <div class="col-md-12 d-flex">
                                    <h2 class="h4"> </h2>
                                    <div class="col ml-auto">
                                        <div class="dropdown float-right">
                                            <a href=" "
                                               class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahToko">
                                                <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                            <a target="_blank"
                                               href="{{ route('admin.master-logistik.toko.cetak-pdf-toko') }}"
                                               type="button"
                                               class="btn btn-danger text-white mr-1">
                                                <i class="bx bxs-file-pdf"></i> Report PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-kategori-logistik">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-2p">Id Toko</th>
                                    <th class="w-10p">Nama Toko</th>
                                    <th class="w-10p">Nomor Telepon</th>
                                    <th class="w-10p">Nomor HP</th>
                                    <th class="w-10p">PIC</th>
                                    <th class="w-10p">Alamat</th>
                                    <th class="w-10p">Provinsi/Kota</th>
                                    <th class="w-3p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($Toko as $index => $item)

                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $item->kode_toko }}</td>
                                        <td>{{ $item->nama_toko }}</td>
                                        <td>{{ $item->tlp_toko }}</td>
                                        <td>{{ $item->hp_toko }}</td>
                                        <td>{{ $item->pic_toko }}</td>
                                        <td>{{ $item->alamat_toko }}</td>
                                        <td>{{ $item->province }} - {{ $item->city }}</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailToko"><i
                                                    class="bx bx-info-circle font-size-base"></i>
                                            </a>
                                            <a href=""
                                               class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#EditToko-{{ $item->id }}"><i
                                                    class="bx bx-edit font-size-base"></i>
                                            </a>

                                            <a href="{{ route('admin.master-logistik.toko.delete-toko', ['id' => $item->id]) }}"
                                               class="btn btn-outline-danger delete-button"><i class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data bagian.</td>
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

    @include('admin.master-logistik.toko.modal-tambah')
    @include('admin.master-logistik.toko.modal-detail')
    @include('admin.master-logistik.toko.modal-edit')

@endsection
@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-kategori-logistik").DataTable();
        });

        //menampilkan sweetalert2
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
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('delete-button')) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    {{--text: 'Data (" {{ $item->nama_kategori }} ") akan dihapus!',--}}
                    text: 'Data ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.target.href;
                    }
                });
            }
        });

        const changeProvince = () => {
            var id_province = $("#id_province").val();
            $.ajax({
                url: `/admin/master-data/province/get-city-by-province/${id_province}`,
                method: "get",
                dataType: "json",
                success: function(response) {
                    var cities = response.data;
                    var html = `<option value="">Pilih Kabupaten/Kota</option>`;
                    cities.forEach(city => {
                        html += `<option value="${city.id}">${city.city_name}</option>`;
                    });
                    $("#id_city").html(html)
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

    </script>

@endpush
