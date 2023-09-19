<div class="modal fade text-left" id="TambahAlat" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Alat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.alat-kerja-bengkel.simpan-alat-kerja-bengkel') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">

                    <label>Nama Alat : </label>
                    <div class="form-group">
                        <input type="text" id="nama_alat_kerja_bengkel" name="nama_alat_kerja_bengkel"
                               class="form-control bg-transparent" placeholder="nama alat kerja bengkeln">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Kuantitas : </label>
                                    <input type="text" id="kuantitas_alat_kerja_bengkel"
                                           name="kuantitas_alat_kerja_bengkel" class="form-control"
                                           placeholder="kuantitas alat kerja bengkel">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>Satuan</label>
                                    <select name="satuan_id" id="satuan_id" class="form-control">
                                        <option selected disabled>Pilih Satuan</option>
                                        @foreach($satuan as $bg)
                                            <option value="{{$bg->id}}">{{ $bg->nama_satuan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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
