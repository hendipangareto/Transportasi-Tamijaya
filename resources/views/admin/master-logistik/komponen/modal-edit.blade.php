@foreach($komponen as $item)
    <div class="modal fade text-left" id="EditKomponen-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Komponen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.master-logistik.komponen.edit-komponen', $item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">


                        <label>Kode Komponen : </label>
                        <div class="form-group">
                            <input type="text" readonly id="kode_komponen" name="kode_komponen"
                                   class="form-control bg-transparent" value="{{ $item->kode_komponen }}">

                        </div>
                        <label>Nama Komponen : </label>
                        <div class="form-group">
                            <input type="text" id="nama_komponen" name="nama_komponen"
                                   class="form-control bg-transparent" value="{{ $item->nama_komponen }}">
                        </div>
                        <label>Nama Sub-Bagian : </label>
                        <div class="form-group">
                            <select name="sub_bagian_id" id="sub_bagian_id" class="form-control">

                                @foreach($SubBagian as $kmp)
                                    <option value="{{$kmp->id}}">{{ $kmp->nama_sub_bagian}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Deskripsi : </label>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_komponen"
                                  id="deskripsi" cols="30"
                                  rows="3"
                                  data-value="{{ $item->deskripsi_komponen }}">
{{ $item->deskripsi_komponen }}
                        </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mr-1"><i
                                class="bx bx-save mt"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
