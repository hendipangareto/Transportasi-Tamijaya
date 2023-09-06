<div class="modal fade text-left" id="modal-bus" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Bus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-bus" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kode Bus: </label>
                            <div class="form-group">
                                <input type="text" readonly id="bus_code" name="bus_code"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tipe Bus: </label>
                            <div class="form-group">
                                <select name="bus_type" id="bus_type" class="form-control">
                                    <option value="">Pilih Tipe Bus</option>
                                    <option value="PARIWISATA">PARIWISATA</option>
                                    <option value="REGULER">REGULER</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Nama Bus: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Bus" id="bus_name" name="bus_name"
                            class="form-control">
                    </div>
                    <label>Harga Bus: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan harga Bus" id="bus_price" name="bus_price"
                            class="form-control">
                    </div>
                    <label>Fasilitas Bus: </label>
                    <div class="form-group">
                        <select name="bus_facilities[]" id="bus_facilities" class="form-control select2"
                            multiple="multiple">
                            @foreach ($faciltiies as $facility)
                                <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kapasitas: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Kapasitas Seat"
                                        id="bus_capacity" name="bus_capacity">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Seat</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Gambar Bus: </label>
                            <div class="form-group">
                                <input type="file" id="bus_image" name="bus_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <label>Deskripsi Bus: </label>
                    <div class="form-group">
                        <textarea type="text" rows="3" placeholder="Silahkan masukan deskripsi Bus" id="bus_description" name="bus_description"
                            class="form-control"></textarea>
                    </div>

                    {{-- Gallery Bus --}}
                    <div class="row mb-1">
                        <div class="col-md-7"><label>Gallery Bus: </label></div>
                        <div class="col-md-5">
                            <div class="badge badge-primary d-inline-flex align-items-center pointer"
                                onclick="addImage()">
                                <i class="bx bxs-image-add"></i>
                                <span>TAMBAH GAMBAR</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="data-image-bus">

                        </div>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="submit" id="add-bus" class="btn btn-success mr-1" onclick="manageData('save')"><i
                                class="bx bx-check mt"></i> Submit</button>
                        <button type="submit" id="edit-bus" class="btn btn-warning mr-1"
                            onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade text-left" id="modal-bus-test" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Bus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
