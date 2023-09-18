<div class="modal fade text-left" id="TambahToko" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.toko.simpan-toko') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_toko" name="kode_toko" value="">
                    <label>Nama Toko: </label>
                    <div class="form-group">
                        <input type="text" id="nama_toko" name="nama_toko"
                               class="form-control bg-transparent" placeholder="PIC">
                    </div>
                    <label>PIC Toko: </label>
                    <div class="form-group">
                        <input type="text" id="pic_toko" name="pic_toko"
                               class="form-control bg-transparent" placeholder="PIC">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>No Telepon: </label>
                                    <input type="number" id="tlp_toko" name="tlp_toko" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Departemen otomatis" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>No HP : </label>
                                    <input type="text" id="hp_toko" name="hp_toko" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Departemen otomatis" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Provinsi</label>
                                    <select name="id_province" id="id_province" class="form-control">
                                        <option selected disabled>Pilih Provinsi</option>
                                        @foreach($province as $item)
                                            <option value="{{$item->id}}">{{ $item->state_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Kabupaten/Kota</label>
                                    <select name="id_city" id="id_city" class="form-control">
                                        <option selected disabled>Pilih Kabupaten/Kota</option>
                                        @foreach($city as $item)
                                            <option value="{{$item->id}}">{{ $item->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Alamat : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat_toko"
                                  id="alamat_toko" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_toko"
                                  id="deskripsi_toko" cols="30"
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
