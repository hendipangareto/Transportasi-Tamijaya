<div class="modal fade text-left" id="TambahKategori" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Kategori Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.aset.tambah-kategori-aset') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_kategori_aset" name="kode_kategori_aset" value="">

                    <label>Nama Tipe Aset : </label>
                    <div class="form-group">
                        <select name="id_tipe_aset" id="id_tipe_aset" class="form-control">
                            <option selected disabled>Pilih Bagian</option>
                            @foreach($TipeAset as $item)
                                <option value="{{$item->id}}">{{ $item->nama_tipe_aset}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Nama Kategori Aset: </label>
                    <div class="form-group">
                        <input type="text" id="nama_kategori_aset" name="nama_kategori_aset"
                               class="form-control bg-transparent" placeholder="Nama Kategori Aset">

                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_kategori_aset"
                                  id="deskripsi_kategori_aset" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

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
