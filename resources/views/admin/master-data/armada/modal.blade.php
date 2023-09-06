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
                    <input type="hidden" id="id" name="id" value="" >
                    <label>Category: </label>
                    <div class="form-group">
                        <select id="armada_category" name="armada_category" class="form-control" onChange="handleArmadaType(this)">
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
                    <label>Year: </label>
                    <div class="form-group">
                        <input type="number" placeholder="Silahkan masukan tahun armada" id="armada_year" name="armada_year" class="form-control" >
                    </div>
                    <label>Capacity: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan jumlah daya angkut armada" id="armada_capacity" name="armada_capacity" class="form-control" >
                    </div>
                    <label>Cylinder: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan jumlah CC armada" id="armada_cylinder" name="armada_cylinder" class="form-control" >
                    </div>
                    <label>Seat: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan jumlah seat armada" id="armada_seat" name="armada_seat" class="form-control" >
                    </div>
                    <label>Merk: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan merk armada" id="armada_merk" name="armada_merk" class="form-control" >
                    </div>
                    <label>Police No: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan no polisi armada" id="armada_no_police" name="armada_no_police" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-armada"  class="btn btn-success mr-1" onclick="manageData('save')"><i
                        class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-armada"  class="btn btn-warning mr-1" onclick="manageData('update')"><i
                            class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
