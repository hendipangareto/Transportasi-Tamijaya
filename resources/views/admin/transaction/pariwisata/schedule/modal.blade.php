<div class="modal fade text-left" id="modal-schedule-pariwisata" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Jadwal Keberangkatan Pariwisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-edit-schedule-pariwisata" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tanggal Keberangkatan: </label>
                            <div class="form-group">
                                <input type="date" readonly id="edit-date_departure" name="date_departure"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Kembali: </label>
                            <div class="form-group">
                                <input type="date" readonly id="edit-date_return" name="date_return"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jumlah Penumpang </label>
                            <div class="form-group">
                                <input type="text" readonly id="edit-total_seats" name="total_seats"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Bus: </label>
                            <div class="form-group">
                                <input type="text" readonly id="edit-bus_type" name="bus_type"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tujuan Wisata </label>
                            <div class="form-group">
                                <input type="text" readonly id="edit-destination" name="destination"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Catatan Pariwisata: </label>
                            <div class="form-group">
                                <input type="text" readonly id="edit-notes" name="notes"
                                    class="form-control form-control-sm bg-transparent">
                            </div>
                        </div>
                    </div>
                    <label>Armada: </label>
                    <div class="form-group">
                        <select name="id_armada" id="edit-id_armada" class="form-control form-control-sm">
                            <option value="">Silahkan Pilih Armada</option>
                            @foreach ($armadas as $armada)
                                <option value="{{ $armada->id }}">{{ $armada->armada_merk }} -
                                    {{ $armada->armada_no_police }} ({{ $armada->armada_type }})</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Sopir: </label>
                    <div class="form-group">
                        <select name="driver" id="edit-driver" class="form-control form-control-sm">
                            <option value="">Silahkan Pilih Sopir 1</option>
                            @foreach ($drivers as $driver_1)
                                <option value="{{ $driver_1->id }}">{{ $driver_1->employee_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Kernet: </label>
                    <div class="form-group">
                        <select name="conductor" id="edit-conductor" class="form-control form-control-sm">
                            <option value="">Silahkan Pilih Kernet</option>
                            @foreach ($conductors as $conductor)
                                <option value="{{ $conductor->id }}">{{ $conductor->employee_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-schedule-pariwisata" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
