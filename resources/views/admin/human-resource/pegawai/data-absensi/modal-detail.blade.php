<style>

    .modal-lg {
        max-width: 60% !important;
    }
</style>
@foreach($absensi as $item)
    @php
        $absensiPegawai = \App\Models\HumanResource\Absensi::where('id_fingerprint','=',$item->id_fingerprint)->get();
    @endphp
    <div class="modal fade text-left" id="DetailAbsensi-{{ $item->id_fingerprint }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="card">
                        <div class="table">
                            <h4 class="pb-2 text-center">Detail Data Absensi Pegawai</h4>
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Bulan</h6>
                                        <div class="col-sm-8">
                                            : {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Nama Pegawai</h6>
                                        <div class="col-sm-8">
                                            : {{ $item->employee_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Kode Pegawai</h6>
                                        <div class="col-sm-8">
                                            : {{ $item->employee_id }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Departemen</h6>
                                        <div class="col-sm-8">
                                            : {{ $item->department_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Jabatan</h6>
                                        <div class="col-sm-8">
                                            : {{ $item->position_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <h6 class="col-sm-4">Status Pegawai</h6>
                                        <div class="col-sm-8">
                                            : {{ $item->employee_status }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 1px dashed #808080;">
                            <div class="table-responsive">
                                <input type="hidden" id="Tablesemployee" value=" ">
                                <table class="table table-bordered table-hover" id="table-list-employees">
                                    <thead>
                                    <tr class="text-uppercase text-center" style="background-color: #ececec">
                                        <th class="w-5p" style="background-color: #ececec">No</th>
                                        <th class="w-4p" >Scan_Satu</th>
                                        <th class="w-4p">Scan_Dua</th>
                                        <th class="w-4p">Scan_Tiga</th>
                                        <th class="w-4p">Scan_Empat</th>
                                    </tr>
                                    </thead>
                                    <tbody id="show-data-employee">
                                    @foreach($absensiPegawai as $data)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->scan_satu }}</td>
                                        <td>{{ $data->scan_dua }}</td>
                                        <td>{{ $data->scan_tiga }}</td>
                                        <td>{{ $data->scan_empat }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


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
