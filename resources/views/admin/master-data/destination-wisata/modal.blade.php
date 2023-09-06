<div class="modal fade text-left" id="modal-destination-wisata" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Destinasi Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-destination-wisata" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Destinasi Wisata: </label>
                    <div class="form-group">
                        <input type="text" readonly id="destination_wisata_code" name="destination_wisata_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Provinsi Wisata: </label>
                    <div class="form-group">
                        <select id="destination_wisata_province" name="destination_wisata_province"
                            class="form-control">
                            <option value=""> --Silahkan Pilih Provinsi--</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <label>Nama Destinasi Wisata: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Destinasi Wisata"
                            id="destination_wisata_name" name="destination_wisata_name" class="form-control">
                    </div>
                    <label>Uraian Destinasi Wisata: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Destinasi Wisata"
                            id="destination_wisata_description" name="destination_wisata_description"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-destination-wisata" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-destination-wisata" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
