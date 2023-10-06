<div class="row mt-5">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Waktu</label>
            <input type="date" id="end_date" name="end_date" value=""
                   class="form-control">
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Surat</label>
            <input type="date" id="end_date" name="end_date" value=""
                   class="form-control">
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Filter By Jabatan</label>
            <select class="form-control"
                    name="postionfilter">
                <option disabled selected>Pilih Jabatan</option>

            </select>
        </div>
    </div>

    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="" style="color: white">Filter</label><br>
            <button class="btn btn-outline-primary">Filter <i
                    class="fe fe-filter fe-12"></i></button>
            <a href=" "
               class="btn btn-outline-secondary">Clear <i
                    class="fe fe-refresh-cw fe-12"></i></a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <input type="hidden" value=" ">
    {{--    @php--}}
    {{--        use Carbon\Carbon;--}}
    {{--         Carbon::setLocale('id');--}}
    {{--    @endphp--}}
    <table class="table table-bordered table-hover" id="table-surat-masuk">
        <thead>
        <tr class="text-uppercase text-center">
            <th class="w-3p">No</th>
            <th class="w-10p">Tanggal Input</th>
            <th class="w-10p">No Registrasi Surat</th>
            <th class="w-10p">Nomor Surat</th>
            <th class="w-10p">Tanggal Surat</th>
            <th class="w-10p">Pengirim/Penerima</th>
            <th class="w-10p">Keterangan</th>
            <th class="w-3p">Aksi</th>
        </tr>
        </thead>
        <tbody id="show-data-employee">
        {{--        @forelse($dokumen as $item)--}}
        {{--            <tr class="text-center">--}}
        {{--                <td>{{ $loop->iteration }}</td>--}}
        {{--                <td>{{ Carbon::parse($item->tanggal_input)->translatedFormat('l, d F Y') }}</td>--}}

        {{--                <td>{{ $item->no_registrasi_surat }}</td>--}}
        {{--                <td>{{ $item->no_surat }}</td>--}}

        {{--                <td>{{ Carbon::parse($item->tanggal_surat)->translatedFormat('l, d F Y') }}</td>--}}
        {{--                <td>{{ $item->pengirim_surat }} / {{ $item->penerima_surat }}</td>--}}
        {{--                <td>{{ $item->keterangan_surat }}</td>--}}
        {{--                <td class="text-center">--}}
        {{--                    <div class="d-flex">--}}
        {{--                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"--}}
        {{--                             data-toggle="modal"--}}
        {{--                             data-target="#DetailSurat">--}}
        {{--                            <i class="bx bx-info-circle font-size-base"></i>--}}
        {{--                        </div>--}}
        {{--                        --}}{{--                        <a href=" " class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer">--}}

        {{--                        --}}{{--                            <i class="bx bx-trash font-size-base"></i>--}}
        {{--                        --}}{{--                        </a>--}}
        {{--                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "--}}
        {{--                             data-id="{{ $item->id }}">--}}
        {{--                            <i class="bx bx-trash font-size-base"></i>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </td>--}}
        {{--            </tr>--}}
        {{--        @empty--}}
        {{--            <td colspan="8" class="text-center">Data Dokumen Final</td>--}}
        {{--        @endforelse--}}
        </tbody>
    </table>
</div>


