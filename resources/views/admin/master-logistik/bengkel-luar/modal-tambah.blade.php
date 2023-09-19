<div class="modal fade text-left" id="TambahBengkelLuar" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Bengkel Luar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.bengkel-luar.simpan-bengkel-luar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_bengkel_luar" name="kode_bengkel_luar" value="">

                    <label>PIC: </label>
                    <div class="form-group">
                        <input type="text" id="nama_bengkel_luar" name="nama_bengkel_luar"
                               class="form-control bg-transparent" placeholder="PIC">
                    </div>
                    <label>Nama Bengkel: </label>
                    <div class="form-group">
                        <input type="text" id="pic_bengkel_luar" name="pic_bengkel_luar"
                               class="form-control bg-transparent" placeholder="Nama Bengkel">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>HandPhone :</label>
                                    <input type="number" id="hp_bengkel_luar" name="hp_bengkel_luar"
                                           class="form-control bg-transparent" placeholder="HandPhone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Telepon :</label>
                                    <input type="number" id="tlp_bengkel_luar" name="tlp_bengkel_luar"
                                           class="form-control bg-transparent" placeholder="Telepon">
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
                        <textarea class="form-control" name="alamat_bengkel_luar"
                                  id="alamat_bengkel_luar" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_bengkel_luar"
                                  id="deskripsi_bengkel_luar" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

