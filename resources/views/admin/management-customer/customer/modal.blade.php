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
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode customer: </label>
                    <div class="form-group">
                        <input type="text" readonly id="customer_code" name="customer_code"
                            class="form-control bg-transparent">
                    </div>
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
                                    <input type="text" id="customer_phone" name="customer_phone" class="form-control money"
                                        placeholder="Nomor telepon">
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
                                    <input type="text" id="customer_email" name="customer_email" class="form-control money"
                                        placeholder="Masukan Email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Provinsi: </label>
                            <div class="form-group">
                                <select onchange="changeProvince()" id="id_province" name="id_province" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kota: </label>
                            <div class="form-group">
                                <select name="id_city" id="id_city" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Alamat: </label>
                    <div class="form-group">
                        <textarea name="customer_address" id="customer_address" cols="30" rows="3" class="form-control"
                            placeholder="Silahkan masukan alamat customer"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-customer" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-customer" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
