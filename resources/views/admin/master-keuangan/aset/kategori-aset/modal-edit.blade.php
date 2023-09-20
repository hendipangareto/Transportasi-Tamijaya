@foreach($KategoriAset as $item)
<div class="modal fade text-left" id="UpdateKategori-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Kategori Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.aset.update-kategori-aset', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Kode Kategori Aset: </label>
                    <div class="form-group">
                        <input type="text" id="kode_kategori_aset" name="kode_kategori_aset"
                               class="form-control bg-transparent" value="{{ $item->kode_kategori_aset }}">
                    </div>
                    <label>Nama Tipe Aset : </label>
                    <div class="form-group">
                        <select name="id_tipe_aset" id="id_tipe_aset" class="form-control">
                            @foreach($TipeAset as $ast)
                                <option value="{{$ast->id}}">{{ $ast->nama_tipe_aset}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Nama Kategori Aset: </label>
                    <div class="form-group">
                        <input type="text" id="nama_kategori_aset" name="nama_kategori_aset"
                               class="form-control bg-transparent" value="{{ $item->nama_kategori_aset }}">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_kategori_aset"
                                  id="deskripsi_kategori_aset" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_kategori_aset }}">{{ $item->deskripsi_kategori_aset }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"   class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
