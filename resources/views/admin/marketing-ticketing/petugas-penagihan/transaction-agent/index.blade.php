@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Petugas Penagihan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Transaksi Agent
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
                            <h4 class="card-title">List Laporan Dana</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Nama Agent</label>
                                        <select name="agent_names" class="form-control">
                                            <option value="" selected disabled>Pilih nama agent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tanggal Transaksi</label>
                                        <input type="date" name="tgl_transactions" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tipe Armada</label>
                                        <select name="armada_tipe" class="form-control">
                                            <option value="" selected disabled>Pilih tipe armada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pembayaran</label>
                                        <select name="status_pembayarans" class="form-control">
                                            <option value="" selected disabled>Pilih status pembayaran</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">

                        <ul class="nav nav-tabs nav-justified" id="tabTransactionAgent" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="bus-reguler-tab-justified"
                                   data-toggle="tab" href="#bus-reguler-data" role="tab"
                                   aria-controls="bus-reguler-data"
                                   aria-selected="true">
                                    BUS REGULER
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bus-pariwisata-tab-justified"
                                   data-toggle="tab" href="#bus-pariwisata-data" role="tab"
                                   aria-controls="bus-pariwisata-data"
                                   aria-selected="true">
                                    BUS PARIWISATA
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="bus-reguler-data" role="tabpanel"
                                 aria-labelledby="bus-reguler-tab-justified">
                                @include('admin.marketing-ticketing.petugas-penagihan.transaction-agent.bus-reguler')
                            </div>
                            <div class="tab-pane" id="bus-pariwisata-data" role="tabpanel"
                                 aria-labelledby="bus-pariwisata-tab-justified">
                                @include('admin.marketing-ticketing.petugas-penagihan.transaction-agent.bus-pariwisata')
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
{{--    <script>--}}
    {{--    function sendKwitansi() {--}}
    {{--        Swal.fire({--}}
    {{--            title: "Apakah anda yakin?",--}}
    {{--            text: "Data yang di kirim akan di proses lebih lanjut",--}}
    {{--            icon: "warning",--}}
    {{--            showCancelButton: true,--}}
    {{--            confirmButtonColor: "#3085d6",--}}
    {{--            cancelButtonColor: "#d33",--}}
    {{--            confirmButtonText: "Ya, hapus!"--}}
    {{--        }).then((result) => {--}}
    {{--            if (result.isConfirmed) {--}}
    {{--                $.ajax({--}}
    {{--                    url: '',--}}
    {{--                    type: 'GET',--}}
    {{--                    data: {--}}
    {{--                        '_token': '{{ csrf_token() }}',--}}
    {{--                    },--}}
    {{--                    success: function (response) {--}}
    {{--                        console.log(response)--}}
    {{--                        location.reload();--}}
    {{--                        Toast.fire({--}}
    {{--                            icon: "success",--}}
    {{--                            title: "Berhasil mengirim kwitansi"--}}
    {{--                        });--}}
    {{--                    },--}}
    {{--                    error: function (err) {--}}
    {{--                        console.log(err);--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--    }--}}
    {{--</script>--}}
@endpush
