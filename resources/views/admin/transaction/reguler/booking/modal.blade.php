<div class="modal fade text-left" id="modal-armada" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <input type="hidden" id="id" name="id" value="">
                    <label>Category: </label>
                    <div class="form-group">
                        <select id="armada_category" name="armada_category" class="form-control"
                            onChange="handleArmadaType(this)">
                            <option value="">Silahkan Pilih Category Armada</option>
                            <option value="PARIWISATA">PARIWISATA</option>
                            <option value="REGULER">REGULER</option>
                        </select>
                    </div>
                    <div id="type_armada_section">
                        <label>Type: </label>
                        <div class="form-group">
                            <select id="armada_type" name="armada_type" class="form-control">
                            </select>
                        </div>
                    </div>
                    <label>Seat: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan jumlah seat armada" id="armada_seat"
                            name="armada_seat" class="form-control">
                    </div>
                    <label>Merk: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan merk armada" id="armada_merk"
                            name="armada_merk" class="form-control">
                    </div>
                    <label>Police No: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan no polisi armada" id="armada_no_police"
                            name="armada_no_police" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-armada" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-armada" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="modal-customer" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-customer" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Nama customer: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama customer" id="customer_name"
                            name="customer_name" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Telepon: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" id="customer_phone" name="customer_phone"
                                        class="form-control money" placeholder="Nomor telepon">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    </div>
                                    <input type="text" id="customer_email" name="customer_email"
                                        class="form-control money" placeholder="Masukan Email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-customer" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
