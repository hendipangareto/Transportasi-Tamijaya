<form method="get" action="{{ route('data-kelola.surat-menyurat.list-dokumen-final') }}">
    @csrf
    <div class="row mt-5">
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="tanggal_input">Tanggal Input</label>
                <input type="date" id="tanggal_input" name="tanggal_input" value="{{ $params['tanggal_input'] ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ $params['tanggal_surat'] ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="penerima_surat">Penerima Surat</label>
                <select class="form-control" name="penerima_surat">
                    <option disabled selected>Pilih Penerima Surat</option>
                    @foreach($dokumen as $jbt)
                        @php
                            $selected = ($params['penerima_surat'] == $jbt->penerima_surat) ? "selected" : "";
                        @endphp
                        <option value="{{ $jbt->penerima_surat }}" {{ $selected }}>{{ $jbt->penerima_surat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="" style="color: white">Filter</label><br>
                <button class="btn btn-primary"><i class="bx bx-filter"></i>    Filter </button>
                <a href="{{ route('data-kelola.surat-menyurat.list-dokumen-final') }}" class="btn btn-warning"><i class="bx bx-reset"></i> Reset</a>
            </div>
        </div>
    </div>
</form>


<div class="table-responsive">
    <input type="hidden" value=" ">
    @php
        use Carbon\Carbon;
         Carbon::setLocale('id');
    @endphp
    <table class="table table-bordered table-hover" id="table-surat-masuk">
        <thead>
        <tr class="text-uppercase text-center">
            <th class="w-3p">No</th>
            <th class="w-10p">Tanggal Input</th>
            <th class="w-10p">No Registrasi Surat</th>
            <th class="w-10p">Nomor Surat</th>
            <th class="w-10p">Tanggal Surat</th>
            <th class="w-10p">Pengirim 👉 Penerima</th>
            <th class="w-10p">Keterangan</th>
            <th class="w-3p">Aksi</th>
        </tr>
        </thead>
        <tbody id="show-data-employee">
        @forelse($dokumen as $item)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                 <td>{{ Carbon::parse($item->tanggal_input)->translatedFormat('l, d F Y') }}</td>

                <td>{{ $item->no_registrasi_surat }}</td>
                <td>{{ $item->no_surat }}</td>

                <td>{{ Carbon::parse($item->tanggal_surat)->translatedFormat('l, d F Y') }}</td>
                <td>({{ $item->pengirim_surat }})  👉  ({{ $item->penerima_surat }})</td>
                <td>{{ $item->keterangan_surat }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                             data-toggle="modal"
                             data-target="#DetailSurat-{{ $item->id }}">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
{{--                        <a href=" " class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer">--}}

{{--                            <i class="bx bx-trash font-size-base"></i>--}}
{{--                        </a>--}}
{{--                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "--}}
{{--                             data-id="{{ $item->id }}">--}}
{{--                            <i class="bx bx-trash font-size-base"></i>--}}
{{--                        </div>--}}




                            <div class="d-flex">
                                <div class="col-md-2">
                                    @if($item)
                                        <form action="{{ route('data-kelola.surat-menyurat.archieve-data') }}" class="d-inline delete-form" method="post">
                                            @csrf
                                            <input type="hidden" name="id_qs[]" value="{{ $item->id }}">
                                            <button type="submit" class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer" id="btn-submit-pekerjaan-sm" onclick="event.preventDefault(); showConfirmationModal(this);">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>




                    </div>

                </td>
            </tr>
        @empty
            <td colspan="8" class="text-center">Data Dokumen Final</td>
        @endforelse
        </tbody>
    </table>
</div>


{{--===================Tambah SURAT========--}}
<div class="modal fade text-left" id="TambahSuratMasuk" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('data-kelola.surat-menyurat.tambah-dokumen-final') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="no_registrasi_surat" name="no_registrasi_surat" value="">
                    <div class="mb-2 row">
                        <label for="html5-text-input" class="col-md-3 col-form-label">Tanggal
                            Input</label>
                        <div class="col-md-9">
{{--                            <input class="form-control" type="date" name="tanggal_input"--}}
{{--                                   id="tanggal_input" placeholder="Tanggal Input" min="<?php echo date('Y-m-d'); ?>"/>--}}
                            <input class="form-control" type="date" name="tanggal_input"
                                   id="tanggal_input" placeholder="Tanggal Input"/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-search-input" class="col-md-3 col-form-label">No.Reg Surat</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="no_registrasi_surat"
                                   id="no_registrasi_surat" placeholder="Nomor Surat" readonly/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-email-input" class="col-md-3 col-form-label">Nomor Kontrak</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="no_surat"
                                   id="no_surat" placeholder="Nomor Kontrak" required/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label">Tanggal Surat</label>
                        <div class="col-md-9">
{{--                            <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat"--}}
{{--                                   min="<?php echo date('Y-m-d'); ?>"/>--}}
                            <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" required/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label">Rekanan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="pengirim_surat" id="pengirim_surat" placeholder="rekanan"
                                   required/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label">PIC/Penanggung Jawaban</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="penerima_surat" id="penerima_surat"
                                   placeholder="PIC/Penanggung Jawaban"
                                   required/>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label">Keterangan</label>
                        <div class="col-md-9">
                           <textarea class="form-control" name="keterangan_surat" id="keterangan_surat" cols="30"
                                     rows="3" placeholder="Silahkan Masukan Keterangan Surat"></textarea>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label">Lampiran Dokumen</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="lampiran_dokumen_final_masuk" id="lampiran_dokumen_final_masuk" placeholder="Lampiran Dokumen" onchange="previewFile('masuk')" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="html5-url-input" class="col-md-3 col-form-label" style="color: white;">Pratinjau Dokumen</label>
                        <div id="file-preview-masuk" class="col-md-9"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal"><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--===================DETAIL SURAT========--}}
@foreach($dokumen as $item)
<div class="modal fade text-left" id="DetailSurat-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class=" text-center">Detail Surat Masuk</h5>
                <div class="card">
                    <div class="table">
                        <hr style="border-top: 1px dashed #808080;">
                        <div class="row  ">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Tangal Input Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ Carbon::parse($item->tanggal_input)->translatedFormat('l, d F Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">No Registrasi Surat</h6>
                                    <div class="col-sm-7">
                                        :{{  $item->no_registrasi_surat   }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">No. Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ $item->no_surat}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Tanggal Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ Carbon::parse($item->tanggal_surat)->translatedFormat('l, d F Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Pengirim Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ $item->pengirim_surat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Penerima Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ $item->penerima_surat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Keterangan Surat</h6>
                                    <div class="col-sm-7">
                                        : {{ $item->keterangan_surat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <h6 class="col-sm-5">Lampiran Surat</h6>
                                    <div class="col-sm-7">
                                        : <a href="{{ route('download-pdf-surat', ['filename' => $item->lampiran_dokumen_final]) }}">{{ $item->lampiran_dokumen_final }}</a>
                                        <img src="{{ asset('storage/dokumen-final/' . $item->lampiran_dokumen_final) }}" width="200" height="200" alt="Gambar">

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
@endforeach
