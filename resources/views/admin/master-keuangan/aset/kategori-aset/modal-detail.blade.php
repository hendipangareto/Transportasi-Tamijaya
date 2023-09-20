@foreach($KategoriAset as $item)
    <div class="modal fade text-left" id="DetailKategori-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Kategori Aset</h5>
                    <div class="card">
                        <div class="table-responsive ">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Kategori </th>

                                    <th>:  {{ $item->kode_kategori_aset }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Kategori</th>

                                    <th>: {{ $item->nama_kategori_aset }}</th>
                                </tr>

                                <tr>
                                    <th>Tipe Aset</th>

                                    <th>: {{ $item->tipe_aset }}</th>
                                </tr>

                                <tr>
                                    <th>Deskripsi</th>

                                    <th>: {{ $item->deskripsi_kategori_aset}}</th>
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
