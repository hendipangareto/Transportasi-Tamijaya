@foreach($KategoriPajak as $item)
    <div class="modal fade text-left" id="DetailKategoriPajak-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Kategori Pajak</h5>
                    <div class="card">
                        <div class="table-responsive ">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Kategori Pajak</th>

                                    <th>:  {{ $item->kode_kategori_pajak }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Kategori Pajak</th>

                                    <th>: {{ $item->nama_kategori_pajak }}</th>
                                </tr>

                                <tr>
                                    <th>Metode Penyusutan</th>
                                    <th>: {{ $item->metode_penyusutan }}</th>
                                </tr>
                                <tr>
                                    <th>Tahun Pajak</th>
                                    <th>: {{ $item->tahun_pajak }}</th>
                                </tr>
                                <tr>
                                    <th>Tarif Pajak</th>
                                    <th>: {{ $item->tarif_pajak }}</th>
                                </tr>


                                <tr>
                                    <th>Keterangan</th>

                                    <th>: {{ $item->deskripsi_pajak}}</th>
                                </tr>
                                </tbody>

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
