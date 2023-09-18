<div class="modal fade text-left" id="TambahSubBagian" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Sub Bagian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.master-logistik.bagian.tambah-sub-bagian') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kode_sub_bagian" name="kode_sub_bagian" value="">

                    <label>Nama Sub-Bagian : </label>
                    <div class="form-group">
                        <input type="text" id="nama_sub_bagian" name="nama_sub_bagian"
                               class="form-control bg-transparent" placeholder="Nama Sub-Bagian">
                    </div>
                    <label>Bagian : </label>
                    <div class="form-group">
                        <select name="bagian_id" id="bagian_id" class="form-control">
                            <option selected disabled>Pilih Bagian</option>
                            @foreach($bagian as $item)
                                <option value="{{$item->id}}">{{ $item->nama_bagian}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi_sub_bagian" id="deskripsi_sub_bagian" cols="30"
                                  rows="3" placeholder="Silakan masukkan deskripsi Sub-Bagian"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" id="submit-sub-bagian" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--modal-edit--}}
@foreach($SubBagian as $item)
    <div class="modal fade text-left" id="UpdateSubBagian-{{ $item->id }}" tabindex="-1" role="dialog"
         aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Ubah Data Sub Bagian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.master-logistik.bagian.update-sub-bagian', $item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control mb-1" id="kode_sub_bagian" name="kode_sub_bagian"
                               value="{{ $item->kode_sub_bagian }}" readonly>

                        <label>Nama Sub-Bagian : </label>
                        <div class="form-group">
                            <input type="text" id="nama_sub_bagian" name="nama_sub_bagian"
                                   class="form-control bg-transparent" value="{{ $item->nama_sub_bagian }}">
                        </div>
                        <label>Bagian : </label>
                        <div class="form-group">
                            <select name="bagian_id" id="bagian_id" class="form-control">
{{--                                <option selected disabled>{{ $bg->nama_bagian}}</option>--}}
                                @foreach($bagian as $bg)
                                    <option value="{{$bg->id}}">{{ $bg->nama_bagian}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Deskripsi : </label>
                        <div class="form-group">
                          <textarea class="form-control" name="deskripsi_sub_bagian" id="deskripsi_sub_bagian" cols="30"
                                    rows="3" value="{{ $item->deskripsi_sub_bagian }}"> {{ $item->deskripsi_sub_bagian}}</textarea>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button"   class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                                class="bx bx-arrow-back"></i> Kembali
                        </button>
                        <button type="submit" id="submit-sub-bagian" class="btn btn-success mr-1"><i
                                class="bx bx-save mt"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach($SubBagian as $item)
    <div class="modal fade text-left" id="DetailSubBagian-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Sub Bagian</h5>
                    <div class="card">
                        <div class="table-responsive ">
                            <table  class=" table table-responsive-lg">
                                <tbody>
                                <tr>
                                    <th>Kode Sub Bagian</th>

                                    <th>:  {{ $item->kode_sub_bagian }}</th>
                                </tr>

                                <tr>
                                    <th>Nama Sub Bagian</th>

                                    <th>: {{ $item->nama_sub_bagian }}</th>
                                </tr>

                                <tr>
                                    <th>Bagian</th>

                                    <th>: {{ $item->bagian }}</th>
                                </tr>

                                <tr>
                                    <th>Deskripsi</th>

                                    <th>: {{ $item->deskripsi_sub_bagian}}</th>
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
