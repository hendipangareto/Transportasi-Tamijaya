@foreach($BengkelLuar as $item)
    <div class="modal fade text-left" id="EditBengkel-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Bengkel Luar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.master-logistik.bengkel-luar.edit-bengkel-luar', $item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <label>Kode Bengkel Luar: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="kode_bengkel_luar" name="kode_bengkel_luar"
                                   value="{{ $item->kode_bengkel_luar }}" readonly>
                        </div>
                        <label>PIC: </label>
                        <div class="form-group">
                            <input type="text" id="nama_bengkel_luar" name="nama_bengkel_luar"
                                   class="form-control bg-transparent" value="{{ $item->nama_bengkel_luar }}">
                        </div>
                        <label>Nama Bengkel: </label>
                        <div class="form-group">
                            <input type="text" id="pic_bengkel_luar" name="pic_bengkel_luar"
                                   class="form-control bg-transparent" value="{{ $item->pic_bengkel_luar }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>HandPhone :</label>
                                        <input type="number" id="hp_bengkel_luar" name="hp_bengkel_luar"
                                               class="form-control bg-transparent" value="{{ $item->hp_bengkel_luar }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Telepon :</label>
                                        <input type="number" id="tlp_bengkel_luar" name="tlp_bengkel_luar"
                                               class="form-control bg-transparent"
                                               value="{{ $item->tlp_bengkel_luar }}">
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

                                            @foreach($province as $prv)
                                                <option value="{{$prv->id}}">{{ $prv->state_name}}</option>
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

                                            @foreach($city as $cty)
                                                <option value="{{$cty->id}}">{{ $cty->city_name}}</option>
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
                                  value="{{ $item->alamat_bengkel_luar }}">{{ $item->alamat_bengkel_luar }}

                        </textarea>
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_bengkel_luar"
                                  id="deskripsi_bengkel_luar" cols="30"
                                  rows="3"
                                  value="{{ $item->deskripsi_bengkel_luar }}">{{ $item->deskripsi_bengkel_luar }}

                        </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mr-1"><i
                                class="bx bx-save mt"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

