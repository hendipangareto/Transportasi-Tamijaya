@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Data</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Bus
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
                            <h4 class="card-title">List Data Master Bus</h4>
                            <div class="col ml-auto">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header pb-0 d-flex justify-content-between mt-2">
                    <h4 class="card-title"> </h4>
                    <button type="button" class="btn btn-primary mr-1" onclick="openModal('bus','add')"><i
                            class="bx bx-plus-circle"></i> Tambah Data</button>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-bus">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="bus">
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

    @include('admin.master-data.bus.modal')
    @include('admin.master-data.bus.gallery')

@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/master-data/index.js') }}"></script>
    <script>
        var index = 0;
        // $("#bus_price").mask("#.##0", { reverse: true });

        function addImage() {
            var html_image =
                `<div class="input-group input-group-sm mb-1" id="row-image-${index}"><input type="file" name="bus_gallery_image[]" class="form-control"> <div class="input-group-append"><button class="btn btn-danger" onclick="removeImage(${index})" type="button">X</button></div> </div>`;
            $("#data-image-bus").append(html_image)
            index++;
        }

        function removeImage(index) {
            $(`#row-image-${index}`).remove();
        }
    </script>
@endpush
