<div class="modal fade text-left" id="TambahKomponen" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Komponen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.komponen.simpan-komponen') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_komponen" name="kode_komponen" value="">

                    <label>Nama Komponen : </label>
                    <div class="form-group">
                        <input type="text" id="nama_komponen" name="nama_komponen"
                               class="form-control bg-transparent" placeholder="nama komponen">
                    </div>
                    <label>Nama Sub-Bagian : </label>
                    <div class="form-group">
                        <select name="sub_bagian_id" id="sub_bagian_id" class="form-control">
                            <option selected disabled>Pilih Bagian</option>
                            @foreach($SubBagian as $item)
                                <option value="{{$item->id}}">{{ $item->nama_sub_bagian}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_komponen"
                                  id="deskripsi" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

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
