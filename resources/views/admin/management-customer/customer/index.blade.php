@extends('admin.layouts.app')
@section('content-header')
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Management Customer</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Customer
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
                <h4 class="card-title">List Data Master Customer</h4>
                <button type="button" class="btn btn-primary mr-1" onclick="openModal('customer','add')"><i
                        class="bx bx-plus-circle"></i> Tambah Data</button>
            </div>
            <div class="card-content pt-1">
                <div class="card-body card-dashboard">
                    <div class="table-responsive" id="show-data-customer">                       
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="customer">
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

@include('admin.management-customer.customer.modal')
@endsection

@push('page-scripts')
<script src="{{ asset('script/admin/management-customer/index.js') }}"></script>

<script>
    const changeProvince = () => {
        var id_province = $("#id_province").val();
        $.ajax({
            url: `/admin/master-data/province/get-city-by-province/${id_province}`,
            method: "get",
            dataType: "json",
            success: function(response) {
                var cities = response.data;
                var html = `<option value="">Pilih Kota</option>`;
                cities.forEach(city => {
                    html += `<option value="${city.id}">${city.city_name}</option>`;
                });
                $("#id_city").html(html)
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
</script>
@endpush
