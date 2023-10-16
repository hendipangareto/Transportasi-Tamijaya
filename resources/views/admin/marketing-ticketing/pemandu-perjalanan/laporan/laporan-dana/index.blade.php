@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Pemandu Perjalanan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Laporan Dana
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
                                        <label for="">Tanggal Keberangkatan</label>
                                        <input type="date" name="tgl_go" class="form-control">
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
                                        <label for="">Nopol Armada</label>
                                        <select name="armada_nopol" class="form-control">
                                            <option value="" selected disabled>Pilih nopol armada</option>
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

                        <ul class="nav nav-tabs nav-justified" id="tabDriverConductor" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="dana-cash-tab-justified"
                                   data-toggle="tab" href="#dana-cash-data" role="tab"
                                   aria-controls="dana-cash-data"
                                   aria-selected="true">
                                    Dana Cash
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dana-transfer-tab-justified"
                                   data-toggle="tab" href="#dana-transfer-data" role="tab"
                                   aria-controls="dana-transfer-data"
                                   aria-selected="true">
                                    Dana Transfer
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="dana-cash-data" role="tabpanel"
                                 aria-labelledby="dana-cash-tab-justified">
                                @include('admin.marketing-ticketing.pemandu-perjalanan.laporan.laporan-dana.dana-cash')
                            </div>
                            <div class="tab-pane" id="dana-transfer-data" role="tabpanel"
                                 aria-labelledby="dana-transfer-tab-justified">
                                @include('admin.marketing-ticketing.pemandu-perjalanan.laporan.laporan-dana.dana-transfer')
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
        function sendKwitansi() {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang di kirim akan di proses lebih lanjut",
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
