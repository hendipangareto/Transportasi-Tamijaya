<div class="modal fade text-left" id="TambahTravelFacility" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Fasilitas Perjalanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('simpan-travel-facility') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="travel_facility_code" name="travel_facility_code" value="">
{{--                    <label>Kode Fasilitas: </label>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" readonly id="facility_code" name="facility_code"--}}
{{--                               class="form-control bg-transparent">--}}
{{--                    </div>--}}
                    <label>Nama Fasilitas: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Fasilitas" id="travel_facility_name"
                               name="travel_facility_name" class="form-control">
                    </div>
                    <label>Uraian Fasilitas: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Fasilitas"
                                  id="travel_facility_description" name="travel_facility_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary mr-1"><i
                            class="bx bx-arrow-back mt"></i> Kembali</button>
                    <button type="submit"  class="btn btn-success mr-1
                             "><i class="bx bx-save mt"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




{{--================================EDIT DATA===============================================================================--}}

<div class="modal fade text-left" id="UpdateTravelFacility-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Fasilitas Perjalanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('simpan-travel-facility') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
{{--                    <input type="hidden" id="travel_facility_code" name="travel_facility_code" value="">--}}
                    <label>Kode Fasilitas: </label>
                    <div class="form-group">
                        <input type="text" readonly id="travel_facility_code" name="travel_facility_code"
                               class="form-control bg-transparent" value="{{ $data->travel_facility_code }}">
                    </div>
                    <label>Nama Fasilitas: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Fasilitas" id="travel_facility_name"
                               name="travel_facility_name" class="form-control" value="{{ $data->travel_facility_name }}">
                    </div>
                    <label>Uraian Fasilitas: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Fasilitas"
                                  id="travel_facility_description" name="travel_facility_description" class="form-control" data-value="{{ $data->travel_facility_description }}">{{ $data->travel_facility_description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary mr-1"><i
                            class="bx bx-arrow-back mt"></i> Kembali</button>
                    <button type="submit"  class="btn btn-success mr-1
                             "><i class="bx bx-save mt"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
