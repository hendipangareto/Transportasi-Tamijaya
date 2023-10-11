@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Perawatan & Pemeliharaan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-bus"></i></a></li>
                        <li class="breadcrumb-item active">Sopir</li>
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
                    <h4 class="card-title" style="color: black"><b>PEMELIHARAAN</b> | Form Laporan Perjalanan</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header pb-0 d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="#" class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahLaporanPerjalanan">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="" method="">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-bagian">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-2p">No</th>
                                        <th class="w-5p">Bagian</th>
                                        <th class="w-5p">Keluhan</th>
                                        <th class="w-5p">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($sopir as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->bagian }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        @if($item->status == null)
                                            <td><h6 class="badge bg-warning">Belum Dicuci</h6></td>
                                        @elseif($item->status == 1)
                                            <td><label class="badge bg-success">DiCuci</label></td>
                                        @elseif($item->status == 2)
                                            <td><label class="badge bg-danger">Ditolak</label></td>
                                        @endif
                                    </tr>
                                    @empty
                                        <td colspan="3"></td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header pb-0 d-flex justify-content-between">
                                <h4 class="card-title"></h4>
                                <button type="submit" class="btn btn-success mr-1">
                                    <i class="bx bx-save"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.perawatan-pemeliharaan.sopir.modal-tambah')
@endsection

@push('page-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#table-bagian").DataTable();
        });

        $(document).ready(function () {
            $('#id_armada').change(function () {
                var armadaId = $(this).val();
                console.log("armadaId: " + armadaId);
                if (armadaId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('perawatan-pemeliharaan.sopir.get-armada') }}",
                        data: { 'id_armada': armadaId },
                        success: function (data) {
                            if (data) {
                                $('#id_pick_point').val(data.pick_point_name);
                                $('#id_destination_wisata').val(data.destination_wisata_name);
                                $('#armada_category').val(data.armada_category);
                                $('#armada_type').val(data.armada_type);
                                $('#armada_capacity').val(data.armada_capacity);
                                $('#bar_bbm').val(data.bar_bbm);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Terjadi kesalahan dalam permintaan AJAX: ' + error);
                        }
                    });
                } else {
                    // Atur nilai elemen menjadi kosong jika id_armada tidak dipilih
                    $('#id_armada').val('');
                    $('#id_pick_point').val('');
                    $('#armada_category').val('');
                    $('#armada_type').val('');
                    $('#armada_capacity').val('');
                    $('#bar_bbm').val('');
                    $('#destination_wisata_name').val('');
                }
            });
        });
    </script>
@endpush
