@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
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
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4 class="card-title">List Data Master Karyawan</h4>
                    <button type="button" class="btn btn-primary mr-1" onclick="openModal('master-employee','add')"><i
                            class="bx bx-plus-circle"></i> Tambah Data</button>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-master-employee">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="master-employee">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.human-resource.master-employee.modal')

    @php
    foreach ($positions as $position) {
        $arr_position[] = [
            'id_position' => $position->id,
            'id_department' => $position->id_department,
            'position_name' => $position->position_name,
        ];
    }

    // $object = json_encode($arr_position);
    // echo '<pre>';
    // print_r($arr_position);
    // echo '</pre>';

    @endphp
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/human-resource/master-employee.js') }}"></script>

    <script>
        const changeDeparment = () => {
            var id_department = $("#id_department").val();
            $.ajax({
                url: `/admin/master-data/department/get-position-by-department/${id_department}`,
                method: "get",
                dataType: "json",
                success: function(response) {
                    var positions = response.data;
                    var html = `<option value="">Silahkan Pilih Jabatan</option>`;
                    positions.forEach(position => {
                        html += `<option value="${position.id}">${position.position_name}</option>`;
                    });
                    $("#id_position").html(html)
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>



    {{-- <script>
        var arr_position = [];
        arr_position = `<?php $arr_position; ?>`;
        console.log(arr_position)
    </script> --}}
@endpush
