<div class="modal fade text-left" id="TambahSubAkun" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Sub Akun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.sub-akun.tambah-sub-akun') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_sub_akun" name="kode_sub_akun" value="">

                    <label>Nama Sub Akun: </label>
                    <div class="form-group">
                        <input type="text" id="nama_sub_akun" name="nama_sub_akun"
                               class="form-control bg-transparent" placeholder="nama sub akun">
                    </div>
                    <label>Nama Akun: </label>
                    <div class="form-group">
                        <select name="id_akun" id="id_akun" class="form-control">
                            <option selected disabled>Pilih Bagian</option>
                            @foreach($akun as $item)
                                <option value="{{$item->id}}">{{ $item->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_sub_akun"
                                  id="deskripsi_sub_akun" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

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


{{--DETAIL SUB-AKUN--}}

@foreach($SubAkun as $item)
    <div class="modal fade text-left" id="DetailSubAkun-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Sub Akun</h5>
                    <div class="card">
                        <div class="table">
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Kode Akun</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->kode_sub_akun}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Sub Akun</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->nama_sub_akun }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Akun</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->akun }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Deskripsi</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->deskripsi_sub_akun }}
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


{{--EDIT SUB-BAGIAN--}}


@foreach($SubAkun as $item)

    <div class="modal fade text-left" id="UpdateSubBagian-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Sub Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('master-keuangan.sub-akun.update-sub-akun', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Kode Sub Akun: </label>
                        <div class="form-group">
                            <input type="text" id="kode_sub_akun" name="kode_sub_akun"
                                   class="form-control bg-transparent" value="{{ $item->kode_sub_akun }}" readonly>
                        </div>
                        <label>Nama Sub Akun: </label>
                        <div class="form-group">
                            <input type="text" id="nama_sub_akun" name="nama_sub_akun"
                                   class="form-control bg-transparent" value="{{ $item->nama_sub_akun }}">
                        </div>
                        <label>Nama Akun: </label>
                        <div class="form-group">
                            <select name="id_akun" id="id_akun" class="form-control">

                                @foreach($akun as $akn)
                                    <option value="{{$akn->id}}">{{ $akn->nama_akun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_sub_akun"
                                  id="deskripsi_sub_akun" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_sub_akun }}">{{ $item->deskripsi_sub_akun }}

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
