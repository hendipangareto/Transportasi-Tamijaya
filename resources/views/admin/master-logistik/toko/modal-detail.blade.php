@foreach($Toko as $item)
<div class="modal fade text-left" id="DetailToko-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Toko</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Toko</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_toko }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Toko</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_toko }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nomor Telepon</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->tlp_toko }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nomor HP</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->hp_toko}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">PIC</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->pic_toko }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Alamat</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->alamat_toko }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Provinsi/Kota</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->province }} ➡ {{ $item->city }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px dashed #808080;">
                        </div>
                        <div class="row ml-1 justify-content-lg-end">
                            <button type="button"   class="btn btn-secondary mr-1"  data-dismiss="modal" > Kembali ➡
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach
