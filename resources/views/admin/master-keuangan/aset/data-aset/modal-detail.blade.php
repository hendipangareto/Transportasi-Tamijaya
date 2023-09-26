@foreach($DataAset as $item)
    <div class="modal fade text-left" id="DetailDataAset-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Aset</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_aset}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_aset}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Merk</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->merk_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Spesifikasi Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->spesifikasi_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kuantitas Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kuantitas }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Satuan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->satuan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Catatan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->catatan_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tanggal Beli Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->tanggal_beli_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tanggal Pakai Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->tanggal_pakai_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Lokasi Awal Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->lokasi_awal_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Pajak Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->pajak_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kategori Pajak Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kategori_pajak }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Aset Tidak Berwujud</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->aset_tidak_berwujud }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Metode Penyusutan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->metode_penyusutan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Akun Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->akun_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Akumulasi Penyusutan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->akun_akumulasi_penyusutan_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Beban Penyusutan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->akun_beban_penyusutan_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kuantitas Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kuantitas }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Satuan Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->satuan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Umur Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->umur_aset }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Rasio Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->rasio }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nilai Sisa Aset</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nilai_sisa }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Lampiran Aset</h6>
                                        <div class="col-sm-7">
                                            : @if ($item->lampiran_aset)
                                                <img
                                                    src="{{ asset('path_to_lampiran_folder/' . $item->lampiran_aset) }}"
                                                    alt="Asset Image" width="100" height="100">
                                            @else
                                                No Image Available
                                            @endif
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

