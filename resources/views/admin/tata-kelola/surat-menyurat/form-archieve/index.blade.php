<div class="modal fade text-left" id="ArchieceSuratMasuk" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Archieve Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <input type="hidden" value="">
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
                            <th class="w-10p">Pengirim ➡️ Penerima</th>
                            <th class="w-10p">Keterangan</th>
                            <th class="w-3p">Aksi</th>
                        </tr>
                        </thead>
                        <tbody id="show-data-employee">
                        @forelse($archieveSuratMasuk as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Carbon::parse($item->tanggal_input)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->no_registrasi_surat }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ Carbon::parse($item->tanggal_surat)->translatedFormat('l, d F Y') }}</td>
                                <td>({{ $item->pengirim_surat }}) ➡️ <br>   ({{ $item->penerima_surat }})</td>
                                <td>{{ $item->keterangan_surat }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <div class="col-md-2">
                                            @if($item)
                                                <form action="{{ route('data-kelola.surat-menyurat.kembalikan-archieve-data') }}" class="d-inline delete-form" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id_qs[]" value="{{ $item->id }}">
                                                    <button type="submit" class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" id="btn-submit-pekerjaan-sm" onclick="event.preventDefault(); showConfirmationModal(this);">
                                                        <i class="bx bx-reset"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="8">Data Dokumen Final tidak ditemukan</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
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

        </div>
    </div>
</div>
