@foreach($BengkelLuar as $item)
    <div class="modal fade text-left" id="DetailBengkelLuar-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Bengkel Luar</h5>
                    <div class="card">
                        <div class="table-responsive mb-3">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Bengkel Luar</th>

                                    <th>:  {{ $item->kode_bengkel_luar }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Bengkel Luar</th>

                                    <th>: {{ $item->nama_bengkel_luar }}</th>
                                </tr>

                                <tr>
                                    <th>Nomor Telepon</th>

                                    <th>: {{ $item->tlp_bengkel_luar }}</th>
                                </tr>

                                <tr>
                                    <th>Nomor HP</th>

                                    <th>: {{ $item->hp_bengkel_luar }}</th>
                                </tr>
                                <tr>
                                    <th>PIC</th>

                                    <th>: {{ $item->pic_bengkel_luar }}</th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>

                                    <th>: {{ $item->alamat_bengkel_luar }}</th>
                                </tr>
                                <tr>
                                    <th>Provinsi/Kota</th>

                                    <th>: {{ $item->province }} / {{ $item->city }}</th>
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
