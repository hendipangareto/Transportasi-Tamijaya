@foreach($agent as $item)
    <div class="modal fade text-left" id="DetailAgent-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="pb-2 text-center">Detail Data Agent</h5>
                        <div class="card">
                            <div class="table">
                                <hr style="border-top: 1px dashed #808080;">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Kode Agent</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_code }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nama Agen</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nomor HP</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_hp}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nomor Telepon</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_tlp }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Email</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_email }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Provinsi/Kota</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->state }} / {{ $item->city }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Alamat</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_alamat }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Keterangan</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_description }}
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

