@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Tagihan Agent</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Hutang Transaksi Agent
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
                            <h4 class="card-title">Rekap Hutang Transaksi Agent</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <a href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-index')}}" class="btn btn-outline-primary">Rekap Hutang</a>
                        <a href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-hutang-agent')}}" class="btn btn-primary">Hutang Agent</a>
                    </div>
                    <div class="card-body card-dashboard">

                        <ul class="nav nav-tabs nav-justified" id="tabHutangTransaksiAgent" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="hutang-bus-reguler-tab-justified"
                                   data-toggle="tab" href="#hutang-bus-reguler-data" role="tab"
                                   aria-controls="hutang-bus-reguler-data"
                                   aria-selected="true">
                                    Hutang Transaksi Bus Reguler
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hutang-bus-pariwisata-tab-justified"
                                   data-toggle="tab" href="#hutang-bus-pariwisata-data" role="tab"
                                   aria-controls="hutang-bus-pariwisata-data"
                                   aria-selected="true">
                                    Hutang Transaksi Bus Pariwisata
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="hutang-bus-reguler-data" role="tabpanel"
                                 aria-labelledby="hutang-bus-reguler-tab-justified">
                                @include('admin.marketing-ticketing.petugas-penagihan.tagihan-agent.hutang-bus-reguler')
                            </div>
                            <div class="tab-pane" id="hutang-bus-pariwisata-data" role="tabpanel"
                                 aria-labelledby="hutang-bus-pariwisata-tab-justified">
                               @include('admin.marketing-ticketing.petugas-penagihan.tagihan-agent.hutang-bus-pariwisata')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    @include('admin.finance-accounting.menu-keuangan.administrasi.detail-pembelajaan.modal')--}}
@endsection

@push('page-scripts')
    <script>
        function approved() {
            Swal.fire({
                title: "Apakah anda yakin Approve?",
                text: "Data yang di approve akan di proses lebih lanjut",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '',
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function (response) {
                            console.log(response)
                            location.reload();
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil mengirim kwitansi"
                            });
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        }
    </script>
@endpush
