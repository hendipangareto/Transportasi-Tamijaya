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



//UPDATE AKUN


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


//DETAIL AKUN
@foreach($akun as $item)
    <div class="modal fade text-left" id="DetailAkun-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Akun</h5>
                    <div class="card">
                        <div class="table-responsive ">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                <tr>
                                    <th>Kode Akun</th>
                                    <th>: {{ $item->kode_akun }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Nama Akun</th>
                                    <th>: {{ $item->nama_akun }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>: {{ $item->deskripsi_akun}}</th>
                                </tr>
                                </thead>

                            </table>

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
