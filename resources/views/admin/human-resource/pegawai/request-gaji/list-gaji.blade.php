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
                                    <a href="{{ route('human-resource.pegawai.request-gaji.form-tambah') }}"
                                       class="btn btn-primary mr-1">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
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
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Bulan / Tahun</label>
                                    <select class="form-control"
                                            name="departemen_id">
                                        <option disabled selected>Filter By Bulan/Tahun</option>
                                        <option>Pilih Departemen</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Status Aprroval</label>
                                    <select class="form-control"
                                            name="employee_status" id="employee_status">

                                        <option value="0" disabled selected>Filter By Status Approval</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Part Time">Part Time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Cara Pembayaran</label>
                                    <select class="form-control"
                                            name="employee_status" id="employee_status">

                                        <option value="0" disabled selected>Filter By Cara Pembayaran</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Part Time">Part Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Departemen</label>
                                    <select class="form-control"
                                            name="postionfilter">
                                        <option disabled selected>Filter By Departemen</option>

                                        <option value=" ">#</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select class="form-control"
                                            name="postionfilter">
                                        <option disabled selected>Filter By Jabatan</option>

                                        <option value=" ">#</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Status Pegawai </label>
                                    <select class="form-control"
                                            name="postionfilter">
                                        <option disabled selected>Filter By Status</option>

                                        <option value=" ">#</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-primary">Filter <i
                                            class="bx bx-filter fe-12"></i></button>
                                    <a href=" " class="btn btn-warning">Clear <i
                                            class="bx bx-street-view fe-12"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value=" ">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <th class="w-3p">No</th>
                                <th class="w-10p">Bulan / Tahun</th>
                                <th class="w-10p">Nama</th>
                                <th class="w-10p">Tipe Pengajuan</th>
                                <th class="w-10p">Nominal <br> (Rp.)</th>
                                <th class="w-10p">checklist <br> Pengajuan</th>
                                <th class="w-10p">Status Pembayaran</th>
                                <th class="w-10p">Cara Pembayaran</th>
                                <th class="w-10p">Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">
                            <tr class="text-center">
{{--                                <td>1</td>--}}
{{--                                <td>#</td>--}}
{{--                                <td>#</td>--}}
{{--                                <td>#</td>--}}
{{--                                <td>#</td>--}}
{{--                                <td><input type="checkbox"></td>--}}
{{--                                <td>#</td>--}}
{{--                                <td>#</td>--}}
{{--                                <td>--}}
{{--                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"--}}
{{--                                            data-target="#DetailRequest"><i--}}
{{--                                            class="bx bx-info-circle font-size-base"></i></button>|--}}

{{--                                    <a href="{{ route('human-resource.pegawai.request-gaji.form-edit') }}"--}}
{{--                                       class="btn btn-sm btn-outline-warning"><i--}}
{{--                                            class="bx bx-edit font-size-base"></i>--}}
{{--                                    </a>--}}
{{--                                    <button class="btn btn-sm btn-outline-danger btn-delete-employee "--}}
{{--                                            data-iddelete=" "><i class="bx bx-trash font-size-base"></i>--}}
{{--                                    </button>--}}
                                        @forelse ($requestGaji as $index => $item)
                                            <tr class="text-center">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->employee_name }}</td>
                                                <td>{{ $item->cara_bayar }}</td>
                                                <td>@currency($item->nominal)</td>
                                                <td><input type="checkbox"></td>
                                                <td>{{ $item->status_bayar }}</td>
                                                <td>{{ $item->cara_bayar }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                             data-toggle="modal"
                                                             data-target="#DetailKategori-{{ $item->id }}">
                                                            <i class="bx bx-info-circle font-size-base"></i>
                                                        </div>
                                                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                             data-toggle="modal"
                                                             data-target="#EditkategoriBarang-{{ $item->id }}">
                                                            <i class="bx bx-edit font-size-base"></i>
                                                        </div>
                                                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                             data-id="{{ $item->id }}">
                                                            <i class="bx bx-trash font-size-base"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data kategori.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                            </td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="toolbar row mt-2">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 mb-1"></h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href=" "
                                       class="btn btn-warning mr-1">
                                        <i class="bx bx-fingerprint"></i> Cetak Slip</a>
                                    <a target="_blank"
                                       href=""
                                       type="button"
                                       class="btn btn-success text-white mr-1">
                                        <i class="bx bx-save"></i> Submit
                                    </a>
                                </div>
                            </div>
                        </div>
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

