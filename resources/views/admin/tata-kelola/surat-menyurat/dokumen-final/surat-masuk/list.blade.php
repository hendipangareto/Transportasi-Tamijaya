<div class="row mt-5">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Waktu</label>
            <input type="date" id="end_date" name="end_date" value=""
                   class="form-control">
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Surat</label>
            <input type="date" id="end_date" name="end_date" value=""
                   class="form-control">
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Filter By Jabatan</label>
            <select class="form-control"
                    name="postionfilter">
                <option disabled selected>Pilih Jabatan</option>

            </select>
        </div>
    </div>

    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="" style="color: white">Filter</label><br>
            <button class="btn btn-outline-primary">Filter <i
                    class="fe fe-filter fe-12"></i></button>
            <a href=" "
               class="btn btn-outline-secondary">Clear <i
                    class="fe fe-refresh-cw fe-12"></i></a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <input type="hidden"  value=" ">
    <table class="table table-bordered table-hover" id="table-list-employees">
        <thead>
        <tr class="text-uppercase text-center">
            <th class="w-3p">No</th>
            <th class="w-10p">Tanggal Input</th>
            <th class="w-10p">No Registrasi Surat</th>
            <th class="w-10p">Nomor Surat</th>
            <th class="w-10p">Tanggal Surat</th>
            <th class="w-10p">Pengirim/Penerima</th>
            <th class="w-10p">Keterangan</th>
            <th class="w-3p">Aksi</th>
        </tr>
        </thead>
        <tbody id="show-data-employee">
        <tr class="text-center">
            <td>1</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                         data-toggle="modal"
                         data-target="#DetailSurat">
                        <i class="bx bx-info-circle font-size-base"></i>
                    </div>
                    <a href=" " class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer">

                        <i class="bx bx-trash font-size-base"></i>
                    </a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>


{{--===================Tambah SURAT========--}}
<div class="modal fade text-left" id="TambahSuratMasuk" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action=" " method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_surat" name="kode_surat" value="">
                    <label>Nama Surat: </label>
                    <div class="form-group">
                        <input type="text" id="nama_surat" name="nama_surat"
                               class="form-control bg-transparent" placeholder="nama surat">
                    </div>
                    <label>Deskripsi Surat: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                  rows="3" placeholder="Silahkan masukan deskripsi surat"></textarea>
                    </div>
                    <label>Deskripsi Surat: </label>
                    <div class="form-group">
                        <input class="form-control" type="file" name="lampiran_dokumen" id="lampiran_dokumen"
                               placeholder="Lampiran Dokumen" onchange="previewFile()">
                    </div>
                    <div id="file-preview"></div>


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



