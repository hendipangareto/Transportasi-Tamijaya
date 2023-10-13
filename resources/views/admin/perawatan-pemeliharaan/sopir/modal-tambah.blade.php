<form action="{{ route('perawatan-pemeliharaan.sopir.check-fisik-layanan.tambah') }}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="TambahLaporanPerjalanan" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Laporan Perjalanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Armada : </label>
                                    <select name="id_armada" id="id_armada" class="form-control">
                                        <option selected disabled>Pilih nama Armada</option>
                                        @foreach($armada as $item)
                                            <option value="{{$item->id}}">{{$item->armada_no_police}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Tipe Armada</label>
                                    <input class="form-control" type="text" id="armada_type" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Titik Keberangkatan : </label>
                                    <input class="form-control" type="text" id="id_pick_point" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>Titik Kedatangan</label>
                                    <input class="form-control" type="text" id="id_destination_wisata" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>Tipe Perjalanan : </label>
                                    <input type="text" id="armada_category" class="form-control" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>Kapasitas Armada :</label>
                                    <input class="form-control" type="text" id="armada_capacity" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6"></div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <button class="btn btn-primary btn-sm" type="button" onclick="addDataToTable()"><i--}}
{{--                                    class="bx bx-plus"></i> Tambah--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bagian_id">Bagian</label>
                                <select name="bagian_id" id="bagian_id" class="form-control">
                                    <option value="" disabled selected>Pilih nama pegawai</option>
                                    @foreach($bagian as $item)
                                        <option value="{{$item->id}}">{{$item->nama_bagian}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keluhan">Keluhan:</label>
                                <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="3" placeholder="Silahkan masukkan deskripsi bagian"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" onclick="addDataToTable()"><i class="bx bx-plus"></i> Tambah</button>

                    <table class="table table-bordered table-hover" id="detail-cek-layanan">
                        <thead>
                        <tr>
                            <th class="w-40p">Bagian</th>
                            <th class="w-40p">Keluhan</th>
                            <th class="w-20p text-center">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Existing table rows can be added here if any -->
                        </tbody>
                    </table>


                    {{--                    =================================--}}
                </div>
                <div class="modal-footer">
{{--                                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal"><i--}}
{{--                                                class="bx bx-arrow-back"></i> Kembali--}}
{{--                                        </button>--}}
                    <button type="submit" class="btn btn-success mr-1">
                        <i class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
