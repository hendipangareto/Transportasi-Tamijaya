@foreach($satuan as $item)
    <div class="modal fade text-left" id="DetailSatuan-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Satuan</h5>
                    <div class="card">
                        <div class="table-responsive mb-3">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                <tr>
                                    <th>Kode Satuan</th>
                                    <th>: {{ $item->kode_satuan }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Nama Satuan</th>
                                    <th>: {{ $item->nama_satuan }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Deskripsi Satuan</th>
                                    <th>: {{ $item->deskripsi_satuan}}</th>
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
