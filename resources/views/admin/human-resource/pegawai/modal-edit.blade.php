{{--Modal Edit--}}
@foreach($data as $item)
    <form action="{{route('data-gaji-pegawai.human-resource-pegawai-form-update', $item->id)}}" id="form-edit-daftar-gaji"
          enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal fade text-left" id="EditGaji-{{$item->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modal-title"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Edit Daftar Gaji Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fe fe-x"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <select name="edit_employee_id" id="edit_employee_id" class="form-control" disabled>
                                            @foreach($employee as $dt)
                                                @php
                                                    $selected = ($item->employee_id == $dt->id) ? "selected" : "";
                                                @endphp
                                                <option value="{{ $dt->id }}"{{$selected}}>{{ $dt->employee_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="edit_employee_id" value="{{$item->employee_id}}">

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Status Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_employee_status" name="edit_employee_status"
                                               class="form-control" value="{{$item->employee_status}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Departemen</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_departemen_id" name="edit_departemen_id"
                                               class="form-control" value="{{$item->department_name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_position_id" name="edit_position_id"
                                               class="form-control" value="{{$item->position_name}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_g_pokok" name="edit_g_pokok"
                                               class="form-control"
                                               value="{{ $item->g_pokok }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tunjangan Masa Kerja</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="edit_t_masa_kerja" id="edit_t_masa_kerja"
                                               class="form-control" value="{{ $item->t_masa_kerja }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tunjangan Transport</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_t_transport" name="edit_t_transport"
                                               class="form-control" value="{{ $item->t_transport}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tunjangan Kapasitas</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_t_kapasitas" name="edit_t_kapasitas"
                                               class="form-control" value="{{ $item->t_kapasitas }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tunjangan Akademik</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_t_akademik" name="edit_t_akademik"
                                               class="form-control" value="{{ $item->t_akademik }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tunjangan Struktur</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_t_struktur" name="edit_t_struktur"
                                               class="form-control" value="{{ $item->t_struktur }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">BPJS Kesehatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_bpjs_kesehatan" name="edit_bpjs_kesehatan"
                                               class="form-control" value="{{ $item->bpjs_kesehatan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">BPJS Ketenagakerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_bpjs_ketenagakerjaan"
                                               name="edit_bpjs_ketenagakerjaan" class="form-control"
                                               value="{{ $item->bpjs_ketenagakerjaan }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" id="edit_tanggal"
                                               name="edit_tanggal" class="form-control"
                                               value="{{$item->tanggal}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edit_keterangan"
                                               name="edit_keterangan" class="form-control"
                                               value="{{$item->keterangan}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fe fe-edit"></i> Ubah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
{{--Modal detail--}}
