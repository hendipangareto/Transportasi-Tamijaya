
@foreach($kategori as $item)
    <div class="modal fade text-left" id="EditkategoriBarang-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Kategori Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('master-logistik.update-kategori-barang', $item->id) }}" id="form-agent" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="">
                        <label>Kode Kategori : </label>
                        <div class="form-group">
                            <input type="text" readonly id="kode_kategori" name="kode_kategori"
                                   class="form-control bg-transparent" value="{{ $item->kode_kategori }}" readonly>
                        </div>
                        <label>Kategori Barang: </label>
                        <div class="form-group">
                            <input type="text"  id="nama_kategori"  name="nama_kategori"
                                   class="form-control bg-transparent" value="{{ $item->nama_kategori }}">
                        </div>
                        <label>Deskripsi Kategori: </label>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_kategori" id="deskripsi_kategori" cols="30"
                                  rows="3" value="{{ $item->deskripsi_kategori }}">{{ $item->deskripsi_kategori }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="add-agent" class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                                class="bx bx-arrow-back"></i> Kembali
                        </button>
                        <button type="submit" id="edit-agent" class="btn btn-success mr-1" onclick="manageData('update')"><i
                                class="bx bx-save mt"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
