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
                        <li class="breadcrumb-item active">Master Data Absensi
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
                            <h2 class="h4 mb-1">Data Master Data Absensi Karyawan</h2>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 "></h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
{{--                                    <a href="{{ route('human-resource.pegawai.request-gaji.form-tambah') }}"--}}
{{--                                       class="btn btn-primary mr-1">--}}
{{--                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>--}}
                                    <a target="_blank"
                                       href=""
                                       type="button"
                                       class="btn btn-danger text-white mr-1">
                                        <i class="bx bx-printer"></i> Report PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="row col-md-8">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Bulan / Tahun</label>
                                        <select class="form-control"
                                                name="departemen_id">
                                            <option disabled selected>Filter By Bulan/Tahun</option>
                                            <option>Pilih Departemen</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-8">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Nama Karyawan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Departemen/Jabatan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-primary">Filter <i
                                                class="bx bx-filter fe-12"></i></button>
                                        <a href=" " class="btn btn-warning">Clear <i
                                                class="bx bx-street-view fe-12"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <br>
                    <div class="table-responsive mt-2 mb-3" id="show-data-filter-accounting">
                        <table class="table table-bordered table-hover" id="table-armada">
                            <thead class="text-center">
                            <tr >
                                <th  class="w-2p" rowspan="2">No</th>
                                <th  class="w-10p" rowspan="2">Nama Karyawan</th>
                                <th  class="w-10p" rowspan="2">Departemen, Jabatan</th>
                                <th colspan="5"  class="w-5p">Absensi (Hari)</th>
                                <th  class="w-3p" rowspan="2">Action</th>

                            </tr>
                            <tr>
                                <td style="background-color: #6cfd5c; color: #020000">Masuk</td>
                                <td style="background-color: #fdc04c; color: #020000">Sakit</td>
                                <td style="background-color: #fdf33d; color: #020000">Izin</td>
                                <td style="background-color: #fc5151; color: #020000">Alpha</td>
                                <td style="background-color: #3babfc; color: #020000">Libur</td>

                            </tr>
                            </thead>
                            <tbody>

                            <tr class="text-center">
                                <td >1</td>
                                <td >Roda Kemudi</td>
                                <td >Departemen, Jabatan</td>
                                <td >M</td>
                                <td >S</td>
                                <td >I</td>
                                <td >A</td>
                                <td >L</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="# "><i
                                            class="bx bx-info-circle font-size-base"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                            data-target="# "><i
                                            class="bx bx-printer font-size-base"></i></button>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.human-resource.pegawai.request-gaji.form-detail')
@endsection

@push('page-scripts')
    <script>

        $(function () {
            var countSelected = 0;

            if (parseInt($("#Tablesemployee").val()) > 0) {
                $("#table-list-employees").DataTable();
            }
        });

        const changeDeparment = () => {
            var id_department = $("#id_department").val();
            $.ajax({
                url: ` `,
                method: "get",
                dataType: "json",
                success: function (response) {
                    var positions = response.data;
                    var html = `<option value="">Silahkan Pilih Jabatan</option>`;
                    positions.forEach(position => {
                        html += `<option value="${position.id}">${position.position_name}</option>`;
                    });
                    $("#id_position").html(html)
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
        $(document).ready(function () {
            $("#table-employee").DataTable();
        });


        $(document).ready(function () {
            $('#home-list-item').tab('show');
        });

        $('.list-group-item').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>

@endpush


