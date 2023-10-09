@extends('admin.layouts.app')
@section('content-header')
    {{--    <div class="content-header-left col-12 mb-2 mt-1">--}}
    {{--        <div class="row breadcrumbs-top">--}}
    {{--            <div class="col-12">--}}
    {{--                <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
    {{--                <div class="breadcrumb-wrapper col-12">--}}
    {{--                    <ol class="breadcrumb p-0 mb-0">--}}
    {{--                        <li class="content-header-title float-left pr-1 mb-0">Form Logistik Keluar--}}
    {{--                        </li>--}}
    {{--                        <a class="content-header-title float-left pr-1 mb-0">LOGISTIK</a>--}}
    {{--                    </ol>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
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
                                {{--                                <div class="card-header  pb-0  d-flex justify-content-between">--}}
                                {{--                                    <h4 class="card-title"></h4>--}}
                                {{--                                    <a href="" class="btn btn-success mr-1" data-toggle="modal"--}}
                                {{--                                       data-target="#TambahPengajuanPembelian"><i class="bx bx-plus-circle"></i>   Tambah Data</a>--}}
                                {{--                                </div>--}}
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">No Pengajuan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder="Auto generate"
                                                       aria-describedby="defaultFormControlHelp" readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">Tanggal Pengajuan</label>
                                                <input type="date" class="form-control" id="defaultFormControlInput"
                                                       placeholder="John Doe"
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="defaultFormControlInput" class="form-label"></label>
                                                <a href="" class="btn btn-danger"><i class="bx bx-filter"></i>Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form action="" method="">
                            <form action="" method="">
                                <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                    <table class="table table-bordered table-hover" id="rekap-pengajuan-pembelian">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="w-3p">No</th>
                                            <th class="w-3p">Tanggal Pengajuan</th>
                                            <th class="w-10p">No Pengajuan</th>
                                            <th class="w-5p">Dana Diajukan <br> (Rp)</th>
                                            <th class="w-5p">Status Pengajuan <br> Dana</th>
                                            <th class="w-2p">Action</th>
                                        </tr>
                                        </thead>
                                        @php
                                            $totalLunas = 0;
                                            $totalHutang = 0;
                                        @endphp

                                        <tbody>

                                        @forelse($RekapPembelian as $item)
                                            @php
                                                $totalLunas += ($item->cara_bayar === 'lunas') ? ($item->kuantitas * $item->harga) : 0;
                                                $totalHutang += ($item->cara_bayar === 'hutang') ? ($item->kuantitas * $item->harga) : 0;
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tanggal_pengajuan }}</td>
                                                <td>{{ $item->kode_pengajuan }}</td>
                                                <td>@currency($totalLunas + $totalHutang)</td>
{{--                                                <td>{{ $item->approval_status }}</td>  --}}
{{--                                                <td>--}}
{{--                                                    <a href="{{ route('master-logistik-setujui-pengajuan-pembelian', $item->id) }}" class="btn btn-primary" id="btn-setujui-{{ $item->id }}" onclick="changeButtonColor('btn-setujui-{{ $item->id }}')">--}}
{{--                                                        <i class="bx bx-check-circle"></i>Setujui--}}
{{--                                                    </a>--}}
{{--                                                </td>--}}
                                                @if($item->status == null)
                                                    <td>
                                                        <a href="{{ route('master-logistik-setujui-pengajuan-pembelian', $item->id) }}" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-check"></i> Setujui</a>
                                                        <a href="{{ route('master-logistik-tolak-pengajuan-pembelian', $item->id) }}" class="btn btn-xs btn-danger btn-flat"><i class="fa"></i> Tolak</a>
                                                    </td>
                                                @elseif($item->status == 1)
                                                    <td>
                                                        <a href="{{ route('master-logistik-setujui-pengajuan-pembelian', $item->id) }}" class="btn btn-xs btn-primary btn-flat"><i class="bx bx-check-circle"></i>Di Setujui</a>
                                                    </td>
                                                @elseif($item->status == 2)
                                                    <td>
                                                        <a href="{{ route('master-logistik-tolak-pengajuan-pembelian', $item->id) }}" class="btn btn-xs btn-danger btn-flat"><i class="bx bx-reject"></i>Di Tolak</a>
                                                    </td>
                                                @endif
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <a class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                           href="{{ route('master-logistik-detail-rekap-pembelian', $item->id) }}">
                                                            <i class="bx bx-info-circle font-size-base"></i>
                                                        </a>
                                                        @if ($item->approval_status === 'Request') <!-- Check if approval status is 'Request' -->
                                                        <a class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer"
                                                           href="{{ route('approve-pengajuan-pembelian', $item->id) }}">

                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data Pengajuan Pembelian.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </form>


                        </form>
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
            $("#rekap-pengajuan-pembelian").DataTable();
        });




        // HAPUS DATA
        @if(session('pesan-berhasil'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("pesan-berhasil") }}'
        });
        @elseif(session('pesan-gagal'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session("pesan-gagal") }}'
        });
        @endif

        $(document).ready(function () {
            $('.delete-button').click(function () {
                var $PengajuanPembelianId = $(this).data('id');

                Swal.fire({
                    title: "Yakin akan menghapus data?",
                    text: "Data yang dihapus tidak dapat dikembalikan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('master-logistik-delete-pengajuan-pembelian') }}',
                            type: 'DELETE',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'employee_id': $PengajuanPembelianId
                            },
                            success: function (response) {
                                location.reload();
                                Toast.fire({
                                    icon: "success",
                                    title: "Berhasil menghapus data Pengajuan Pembelian"
                                });
                            },
                            error: function (error) {
                                console.log(err);
                            }
                        });
                    }
                });
            });
        });

    </script>
@endpush
