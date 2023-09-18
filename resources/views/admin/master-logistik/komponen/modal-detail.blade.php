@foreach($komponen as $item)
<div class="modal fade text-left" id="DetailKomponen-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Komponen</h5>
                    <div class="card">
                        <div class="table-responsive mb-3">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Komponen</th>
                                    <th>:</th>
                                    <th>  {{ $item->kode_komponen }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Komponen</th>
                                    <th> : </th>
                                    <th>{{ $item->nama_komponen }}</th>
                                </tr>

                                <tr>
                                    <th>Sub Bagian</th>
                                    <th> : </th>
                                    <th> {{ $item->sub_bagian }}</th>
                                </tr>

                                <tr>
                                    <th>Deskripsi</th>
                                    <th> : </th>
                                    <th>{{ $item->deskripsi_komponen }}</th>
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
