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
                                    <a href="#" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahLaporanPerjalanan">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('perawatan-pemeliharaan.sopir.check-fisik-layanan.ajukan') }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered table-hover" id="table-bagian">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-2p">No</th>
                                        <th class="w-5p">Bagian</th>
                                        <th class="w-5p">Keluhan</th>
                                        <th class="w-5p"><input href="#" class="btn btn-primary mr-1"
                                                                onclick="selectAllItems()" type="checkbox">Pilih
                                            Data</input></th>
                                        <th class="w-5p">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($sopir as $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->bagian }}</td>
                                            <td>{{ $item->keluhan }}</td>
                                            <td><input type="checkbox" name="check_fisik_layanan_id[]"
                                                       value="{{ $item->id }}"></td>
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

                                <h1></h1>
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

        // ========Checklist=====

        function selectAllItems() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = true;
            });
        }

        function selectAllItems() {
            let checkboxes = document.getElementsByName('check_fisik_layanan_id[]');
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        }


        function addDataToTable() {
            var selectedBagian = document.getElementById("bagian_id").value;
            var keluhan = document.getElementById("keluhan").value;

            if (selectedBagian && keluhan) {
                var tableBody = document.getElementById("detail-cek-layanan");
                var newRow = tableBody.insertRow(tableBody.rows.length);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);

                cell1.innerHTML = selectedBagian;
                cell2.innerHTML = keluhan;
                cell3.innerHTML = '<button onclick="removeRow(this)">Hapus</button>';

                document.getElementById("bagian_id").value = "";
                document.getElementById("keluhan").value = "";
            } else {
                alert("Harap pilih bagian dan isi keluhan terlebih dahulu.");
            }
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }


        // ===============================

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
                        data: {'id_armada': armadaId},
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
