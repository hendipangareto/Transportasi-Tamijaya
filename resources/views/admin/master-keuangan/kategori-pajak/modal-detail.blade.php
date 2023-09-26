@foreach($KategoriPajak as $item)
    <div class="modal fade text-left" id="DetailKategoriPajak-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Kategori Pajak</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Kategori Pajak</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_kategori_pajak}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Kategori Pajak</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_kategori_pajak }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Metode Penyusutan</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->metode_penyusutan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tahun Pajak</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->tahun_pajak }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tarif Pajak</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->tarif_pajak }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Keterangan Pajak</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->deskripsi_pajak }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px dashed #808080;">
                        </div>
                        <div class="row ml-1 justify-content-lg-end">
                            <button type="button"   class="btn btn-secondary mr-1"  data-dismiss="modal" > Kembali ➡
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
