@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Fasilitas Perjalanan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Fasilitas Perjalanan
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
                            <h4 class="card-title">List Data Master Fasilitas Perjalanan</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                                            data-target="#TambahTravelFacility"> <i class="bx bx-plus-circle"></i> Tambah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <table class="table table-bordered table-hover table-responsive-lg" id="table-facility-travel">
                            <thead>
                            <tr>
                                <th class="w-5p">No</th>
                                <th class="w-20p">Kode</th>
                                <th class="w-25p">Fasilitas Perjalanan</th>
                                <th class="w-25p">Deskripsi</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($TravelFacility) > 0)
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($TravelFacility as $data)
                                    <tr id="row-armada-{{ $data->id }}">
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->travel_facility_code }} - {{ $data->id }}</td>
                                        <td>{{ $data->travel_facility_name }}</td>
                                        <td>{{ $data->travel_facility_description }}</td>

                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" onclick="openInfoSeat(this)" >
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" data-toggle="modal"
                                                     data-target="#UpdateTravelFacility-{{ $data->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                                     onclick="manageData('delete', {{ $data->id }})"
                                                >
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Tidak Terdapat Data Facility Travel
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin.master-data.travel-facility.modal')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-facility-travel").DataTable();
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
    </script>

@endpush


