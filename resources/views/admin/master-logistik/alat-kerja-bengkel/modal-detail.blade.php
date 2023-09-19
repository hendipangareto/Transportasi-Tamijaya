@foreach($AlatKerjaBengkel as $item)
    <div class="modal fade text-left" id="DetailAlat-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Alat Kerja Bengkel</h5>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                <tr>
                                    <th>Kode Alat</th>
                                    <th>: {{ $item->kode_alat_kerja_bengkel }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Nama Alat</th>
                                    <th>: {{ $item->nama_alat_kerja_bengkel }}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Kuantitas</th>
                                    <th>: {{ $item->kuantitas_alat_kerja_bengkel}}</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Satuan</th>
                                    <th>: {{ $item->satuan}}</th>
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
