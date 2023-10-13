<div class="modal fade text-left" id="TambahSurat" tabindex="-1" role="dialog"
     aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Jadwal Keberangkatan Pariwisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.transaction.pariwisata.tambah.schedule-pariwisata') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Armada (Tipe Armada) : </label>
                            <div class="form-group">
                                <select name="id_armada" id="id_armada" class="form-control form-control-sm">
                                    <option value="">Silahkan Pilih Armada</option>
                                    @foreach ($armadas as $armada)
                                        <option value="{{ $armada->id }}">{{ $armada->armada_merk }} -
                                            <b style="color: #83f602">{{ $armada->armada_no_police }}</b>
                                            ({{ $armada->armada_type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Status Keberangkatan : </label>
                            <div class="form-group">
                                <select name=" " id=" " class="form-control form-control-sm">
                                    <option disabled selected>Status Keberangkatan</option>
                                    <option value=" "></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tanggal Keberangkatan :</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_departure" id="date_departure">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Pulang : </label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_return" id="date_return">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Kota Keberangkatan : </label>
                            <div class="form-group">
                                <select name="id_pick_point" id="id_pick_point" class="form-control form-control-sm">
                                    <option disabled selected>Kota Keberangkatan</option>
                                    @php
                                        $usedPickPoints = [];
                                    @endphp
                                    @foreach($PickPoin as $kb)
                                        @if (!in_array($kb->pick_point_origin, $usedPickPoints))
                                            <option value="{{ $kb->id }}">{{ $kb->pick_point_origin }}</option>
                                            @php
                                                $usedPickPoints[] = $kb->pick_point_origin;
                                            @endphp
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kota Tujuan : </label>
                            <div class="form-group">
                                <select name="id_destination_wisata" id="id_destination_wisata"
                                        class="form-control form-control-sm">
                                    <option disabled selected>Kota Tujuan</option>
                                    @foreach($DestinasiWisata as $data)
                                        <option value="{{ $data->id }}">{{ $data->destination_wisata_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Sopir 1 : </label>
                            <div class="form-group">
                                <select name="sopir_1" id="sopir_1" class="form-control form-control-sm">
                                    <option disabled selected>Sopir 1</option>
                                    @foreach($employees as $employee)
                                        @if($employee->id_department === 5)
                                            <!-- Ganti 1 dengan ID departemen "Sopir" sesuai dengan database Anda -->
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Sopir 2 : </label>
                            <div class="form-group">
                                <select name="sopir_2" id="sopir_2" class="form-control form-control-sm">
                                    <option disabled selected>Sopir 2</option>
                                    @foreach($employees as $employee)
                                        @if(isset($employee->id) && isset($employee->id_department) && $employee->id_department === 5)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <label>Kernet: </label>
                    <div class="form-group">
                        <select name="id_employee" id="id_employee" class="form-control form-control-sm">
                            <option value="">Silahkan Pilih Kernet</option>
                            @foreach($employees as $employee)
                                @if(isset($employee->id) && isset($employee->id_department) && $employee->id_department === 6)
                                    <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Total Hari :</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="total_days" id="total_days">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Bus : </label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="bus_price" id="bus_price">
                            </div>
                        </div>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="notes" id="notes" cols="30"
                                  rows="3" placeholder="Silahkan masukan deskripsi bagian"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"><i class="bx bx-save mt"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--===================================UPDATE JADAWAL PARAWISATA=========================================================--}}

@foreach($schedulePariwisatas as $item)
    <div class="modal fade text-left" id="UpdateScheduleParawisata-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Jadwal Keberangkatan Pariwisata</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.transaction.pariwisata.update.schedule-pariwisata', $item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Armada (Tipe Armada) : </label>
                                <div class="form-group">
                                    <select name="id_armada" id="id_armada" class="form-control form-control-sm">
                                        @foreach ($armadas as $armada)
                                            <option value="{{ $armada->id }}" {{ $armada->id == $item->id_armada ? 'selected' : '' }}>
                                                {{ $armada->armada_merk }} - <b style="color: #83f602">{{ $armada->armada_no_police }}</b>
                                                ({{ $armada->armada_type }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Status Keberangkatan : </label>
                                <div class="form-group">
                                    <select name=" " id=" " class="form-control form-control-sm">
                                        <option disabled selected>Status Keberangkatan</option>
                                        <option value=" "></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tanggal Keberangkatan :</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date_departure" id="date_departure" value="{{ $item->date_departure }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal Pulang : </label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date_return" id="date_return" value="{{ $item->date_return }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Kota Keberangkatan : </label>
                                <div class="form-group">
                                    <select name="id_pick_point" id="id_pick_point" class="form-control form-control-sm">
                                        <option disabled selected>Kota Keberangkatan</option>
                                        @php
                                            $usedPickPoints = [];
                                        @endphp
                                        @foreach($PickPoin as $kb)
                                            @if (!in_array($kb->pick_point_origin, $usedPickPoints))
                                                <option value="{{ $kb->id }}" {{ $kb->id == $item->id_pick_point ? 'selected' : '' }}>
                                                    {{ $kb->pick_point_origin }}
                                                </option>
                                                @php
                                                    $usedPickPoints[] = $kb->pick_point_origin;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Kota Tujuan : </label>
                                <div class="form-group">
                                    <select name="id_destination_wisata" id="id_destination_wisata" class="form-control form-control-sm">
                                        @foreach($DestinasiWisata as $data)
                                            <option value="{{ $data->id }}" {{ $data->id == $item->id_destination_wisata ? 'selected' : '' }}>
                                                {{ $data->destination_wisata_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Sopir 1 : </label>
                                <div class="form-group">
                                    <select name="sopir_1" id="sopir_1" class="form-control form-control-sm">
                                        @foreach($employees as $employee)
                                            @if($employee->id_department === 5)
                                                <option value="{{ $employee->id }}" {{ $employee->id == $item->sopir_1 ? 'selected' : '' }}>
                                                    {{ $employee->employee_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Sopir 2 : </label>
                                <div class="form-group">
                                    <select name="sopir_2" id="sopir_2" class="form-control form-control-sm">
                                        @foreach($employees as $employee)
                                            @if(isset($employee->id) && isset($employee->id_department) && $employee->id_department === 5)
                                                <option value="{{ $employee->id }}" {{ $employee->id == $item->sopir_2 ? 'selected' : '' }}>
                                                    {{ $employee->employee_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <label>Kernet: </label>
                        <div class="form-group">
                            <select name="id_employee" id="id_employee" class="form-control form-control-sm">
{{--                                <option value="">Silahkan Pilih Kernet</option>--}}
                                @foreach($employees as $employee)
                                    @if(isset($employee->id) && isset($employee->id_department) && $employee->id_department === 6)
                                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Hari :</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="total_days" id="total_days" value="{{ $item->total_days }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Harga Bus : </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="bus_price" id="bus_price" value="{{ $item->bus_price }}">
                                </div>
                            </div>
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="notes" id="notes" cols="30"
                                  rows="3" placeholder="Silahkan masukan deskripsi bagian"> {{ $item->notes }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mr-1"><i class="bx bx-save mt"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
