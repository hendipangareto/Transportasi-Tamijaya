<div class="modal fade text-left" id="TambahLaporanPerjalanan" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Laporan Perjalanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">

                    <label>Bagian : </label>
                    <div class="form-group">
                        <select name="employee_id" id="employee_select" class="form-control">
                            <option selected disabled>Pilih Bagian</option>
                            <option value=" ">jkljlk </option>
                        </select>
                    </div>
                    <label>Keluhan : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="agent_description"
                                  id="agent_description" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
