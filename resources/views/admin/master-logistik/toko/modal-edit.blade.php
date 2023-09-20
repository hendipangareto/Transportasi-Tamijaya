@foreach($Toko as $item)
<div class="modal fade text-left" id="EditToko-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.toko.update-toko', $item->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>Kode Toko: </label>
                    <div class="form-group">
                        <input type="text" id="kode_toko" name="kode_toko"
                               class="form-control bg-transparent" value="{{ $item->kode_toko }}" readonly>
                    </div>
                    <label>Nama Toko: </label>
                    <div class="form-group">
                        <input type="text" id="nama_toko" name="nama_toko"
                               class="form-control bg-transparent" value="{{ $item->nama_toko }}">
                    </div>
                    <label>PIC Toko: </label>
                    <div class="form-group">
                        <input type="text" id="pic_toko" name="pic_toko"
                               class="form-control bg-transparent" value="{{ $item->pic_toko }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>No Telepon: </label>
                                    <input type="number" id="tlp_toko" name="tlp_toko" class="form-control"
                                           style="font-style: italic"
                                           value="{{ $item->tlp_toko }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>No HP : </label>
                                    <input type="text" id="hp_toko" name="hp_toko" class="form-control"
                                           style="font-style: italic"
                                           value="{{ $item->hp_toko }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Provinsi</label>
                                    <select onchange="changeProvince()" id="id_province" name="id_province" class="form-control">
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Kabupaten/Kota: </label>
                                    <div class="form-group">
                                        <select name="id_city" id="id_city" class="form-control">
                                            <option value="{{ $item->city  }}">Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Alamat : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat_toko"
                                  id="alamat_toko" cols="30"
                                  rows="3"
                                  data-value="{{ $item->alamat_toko }}">{{ $item->alamat_toko }}

                        </textarea>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_toko"
                                  id="deskripsi_toko" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_toko }}">{{ $item->deskripsi_toko }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
