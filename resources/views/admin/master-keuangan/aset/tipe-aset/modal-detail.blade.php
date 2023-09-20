@foreach($TipeAset as $item)
    <div class="modal fade text-left" id="DetailTipeAset-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Tipe Aset</h5>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                <tr>
                                    <th>Kode Tipe Aset</th>
                                    <th>: {{ $item->kode_tipe_aset }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Nama Tipe Aset</th>
                                    <th>: {{ $item->nama_tipe_aset }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Dekripsi Tipe Aset</th>
                                    <th>: {{ $item->deskripsi_tipe_aset}}</th>
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
