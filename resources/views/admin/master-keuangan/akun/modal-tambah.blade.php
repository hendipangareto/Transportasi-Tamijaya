<div class="modal fade text-left" id="TambahAkun" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.akun.tambah-akun') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_akun" name="kode_akun" value="">
                    <label>Nama Akun: </label>
                    <div class="form-group">
                        <input type="text" id="nama_akun" name="nama_akun"
                               class="form-control bg-transparent" placeholder="nama akun">
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_akun"
                                  id="deskripsi_akun" cols="30"
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



{{--//UPDATE AKUN--}}


@foreach($akun as $item)
    <div class="modal fade text-left" id="UpdateAkun-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Update Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('master-keuangan.akun.update-akun', $item->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <label>Kode Akun: </label>
                        <div class="form-group">
                            <input type="text" id="kode_akun" name="kode_akun"
                                   class="form-control bg-transparent" value="{{ $item->kode_akun }}" readonly>
                        </div>
                        <label>Nama Akun: </label>
                        <div class="form-group">
                            <input type="text" id="nama_akun" name="nama_akun"
                                   class="form-control bg-transparent" value="{{ $item->nama_akun }}">
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_akun"
                                  id="deskripsi_akun" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_akun }}">{{ $item->deskripsi_akun }}
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


{{--//DETAIL AKUN--}}
@foreach($akun as $item)
    <div class="modal fade text-left" id="DetailAkun-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Akun</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                            <h6 class="col-sm-5">Kode Akun</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_akun}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Akun</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_akun }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Deskripsi</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->deskripsi_akun }}
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
