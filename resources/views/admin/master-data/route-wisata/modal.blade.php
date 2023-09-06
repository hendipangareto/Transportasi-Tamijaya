<div class="modal fade text-left" id="modal-route-wisata" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Rute Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-route-wisata" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label>Kode Rute Wisata: </label>
                            <div class="form-group">
                                <input type="text" readonly id="route_wisata_code" name="route_wisata_code"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tipe Rute: </label>
                            <div class="form-group">
                                <select id="route_wisata_type" name="route_wisata_type" class="form-control">
                                    <option value=""> --Silahkan Pilih Tipe--</option>
                                    <option value="">Penjemputan</option>
                                    <option value="">Perjalanan</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <label>Dari Destinasi: </label>
                    <div class="form-group">
                        <select id="route_wisata_from" name="route_wisata_from" class="form-control">
                            <option value=""> --Silahkan Pilih Dari Wisata--</option>
                            @foreach ($destinations as $destionation_from)
                                <option value="{{ $destionation_from->id }}">
                                    {{ $destionation_from->destination_wisata_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Tujuan Destinasi: </label>
                    <div class="form-group">
                        <select id="route_wisata_target" name="route_wisata_target" class="form-control">
                            <option value=""> --Silahkan Pilih Tujuan Wisata--</option>
                            @foreach ($destinations as $destionation_to)
                                <option value="{{ $destionation_to->id }}">
                                    {{ $destionation_to->destination_wisata_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Estimasi: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="route_wisata_estimate"
                                        name="route_wisata_estimate">
                                    <div class="input-group-append">
                                        <span class="input-group-text">hari</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <label>Harga Rute Wisata: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input id="route_wisata_price" name="route_wisata_price" type="text"
                                        class="form-control">
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="col-md-4">
                        </div> --}}
                    </div>

                    <label>Uraian Rute Wisata: </label>
                    <div class="form-group">
                        <textarea type="text" rows="3" placeholder="Silahkan masukan uraian Rute Wisata"
                            id="route_wisata_description" name="route_wisata_description"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-route-wisata" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-route-wisata" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
