@extends('admin.layouts.app')
@section('content-header')
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Armada</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Armada
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
                        <h4 class="card-title">List Data Master Armada</h4>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <button type="button" class="btn btn-primary mr-1" onclick="openModal('armada','add')"> <i class="bx bx-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-content mt-2">
                <div class="card-body card-dashboard">
                    <div class="table" id="show-data-armada">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="status">
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
@include('admin.master-data.armada.modal')
@include('admin.master-data.armada.seat')
@endsection

@push('page-scripts')
<script src="{{ asset('script/admin/master-data/index.js') }}"></script>
<script>
    function openInfoSeat(e){
        console.log(e)

        $("#modal-seat").modal('show');

        var currentRow=$(e).closest("tr");

        var category = currentRow.find("td:eq(1)").text();
        var type = currentRow.find("td:eq(2)").text();
        var year = currentRow.find("td:eq(3)").text();
        var capacity = currentRow.find("td:eq(4)").text();
        var cylinder = currentRow.find("td:eq(5)").text();
        var seat = currentRow.find("td:eq(6)").text();
        var merk = currentRow.find("td:eq(7)").text();
        var no_police = currentRow.find("td:eq(8)").text();

        $("#infoseat_category").val(category);
        $("#infoseat_type").val(type);
        $("#infoseat_year").val(year);
        $("#infoseat_capacity").val(capacity);
        $("#infoseat_cylinder").val(cylinder);
        $("#infoseat_seat").val(seat);
        $("#infoseat_merk").val(merk);
        $("#infoseat_no_police").val(no_police);

        if(type == 'EXECUTIVE'){
            $("#layout_armada_seat").show();
            $("#layout_seat_graphic_suitess").hide();
            $("#layout_seat_graphic_executive").show();
            $("#layout_armada_info").removeClass("col-12");
            $("#layout_armada_info").addClass("col-8");
        } else if(type == 'SUITESS'){
            $("#layout_armada_seat").show();
            $("#layout_seat_graphic_executive").hide();
            $("#layout_seat_graphic_suitess").show();
            $("#layout_armada_info").removeClass("col-12");
            $("#layout_armada_info").addClass("col-8");
        } else {
            $("#layout_armada_info").removeClass("col-8");
            $("#layout_armada_info").addClass("col-12");
            $("#layout_armada_seat").hide();
        }


    }

    function handleArmadaType(e){
        $("#type_armada_section").show();
        var html = '<option value="">Silahkan Pilih Type Armada</option>';
        if (e.value == 'PARIWISATA'){
            html += '<option value="BIGBUS">BIGBUS</option>';
            html += '<option value="BIGBUS VIP SUITESCLASS">BIGBUS VIP SUITESCLASS</option>';
            html += '<option value="MEDIUM BUS">MEDIUM BUS</option>';
            html += '<option value="MIKRO BUS">MIKRO BUS</option>';
            $("#armada_type").html(html);
        } else if (e.value == 'REGULER'){
            html += '<option value="EXECUTIVE">EXECUTIVE</option>';
            html += '<option value="SUITESS">SUITESS</option>';
            $("#armada_type").html(html);
        } else {
            $("#type_armada_section").hide();
            $("#armada_type").html("");
        }
    }

    $(document).ready(function() {
        $("#type_armada_section").hide();
    });

</script>
@endpush
