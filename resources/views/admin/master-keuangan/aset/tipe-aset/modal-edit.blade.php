@foreach($TipeAset as $item)
<div class="modal fade text-left" id="EditTipeAset-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Tipe Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.aset.update-tipe-aset', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>KodeTipe Aset: </label>
                    <div class="form-group">
                        <input type="text" id="kode_tipe_aset" name="kode_tipe_aset"
                               class="form-control bg-transparent" value="{{ $item->kode_tipe_aset }}" readonly>
                    </div>
                    <label>Nama Tipe Aset: </label>
                    <div class="form-group">
                        <input type="text" id="nama_tipe_aset" name="nama_tipe_aset"
                               class="form-control bg-transparent" value="{{ $item->nama_tipe_aset }}">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_tipe_aset"
                                  id="deskripsi_tipe_aset" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_tipe_aset }}">{{ $item->deskripsi_tipe_aset }}

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
@endforeach
