@foreach($MetodePenyusutan as $item)
    <div class="modal fade text-left" id="UpdateMetodePenyusutan-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Ubah Metode Penyusutan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('master-keuangan.metode-penyusutan.update-metode-penyusutan', $item->id) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <label>Kode Metode Penyusutan: </label>
                        <div class="form-group">
                            <input type="text" id="kode_metode_penyusutan" name="kode_metode_penyusutan"
                                   class="form-control bg-transparent" value="{{ $item->kode_metode_penyusutan }}" readonly>
                        </div>
                        <label>Nama Metode Penyusutan : </label>
                        <div class="form-group">
                            <input type="text" id="nama_metode_penyusutan" name="nama_metode_penyusutan"
                                   class="form-control bg-transparent" value="{{ $item->nama_metode_penyusutan }}">
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="keterangan_metode_penyusutan"
                                  id="keterangan_metode_penyusutan" cols="30"
                                  rows="3"
                                  data-value="{{ $item->keterangan_metode_penyusutan }}">{{ $item->keterangan_metode_penyusutan }}
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
