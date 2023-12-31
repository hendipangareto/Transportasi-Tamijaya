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
                            <h2 class="h4 mb-1">Form Tambah Request Gaji Karyawan</h2>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 mb-1"></h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{ route('human-resource.pegawai.request-gaji.list-gaji') }}"
                                       class="btn btn-warning mr-1">
                                        <i class="bx bx-arrow-back"></i> Kembali</a>
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
                                        <form action="{{ route('human-resource.pegawai.request-gaji.form-simpan') }}"
                                              method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-5">
                                                <div class="col-md-6">
                                                    <div class="card mb-4">
                                                        <div class="card-body">

                                                            <div class="mb-3 row">
                                                                <label for="html5-search-input"
                                                                       class="col-md-3 col-form-label">Nama
                                                                    Pegawai</label>
                                                                <div class="col-md-9">
                                                                    <select name="employee_id" id="employee_id"
                                                                            class="form-control">
                                                                        <option selected disabled>Pilih nama pegawai
                                                                        </option>
                                                                        @foreach($employee as $item)
                                                                            <option
                                                                                value="{{$item->id}}">{{$item->employee_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="html5-email-input"
                                                                       class="col-md-3 col-form-label">Departemen</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="department_name" id="department_name"
                                                                           readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="html5-url-input"
                                                                       class="col-md-3 col-form-label">Jabatan</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" name="position_name"
                                                                           id="position_name" type="text" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class=" row mb-3">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Gaji
                                                                    Pokok</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control money" type="text"
                                                                           style="font-style: italic" name="g_pokok"
                                                                           id="gaji_pokok_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class=" row mb-3">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Tunjangan
                                                                    Transport</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="t_transport"
                                                                           id="tunjangan_transport_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class=" row mb-3">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Tunjungan
                                                                    Akademik</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="t_akademik"
                                                                           id="tunjangan_akademik_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class=" row">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Tunjangan BPJS
                                                                    KESEHATAN</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="bpjs_kesehatan"
                                                                           id="bpjs_kesehatan_pegawai" readonly/>
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
                                                                       class="col-md-3 col-form-label">Kode
                                                                    Pegawai</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="kode_employee" id="id_pegawai"
                                                                           readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="html5-email-input"
                                                                       class="col-md-3 col-form-label">Status
                                                                    Pegawai</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="employee_status" id="status_pegawai"
                                                                           readonly/>
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
                                                                    <input class="form-control" type="text"
                                                                           name="t_masa_kerja"
                                                                           id="tunjangan_masa_kerja_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Tunjangan
                                                                    Kapasitas</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="t_kapasitas"
                                                                           id="tunjangan_kapasitas_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">Tunjangan
                                                                    Struktur</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="t_struktur"
                                                                           id="tunjangan_struktur_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="row ">
                                                                <label for="html5-tel-input"
                                                                       class="col-md-3 col-form-label">BPJS
                                                                    Ketenagakerjaan</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text"
                                                                           name="bpjs_ketenagakerjaan"
                                                                           id="bpjs_ketenagakerjaan_pegawai" readonly/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="float-right">
                                                                <button type="submit" class="btn btn-primary">Ajukan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <hr>
                                        <h5><b>ABSENSI</b></h5>
                                        <hr>
                                        @include('admin.human-resource.pegawai.request-gaji.absensi')
                                        <hr>
                                        <h5><b>POTONGAN</b></h5>
                                        <hr>
                                        @include('admin.human-resource.pegawai.request-gaji.potongan-gaji')
                                    </div>

                                    {{--                                    LAYOUT KASBON--}}
                                    <div class="tab-pane fade" id="horizontal-profile">

                                        <h5 class="mt-3"><b>KASBON</b></h5>
                                        <hr>
                                       @include('admin.human-resource.pegawai.request-gaji.kasbon')
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

        $(document).ready(function () {
            $('#home-list-item').tab('show');
        });


        $('.list-group-item').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        function addCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }


        $(document).ready(function () {
            $('#employee_id').change(function () {
                var employeeId = $(this).val();

                console.log("employeeId: " + employeeId)

                if (employeeId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('human-resource.pegawai.request-gaji.get-employee-request-gaji') }}",
                        data: {'employee_id': employeeId},
                        success: function (data) {
                            console.log(JSON.stringify(data))
                            if (data) {
                                $('#id_pegawai').val(data.kode_employee);
                                $('#department_name').val('');
                                $('#department_name').val(data.department_name);
                                $('#position_name').val(data.position_name);
                                $('#gaji_pokok_pegawai').val(addCommas(data.g_pokok));
                                $('#tunjangan_transport_pegawai').val(addCommas(data.t_transport));
                                $('#tunjangan_akademik_pegawai').val(addCommas(data.t_akademik));
                                $('#bpjs_kesehatan_pegawai').val(addCommas(data.bpjs_kesehatan));
                                $('#status_pegawai').val(data.employee_status);
                                $('#id_pegawai').val(data.kode_employee);
                                $('#tunjangan_masa_kerja_pegawai').val(addCommas(data.t_masa_kerja));
                                $('#tunjangan_kapasitas_pegawai').val(addCommas(data.t_kapasitas));
                                $('#tunjangan_struktur_pegawai').val(addCommas(data.t_struktur));
                                $('#bpjs_ketenagakerjaan_pegawai').val(addCommas(data.bpjs_ketenagakerjaan));
                                $('#total_ijin').val(addCommas(data.total_ijin));


                            }
                        }
                    });
                } else {
                    $('#id_pegawai').val('');
                    $('#department_name').val('');
                    $('#position_name').val('');
                    $('#gaji_pokok_pegawai').val('');
                    $('#tunjangan_transport_pegawai').val('');
                    $('#tunjangan_akademik_pegawai').val('');
                    $('#bpjs_kesehatan_pegawai').val('');
                    $('#status_pegawai').val('');
                    $('#tunjangan_masa_kerja_pegawai').val('');
                    $('#tunjangan_kapasitas_pegawai').val('');
                    $('#tunjangan_struktur_pegawai').val('');
                    $('#total_ijin').val('');


                }
            });

        });



        //KASBON===========
        $(document).ready(function () {
            $('#employee_select').change(function () {
                var employeeId = $(this).val();
                console.log("employeeId: " + employeeId)

                if (employeeId) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('data-gaji-pegawai.human-resource-pegawai-getEmployee')}}",
                        data: {'employee_id': employeeId},
                        success: function (data) {
                            console.log(JSON.stringify(data))
                            if (data) {
                                $('#employee_status').val(data.employee_status);
                                $('#kode_employee').val(data.kode_employee);
                                $('#departemen_id').val(data.department_name);
                                $('#position_id').val(data.position_name);
                            }
                        }
                    });
                } else {
                    $('#employee_status').val('');
                    $('#kode_employee').val('');
                    $('#departemen_id').val('');
                    $('#position_id').val('');
                }
            });
        });

        $(function () {
            var countSelected = 0;

            if (parseInt($("#table-daftar-gaji").val()) > 0) {
                $("#modal-tambah-daftar-gaji-pegawai").DataTable();
            }
        });

        //clear form add
        $(document).ready(function () {
            function clearFormData() {
                $("#employee_id").val("");
                $("#kode_employee").val("");
                $("#employee_status").val("");
                $("#departemen_id").val("");
                $("#position_id").val("");
                $("#nominal").val("");
                $("#tanggal").val("");
                $("#keterangan_kasbon").val("");
            }

            $("#modal-tambah-daftar-gaji-pegawai").on("hidden.bs.modal", function () {
                clearFormData();
            });
        });


    </script>
@endpush
