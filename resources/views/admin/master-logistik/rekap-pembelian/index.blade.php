@extends('admin.layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Rekap Pengajuan Pembelian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">No
                                                    Pengajuan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder="Auto generate"
                                                       aria-describedby="defaultFormControlHelp" readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">Tanggal
                                                    Pengajuan</label>
                                                <input type="date" class="form-control" id="defaultFormControlInput"
                                                       placeholder="John Doe"
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="defaultFormControlInput" class="form-label"
                                                       style="background-color: white">.</label>
                                                <a href="" class="btn btn-danger form-control"><i
                                                        class="bx bx-filter"></i>Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-1">
                            <input type="hidden" id="totalTerpilih" value="{{$terpilih->count()}}">
                            <table class="table datatables table-bordered table-hover table-data"
                                   id="table-rekapitulasi-pekerjaan-terpilih">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Nama Toko</th>
                                    <th class="w-5p">Nama Item</th>
                                    <th class="w-8p">Kuantitas</th>
                                    <th class="w-10p">Satuan</th>
                                    <th class="w-10p">Harga Satuan <br> (Rp.)</th>
                                    <th class="w-10p">Harga Total <br> (Rp)</th>
                                    <th class="w-5p">Status Transaksi</th>

                                    <th class="w-5p">Action</th>
                                </tr>
                                </thead>
                                <tbody id="show-data-rencana-kerja-terpilih">
                                @php
                                    $totalLunas = 0;
                                    $totalHutang = 0;
                                @endphp
                                @forelse ($terpilih as $item)
                                    <tr class="text-center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->toko}}</td>
                                        <td>{{$item->item}}</td>
                                        <td>{{$item->kuantitas}}</td>
                                        <td>{{$item->satuan}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td>@currency($item->kuantitas * $item->harga)</td>
                                        @if($item->status == null)
                                            <td><a class="badge bg-warning" style="color: #ffffff">Request</a></td>
                                        @elseif($item->status == 3)
                                            <td><a class="badge bg-success" style="color: #ffffff">Disetujui
                                                    Pimpinan</a></td>
                                        @elseif($item->status == 1)
                                            <td><a class="badge bg-danger" style="color: #ffffff">Ditolak</a></td>
                                        @endif
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                   href="{{ route('master-logistik-detail-rekap-pembelian', $item->id) }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </a>
                                                @if ($item->approval_status === 'Request')
                                                    <a class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer"
                                                       href="{{ route('master-logistik-detail-rekap-pembelian', $item->id) }}">

                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection


@push('page-scripts')
    <script>

        function changeButtonColor(buttonId) {
            var button = document.getElementById(buttonId);
            var colors = ['btn-success', 'btn-warning', 'btn-info', 'btn-danger'];

            // Fungsi acak untuk memilih indeks warna baru
            function getRandomColor() {
                return colors[Math.floor(Math.random() * colors.length)];
            }

            // Hapus kelas CSS saat ini dan tambahkan warna acak baru
            for (var i = 0; i < colors.length; i++) {
                button.classList.remove(colors[i]);
            }

            var randomColor = getRandomColor();
            button.classList.add(randomColor);
        }

        $(document).ready(function () {
            $("#table-rekapitulasi-pekerjaan-terpilih").DataTable();
        });


    </script>
@endpush
