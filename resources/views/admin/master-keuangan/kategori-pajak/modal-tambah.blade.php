<div class="modal fade text-left" id="TambahKategoriPajak" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Kategori Pajak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('master-keuangan.aset.tambah-kategori-pajak') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_kategori_pajak" name="kode_kategori_pajak" value="">
{{--                    <label>ID Kategori Pajak : </label>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" id="agent_code" name="akun_code"--}}
{{--                               class="form-control bg-transparent" placeholder="Kategori Aset">--}}
{{--                    </div>--}}
                    <label>Nama Kategori : </label>
                    <div class="form-group">
                        <input type="text" id="nama_kategori_pajak" name="nama_kategori_pajak"
                               class="form-control bg-transparent" placeholder="nama kategori">
                    </div>
                    <label>Metode Perhitungan: </label>
                    <div class="form-group">
                        <select id="id_metode_penyusutan" name="id_metode_penyusutan" class="form-select form-select-lg form-control">
                            <option>Pilih Penyusutan</option>
                           @foreach($MetodePenyusutan as $item)
                            <option value="{{$item->id}}">{{$item->nama_metode_penyusutan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                               <label>Tahun : </label>
                               <input type="number" id="tahun_pajak" name="tahun_pajak"
                                      class="form-control bg-transparent" placeholder="Tahun">
                           </div>
                           <div class="col-md-6">
                               <label>Tarif (%) : </label>
                               <input type="number" id="tarif_pajak" name="tarif_pajak"
                                      class="form-control bg-transparent" placeholder="Tarif ">
                           </div>
                       </div>
                    </div>

                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_pajak"
                                  id="deskripsi_pajak" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi pajak">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
