@foreach($MetodePenyusutan as $item)
    <div class="modal fade text-left" id="DetailMetodePenyusutan-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Metode Penyusutan</h5>
                    <div class="card">
                        <div class="table-responsive ">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Metode Penyusutan </th>

                                    <th>:  {{ $item->kode_metode_penyusutan }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Metode Penyusutan </th>

                                    <th>: {{ $item->nama_metode_penyusutan }}</th>
                                </tr>
                                <tr>
                                    <th>Deskripsi Metode Penyusutan </th>

                                    <th>: {{ $item->keterangan_metode_penyusutan}}</th>
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
