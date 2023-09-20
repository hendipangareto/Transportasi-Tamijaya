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
                        <li class="breadcrumb-item active">Master Bengkel Luar
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
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>Data Master </b>| Bengkel Luar</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"
                                       data-target="#TambahBengkelLuar"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-hover" id="table-bagian">
                                <thead>
                                <tr class="text-center">
                                    <td class="w-2p">No</td>
                                    <th class="w-2p">Kode Bengkel</th>
                                    <th class="w-4p">Nama Bengkel</th>
                                    <th class="w-4p">Nomor Telepon</th>
                                    <th class="w-4p">Nomor HP</th>
                                    <th class="w-4p">PIC</th>
                                    <th class="w-4p">Alamat</th>
                                    <th class="w-4p">Provinsi/Kota</th>
                                    <th class="w-4p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($BengkelLuar as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_bengkel_luar }} </td>
                                        <td>{{ $item->nama_bengkel_luar }} </td>
                                        <td>{{ $item->hp_bengkel_luar }} </td>
                                        <td>{{ $item->tlp_bengkel_luar }} </td>
                                        <td>{{ $item->pic_bengkel_luar }} </td>
                                        <td>{{ $item->alamat_bengkel_luar }} </td>
                                        <td>{{ $item->province }} - {{ $item->city }} </td>
                                        <td>
                                            <a href=""
                                               class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#DetailBengkelLuar-{{ $item->id }}"><i
                                                    class="bx bx-info-circle font-size-base"></i>
                                            </a>
                                            <a href=""
                                               class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#EditBengkel-{{ $item->id }}"><i
                                                    class="bx bx-edit font-size-base"></i>
                                            </a>
                                            <a href="{{ route('admin.master-logistik.bengkel-luar.delete-bengkel-luar', ['id' => $item->id]) }}"
                                               class="btn btn-outline-danger btn-sm delete-button"><i
                                                    class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data bengkel luar !</td>
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

    @include('admin.master-logistik.bengkel-luar.modal-tambah')
    @include('admin.master-logistik.bengkel-luar.modal-detail')
{{--    @include('admin.master-logistik.bengkel-luar.modal-edit')--}}
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
        document.addEventListener('click', function (e) {
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

        //getProvince
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
