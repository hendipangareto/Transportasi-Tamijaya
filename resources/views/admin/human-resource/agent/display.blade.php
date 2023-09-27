@foreach($agent as $item)
    <div class="modal fade text-left" id="DetailAgent-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="pb-2 text-center">Detail Data Agent</h5>
                        <div class="card">
                            <div class="table">
                                <hr style="border-top: 1px dashed #808080;">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Kode Agent</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_code }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nama Agen</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nomor HP</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_hp}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Nomor Telepon</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_tlp }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Email</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_email }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Provinsi/Kota</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->state }} / {{ $item->city }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Alamat</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_alamat }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <h6 class="col-sm-5">Keterangan</h6>
                                            <div class="col-sm-7">
                                                : {{ $item->agent_description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 1px dashed #808080;">
                            </div>
                            <div class="row ml-1 justify-content-lg-end">
                                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal"> Kembali ➡
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach

{{--Edit--}}

@foreach($agent as $item)

    <div class="modal fade text-left" id="EditAgent-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Agent</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('human-resource.data-agent.tambah-data-agent', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Kode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-name" value="{{ $item->agent_code }}" readonly/>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Agent</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="agent_name_update" name="agent_name_update" value="{{ $item->agent_name }}"/>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Provinsi</label>
                                    <div class="col-sm-9">
                                        <select onchange="changeProvince()" id="id_province_update" name="id_province_update"
                                                class="form-control">
{{--                                            <option value="">Pilih Provinsi</option>--}}
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Kota</label>
                                    <div class="col-sm-9">
                                        <select name="id_city_update" id="id_city_update" class="form-control">
                                            <option value="{{ $item->id }}">{{ $item->city }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">No. Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="agent_tlp_update" name="agent_tlp_update" value="{{ $item->agent_tlp }}"/>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="agent_hp_update" name="agent_hp_update" value="{{ $item->agent_hp }}"/>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="agent_email_update" name="agent_email_update" value="{{ $item->agent_email }}"/>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Alamat</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" name="agent_alamat_update"
                                                id="agent_alamat_update" cols="30"
                                                rows="3" data-value="{{ $item->agent_alamat }}"> {{ $item->agent_alamat }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Keterangan</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" name="agent_description_update"
                                                id="agent_description_update" cols="30"
                                                rows="3" data-value="{{ $item->agent_description }}"> {{ $item->agent_description }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                                            class="bx bx-save"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach
