<div class="modal fade text-left" id="modal-seat" tabindex="-1" role="dialog" aria-labelledby="modal-seat"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Armada</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-armada" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div id="layout_armada_info" class="col-8">
                            <label>Bus Detail</label><br />
                            <div class="row">
                                <div class="col-6">
                                    <label>Category:</label>
                                    <input id="infoseat_category" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-6">
                                    <label>Type:</label>
                                    <input id="infoseat_type" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Year:</label>
                                    <input id="infoseat_year" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Capacity:</label>
                                    <input id="infoseat_capacity" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Cylinder:</label>
                                    <input id="infoseat_cylinder" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Seat:</label>
                                    <input id="infoseat_seat" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Merk:</label>
                                    <input id="infoseat_merk" class="form-control" type="text" readonly>
                                </div>
                                <div class="col-4">
                                    <label>No Police:</label>
                                    <input id="infoseat_no_police" class="form-control" type="text" readonly>
                                </div>
                                {{-- $("#infoseat_category").val(category);
                                $("#infoseat_type").val(type);
                                $("#infoseat_seat").val(seat);
                                $("#infoseat_merk").val(merk);
                                $("#infoseat_no_police").val(no_police); --}}
                            </div>
                        </div>
                        <div id="layout_armada_seat" class="col-4">
                            <label>Layout Bus</label>
                            <div id="layout_seat_graphic_executive" style="display:none">
                                @include('admin.master-data.armada.seat-executive')
                            </div>
                            <div id="layout_seat_graphic_suitess" style="display:none">
                                @include('admin.master-data.armada.seat-suitess')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
