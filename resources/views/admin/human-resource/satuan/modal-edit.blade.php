@foreach($satuan as $item)
<div class="modal fade text-left" id="EditSatuan-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Ubah Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('human-resource.status.update-satuan',$item->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>Kode Satuan: </label>
                    <div class="form-group">
                        <input type="text"  id="kode_satuan" name="kode_satuan"
                               class="form-control" value="{{ $item->kode_satuan }}" readonly>
                    </div>

                    <label>Nama Satuan: </label>
                    <div class="form-group">
                        <input type="text"  id="nama_satuan" name="nama_satuan"
                               class="form-control" value="{{ $item->nama_satuan }}">
                    </div>
                    <label>Deskripsi Satuan: </label>
                    <div class="form-group">
                                    <textarea class="form-control" name="deskripsi_satuan" id="deskripsi_satuan" cols="30"
                                              rows="3" value="{{ $item->deskripsi_satuan }}">{{ $item->deskripsi_satuan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"  ><i
                            class="bx bx-save mt"></i> Simpan</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endforeach
