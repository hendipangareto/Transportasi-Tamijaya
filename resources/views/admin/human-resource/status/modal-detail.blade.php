@foreach($status as $item)
    <div class="modal fade text-left" id="DetailModalStatus-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Status</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Status</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->status_code }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Status</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->status_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Deskripsi Status</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->status_description}}
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
@endforeach
