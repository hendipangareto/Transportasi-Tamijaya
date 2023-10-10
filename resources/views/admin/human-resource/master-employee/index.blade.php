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
                        <li class="breadcrumb-item active">Master Karyawan
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
                            <h2 class="h4 mb-1">Data Master Karyawan</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{ route('human-resource-master-employee-form-add') }}"
                                       class="btn btn-primary mr-1">
                                        <i class="fe fe-plus"></i> Tambah Data</a>
                                    <a target="_blank"
                                       href="{{ route('human-resource-master-employee-cetak-pdf') }}?departemen={{ isset(request()->departemen_id) }}&position={{ isset(request()->postionfilter) }}&status={{ isset(request()->employee_status)  }}"
                                       type="button"
                                       class="btn btn-danger text-white mr-1">
                                        <i class="bi bi-filetype-pdf"></i> Report PDF
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Filter By Departemen</label>
                                    <select class="form-control"
                                            name="departemen_id">
                                        <option disabled selected>Pilih Departemen</option>
                                        @foreach($departemen as $dpt)
                                            @php
                                                $selected = ($params['id_department'] == $dpt->id) ? "selected" : "";
                                            @endphp
                                            <option
                                                value="{{$dpt->id}}" {{$selected}}>{{$dpt->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Filter By Status Pegawai</label>
                                    <select class="form-control"
                                            name="employee_status" id="employee_status">
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
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Filter By Jabatan</label>
                                    <select class="form-control"
                                            name="postionfilter">
                                        <option disabled selected>Pilih Jabatan</option>
                                        @foreach($position as $jbt)
                                            @php
                                                $selected = ($params['position_id'] == $jbt->id) ? "selected" : "";
                                            @endphp
                                            <option value="{{$jbt->id}}" {{$selected}}>{{$jbt->position_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Awal Kontrak</label>
                                    <input type="date" id="start_date" name="start_date" value=""
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Selesai Kontrak</label>
                                    <input type="date" id="end_date" name="end_date" value=""
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-outline-primary">Filter <i
                                            class="fe fe-filter fe-12"></i></button>
                                    <a href="{{ route('human-resource-master-employee-list-data') }}"
                                       class="btn btn-outline-secondary">Clear <i
                                            class="fe fe-refresh-cw fe-12"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value="{{$employee->count()}}">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase">
                                <th class="w-3p">No</th>
                                <th class="w-10p">Id Pegawai</th>
                                <th class="w-10p">Nama</th>
                                <th class="w-10p">Departemen</th>
                                <th class="w-10p">Jabatan</th>
                                <th class="w-10p">Status Pegawai</th>
                                <th class="w-10p">Awal Kontrak</th>
                                <th class="w-10p">Selesai Kontrak</th>
                                <th class="w-2p">Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($employee as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->employee_id}}</td>
                                    <td>{{$item->employee_name}}</td>
                                    <td>{{$item->department_name}}</td>
                                    <td>{{$item->position_name}}</td>
                                    <td>{{$item->employee_status}}</td>
                                    <td>{{$item->awal_kontrak}}</td>
                                    <td>{{$item->selesai_kontrak}}</td>

                                    <td class="text-center">
                                        <div class="d-flex">
                                            <a href="{{route('human-resource-master-employee-form-detail', [$item->id])}}"
                                               class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"><i
                                                    class="bx bx-info-circle font-size-base"></i>
                                            </a>
                                            <a href="{{route('human-resource-master-employee-form-edit', [$item->id])}}"
                                               class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"><i
                                                    class="bx bx-edit font-size-base"></i>
                                            </a>
                                            <button class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                    data-id="{{ $item->id }}"><i
                                                    class="bx bx-trash font-size-base"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center" style="background-color: #c2b677">Data tidak
                                        ditemukan
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                url: `/admin/master-data/department/get-position-by-department/${id_department}`,
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




        // ==============
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
                var $EmployeeId = $(this).data('id');

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
                            url: '{{ route('human-resource-master-employee-form-delete') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'employee_id': $EmployeeId
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
