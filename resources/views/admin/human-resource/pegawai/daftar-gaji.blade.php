@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Data Agent
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="col-md-12 my-4">
        <div class="card shadow">
            <div class="card-header" style="background-color: #00b3ff">
                <div class="toolbar row ">
                    <div class="col-md-12 d-flex">
                        <h2 class="h4 mb-1">Daftar Gaji Pegawai</h2>
                        <div class="col ml-auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ml-auto mt-2">
                <div class="dropdown float-right">
                    <button type="button" data-toggle="modal"
                            data-target="#modal-tambah-daftar-gaji-pegawai"
                            class="btn btn-primary mr-1">
                        <i class="fe fe-plus"></i> Tambah Data
                    </button>
                    <a target="_blank" id="btn-report"
                       href="{{ route('data-gaji-pegawai.human-resource-pegawai-cetak-pdf') }}?departemen={{ request()->input('filter_departemen_id') }}&position={{ request()->input('filter_position_id') }}&status={{ request()->input('filter_employee_status') }}"
                       type="button" class="btn btn-danger text-white mr-1">
                        <i class="bi bi-filetype-pdf"></i> Report PDF
                    </a>

                </div>
            <div class="card-body">

                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <select class="form-control" id="filter_departemen_id"
                                        name="filter_departemen_id">
                                    <option disabled selected>Pilih Departemen</option>
                                    @foreach($departemen as $dpt)
                                        @php
                                            $selected = ($params['departemen_id'] == $dpt->id) ? "selected" : "";
                                        @endphp
                                        <option value="{{$dpt->id}}" {{$selected}}>{{$dpt->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <select name="filter_position_id" id="filter_position_id" class="form-control">
                                    <option value="" selected disabled>Pilih Jabatan</option>
                                    @foreach($position as $jbt)
                                        @php
                                            $selected = ($params['position_id'] == $jbt->id) ? "selected" : "";
                                        @endphp
                                        <option value="{{$jbt->id}}" {{$selected}}>{{$jbt->position_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <select name="filter_employee_status" id="filter_employee_status" class="form-control">
                                    <?php
                                    $nol = "";
                                    $tetap = "";
                                    $kontrak = "";
                                    $partTime = "";

                                    if ($params['employee_status'] == "Tetap") {
                                        $tetap = "selected";
                                    } elseif ($params['employee_status'] == "Kontrak") {
                                        $kontrak = "selected";
                                    } elseif ($params['employee_status'] == "Part Time") {
                                        $partTime = "selected";
                                    } else {
                                        $nol = "selected";
                                    }
                                    ?>
                                    <option value="0" <?= $nol ?> disabled selected>Pilih Status Pegawai</option>
                                    <option value="Tetap" <?= $tetap ?>>Tetap</option>
                                    <option value="Kontrak" <?= $kontrak ?>>Kontrak</option>
                                    <option value="Part Time" <?= $partTime ?>>Part Time</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <button id="btn-filter-gaji" class="btn btn-outline-primary">Filter <i
                                        class="fe fe-filter"></i></button>
                                <a href="{{ route('data-gaji-pegawai.human-resource-pegawai-list-data') }}"
                                   class="btn btn-outline-secondary">Reset
                                    <i class="fe fe-refresh-ccw"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="table-bagian">
                        <thead>
                        <tr class="text-truncate text-center">
                            <th class="w-2p">No</th>
                            <th class="w-10p">Departemen</th>
                            <th class="w-10p">Jabatan</th>
                            <th class="w-10p">Nama</th>
                            <th class="w-10p">Status Pegawai</th>
                            <th class="w-4p">Nominal Gaji <br> (Rp.)</th>
                            <th class="w-4p">Keterangan</th>
                            <th class="w-2p">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->department_name}}</td>
                                <td>{{$item->position_name}}</td>
                                <td>{{$item->employee_name}}</td>
                                <td>{{$item->employee_status}}</td>
                                <td> @currency($item->g_pokok)</td>
                                <td>{{$item->keterangan}}</td>

                                <td class="text-center">
                                    <div class="d-flex">
                                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                             data-toggle="modal"
                                             data-target="#DetailGaji-{{ $item->id }}">
                                            <i class="bx bx-info-circle font-size-base"></i>
                                        </div>
                                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                             data-toggle="modal"
                                             data-target="#EditGaji-{{ $item->id }}">
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
                                <td colspan="9" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>
    @include('admin.human-resource.pegawai.modal-tambah-gaji')
    @include('admin.human-resource.pegawai.modal-edit')
    @include('admin.human-resource.pegawai.detail')
@endsection

@push('page-scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $("#table-bagian").DataTable();
        });

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
                                $('#departemen_id').val(data.department_name);
                                $('#position_id').val(data.position_name);
                            }
                        }
                    });
                } else {
                    $('#employee_status').val('');
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
                $("#employee_status").val("");
                $("#departemen_id").val("");
                $("#position_id").val("");
                $("#g_pokok").val("");
                $("#t_masa_kerja").val("");
                $("#t_transport").val("");
                $("#t_kapasitas").val("");
                $("#t_akademik").val("");
                $("#t_struktur").val("");
                $("#bpjs_kesehatan").val("");
                $("#bpjs_ketenagakerjaan").val("");
                $("#keterangan").val("");
            }

            $("#modal-tambah-daftar-gaji-pegawai").on("hidden.bs.modal", function () {
                clearFormData();
            });
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

        $(document).ready(function () {
            $('.delete-button').click(function () {
                var GajiEmployeeId = $(this).data('id');

                Swal.fire({
                    title: "Yakin akan menghapus data?",
                    text: "Data yang dihapus tidak dapat dikembalikan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('data-gaji-pegawai.form-delete') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'gaji_employee_id': GajiEmployeeId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data gaji karyawan"
                                });
                            },
                            error: function (error) {
                                console.log(err);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush

