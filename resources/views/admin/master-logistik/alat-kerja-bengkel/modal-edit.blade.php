@foreach($AlatKerjaBengkel as $item)
<div class="modal fade text-left" id="UpdateAlat-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Alat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.alat-kerja-bengkel.update-alat-kerja-bengkel', $item->id) }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>kode Alat : </label>
                                    <input type="text" id="kode_alat_kerja_bengkel" name="kode_alat_kerja_bengkel"
                                           class="form-control bg-transparent" value="{{ $item->kode_alat_kerja_bengkel }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>Nama Alat :</label>
                                    <input type="text" id="nama_alat_kerja_bengkel" name="nama_alat_kerja_bengkel"
                                           class="form-control bg-transparent" value="{{ $item->nama_alat_kerja_bengkel }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Kuantitas : </label>
                                    <input type="text" id="kuantitas_alat_kerja_bengkel"
                                           name="kuantitas_alat_kerja_bengkel" class="form-control"
                                           value="{{ $item->kuantitas_alat_kerja_bengkel }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>Satuan</label>
                                    <select name="satuan_id" id="satuan_id" class="form-control">

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
