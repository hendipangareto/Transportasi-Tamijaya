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
                        <li class="breadcrumb-item active">Master Kinerja Karyawan
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
                            <h2 class="h4 mb-1">Data Master Kinerja Karyawan</h2>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">

                    <div class="col-lg">
                        <div class="demo-inline-spacing mt-3">
                            <div class="list-group list-group-horizontal-md text-md-center">
                                <a class="list-group-item list-group-item-action active" id="prestasi-pegawai"
                                   data-bs-toggle="list" href="#horizontal-home">Prestasi Pegawai</a>
                                <a class="list-group-item list-group-item-action" id="profile-list-item"
                                   data-bs-toggle="list" href="#horizontal-profile">Non-Prestasi Pegawai</a>
                            </div>
                            <div class="tab-content px-0 mt-0">
                                <div class="tab-pane fade show active" id="horizontal-home">
                                    <h6 class="mt-2">Prestasi Pegawai</h6>
                                    @include('admin.human-resource.pegawai.kinerja-karyawan.pretasi')
                                </div>

                                <div class="tab-pane fade" id="horizontal-profile">
                                    <h6 class="mt-2">Non-Prestasi Pegawai</h6>
                                    @include('admin.human-resource.pegawai.kinerja-karyawan.non-prestasi')
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

        // Aktifkan tab pertama saat halaman dimuat
        $(document).ready(function () {
            $('#prestasi-pegawai').tab('show');
        });

        // Tangani perubahan tab ketika pengguna mengklik tab lain
        $('.list-group-item').on('click', function (e) {
            e.preventDefault(); // Mencegah tindakan default dari link
            $(this).tab('show'); // Aktifkan tab yang diklik
        });

    </script>

@endpush


