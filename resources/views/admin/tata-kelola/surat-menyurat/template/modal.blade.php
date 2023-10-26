<div class="modal fade text-left" id="TambahTemplate" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('data-kelola.surat-menyurat.tambah-template-surat') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_surat" name="kode_surat" value="">
                    <label>Nama Surat: </label>
                    <div class="form-group">
                        <input type="text" id="nama_surat" name="nama_surat"
                               class="form-control bg-transparent" placeholder="nama surat" required>
                    </div>
                    <label>Deskripsi Surat: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                  rows="3" placeholder="Silahkan masukan deskripsi surat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lampiran_dokumen">Lampiran Dokumen</label>
                        <input type="file" class="form-control" name="lampiran_dokumen" id="lampiran_dokumen" onchange="previewFile()" required>
                    </div>
                    <div id="file-preview" class="col-md-9 mt-2"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal"><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--=============================================DETAIL SURAT===============================================================--}}
@foreach($surat as $item)
    <div class="modal fade text-left" id="DetailSurat-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class=" text-center">Detail Surat</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row  ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Surat</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_surat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Surat</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_surat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Deskripsi</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->deskripsi}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Lampiran Dokumen</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->lampiran_dokumen }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px dashed #808080;">
                        </div>
                        <div class="row ml-1 justify-content-lg-end">
                            <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal"> Kembali ➡
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
