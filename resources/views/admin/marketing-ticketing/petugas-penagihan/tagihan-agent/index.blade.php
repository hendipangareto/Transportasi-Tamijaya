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
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Nama Agent</label>
                                        <select name="agent_name" class="form-control">
                                            <option value="" selected disabled>Pilih nama agent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tipe Transaksi</label>
                                        <select name="tipe_transaksi" class="form-control">
                                            <option value="" selected disabled>Pilih tipe transaksi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pembayaran tagian</label>
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
                                        <a href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-index')}}" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <a href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-index')}}" class="btn btn-primary">Rekap Hutang</a>
                        <a href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-hutang-agent')}}" class="btn btn-outline-primary">Hutang Agent</a>
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                   <th class="w-3p">No</th>
                                   <th class="w-15p">Nama Agent</th>
                                   <th class="w-5p">Nomor Transaksi</th>
                                   <th class="w-10p">Total Hutang</th>
                                   <th class="w-10p">Tipe transaksi</th>
                                   <th class="w-10p">Status Pembayaran</th>
                                   <th class="w-5p">Aksi</th>
                               </tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>#</td>
                                   <td>#</td>
                                   <td>#</td>
                                   <td>#</td>
                                   <td>#</td>
                                   <td>#</td>
                                   <td>
                                       <div class="d-flex">
                                           <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                data-toggle="modal"
                                                data-target="#">
                                               <i class="bx bx-info-circle font-size-base"></i>
                                           </div>
                                           <div
                                               class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                               data-toggle="modal" title="edit"
                                               data-target="#">
                                               <i class="bx bx-check font-size-base"></i>
                                           </div>
                                           <div
                                               class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer">
                                               <i class='bx bx-paperclip' ></i>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               </tbody>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    @include('admin.finance-accounting.menu-keuangan.administrasi.detail-pembelajaan.modal')--}}
@endsection

@push('page-scripts')
@endpush
