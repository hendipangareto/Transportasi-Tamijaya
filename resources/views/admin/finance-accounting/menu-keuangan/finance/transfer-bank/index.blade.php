@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Transfer Bank
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{route('finance-accounting-menu-keuangan-finance-transfer-bank-approved')}}"
          method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #00b3ff">
                        <div class="toolbar row ">
                            <div class="col-md-12 d-flex">
                                <h4 class="card-title">Form Transfer Bank</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-content pt-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Nomer Pengajuan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pengajuan_no" class="form-control"
                                                   placeholder="Nomer auto generate" style="font-style: italic"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Tanggal Pengajuan</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal_approval" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Dari Kas</label>
                                        <div class="col-sm-9">
                                            <select name="start_kas" id="start_kas" class="form-control">
                                                <option value="" selected disabled>Pilih kas awal</option>
                                                @foreach($bank as $bnk)
                                                    <option value="{{$bnk->id}}">{{$bnk->bank_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Ke Kas</label>
                                        <div class="col-sm-9">
                                            <select name="start_kas" id="start_kas" class="form-control">
                                                <option value="" selected disabled>Pilih kas tujuan</option>
                                                @foreach($bank as $bnk)
                                                    <option value="{{$bnk->id}}">{{$bnk->bank_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Dari Kas</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control money" id="nominal_transfer"
                                                       style="font-style: italic"
                                                       name="nominal_transfer"
                                                       placeholder="Masukan nominal transfer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Terbilang</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" name="terbilang" class="form-control bg-transparent"
                                                       placeholder="Terbilang dalam rupiah" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 col-form-label">Lampirkan Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="document" class="form-control"
                                                   placeholder="Pilih file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-footer">
                        <div class="float-right">
                            <button class="btn btn-primary"><i class="bx bx-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('page-scripts')
@endpush
