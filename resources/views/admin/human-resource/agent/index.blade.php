@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Umum</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Data Master Agent
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
                <div class="card-header">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 ">List Data Agent</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#TambahAgent"><i
                                            class="bx bx-plus-circle"></i> Tambah Data
                                    </button>
                                    <a target="_blank"
                                       href="{{route('human-resource-agent-cetak-pdf-agent')}}"
                                       type="button"
                                       class="btn btn-danger text-white">
                                        <i class="bx bx-printer"></i> Report PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <table class="table table-bordered table-hover" id="table-agent">
                            <thead>
                            <tr>
                                <th class="w-3p">No</th>
                                <th class="w-5p">Kode</th>
                                <th class="w-15p">Nama Agen</th>
                                <th class="w-10p">Provinsi</th>
                                <th class="w-10p">Kota</th>
                                <th class="w-10p">Keterangan</th>
                                <th class="w-5p text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->agent_code }}</td>
                                    <td>{{ $item->agent_name }}</td>
                                    <td>{{ $item->state_name }}</td>
                                    <td>{{ $item->city_name }}</td>
                                    <td>{{ $item->agent_description }}</td>

                                    <td class="text-center">
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal" data-target="#DetailAgent-{{ $item->id }}">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                 data-toggle="modal" data-target="#EditAgent-{{ $item->id }}">
                                                <i class="bx bx-edit font-size-base"></i>
                                            </div>
                                            <div
                                                class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                data-id="{{ $item->id }}">
                                                <i class="bx bx-trash font-size-base"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.human-resource.agent.modal')
    @include('admin.human-resource.agent.display')
@endsection

@push('page-scripts')

    <script>

        $(document).ready(function () {
            $("#table-agent").DataTable();
        });


        function changeProvince() {
            var id_province = $("#id_province").val();
            $.ajax({
                url: `/admin/master-data/province/get-city-by-province/${id_province}`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    var cities = response.data;
                    var html = `<option value="">Pilih Kabupaten/Kota</option>`;
                    cities.forEach(city => {
                        html += `<option value="${city.id}">${city.city_name}</option>`;
                    });
                    $("#id_city").html(html);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }


        // HAPUS DATA
        $(document).ready(function () {
            $('.delete-button').click(function () {
                var agentId = $(this).data('id');

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
                            url: '{{ route('human-resource.data-agent.delete-data-agent') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'agent_id': agentId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data agen"
                                });
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
