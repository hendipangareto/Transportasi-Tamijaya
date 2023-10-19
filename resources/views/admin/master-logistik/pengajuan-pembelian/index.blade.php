@extends('admin.layouts.app')
{{--@section('content-header')--}}
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
{{--@endsection--}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Pengajuan Pembelian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahPengajuanPembelian"><i class="bx bx-plus-circle"></i> Tambah
                                        Data</a>
                                </div>
                                <div class="row">
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
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('master-logistik.ajukan-pengajuan-pembelian') }}" method="post" enctype="multipart/form-data" onsubmit="return hideTable()">
                            @csrf
                            <table class="table table-bordered table-hover table-responsive-lg"
                                   id="table-pengajuan-pembelian">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-3p">Nama Toko</th>
                                    <th class="w-3p">Item</th>
                                    <th class="w-10p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-5p">Harga Satuan (Rp)</th>
                                    <th class="w-5p">Harga Total (Rp)</th>
                                    <th class="w-10p">Status Transaksi</th>
                                    <th class="w-10p">Status Pengajuan</th>
                                    {{--                                    <th class="w-10p">Action Persetujuan</th>--}}

                                    <th class="w-10p">Action</th>
                                </tr>
                                </thead>


                                @php
                                    $totalLunas = 0;
                                    $totalHutang = 0;
                                @endphp

                                <tbody>
                                @forelse($data as $item)
                                    @php
                                        $totalLunas += ($item->cara_bayar === 'lunas') ? ($item->kuantitas * $item->harga) : 0;
                                        $totalHutang += ($item->cara_bayar === 'hutang') ? ($item->kuantitas * $item->harga) : 0;
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->toko }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>@currency($item->kuantitas * $item->harga)</td>
                                        <td><b style="color: {{ ($item->cara_bayar === 'lunas') ? '#0077ff' : ($item->cara_bayar === 'hutang' ? '#ff7e00' : '') }};  ">{{ $item->cara_bayar }}</b></td>

                                        <td><input type="checkbox" name="pengajuan_pembelian_id[]" value="{{ $item->id }}"></td>


                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#DetailSubBagian-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                    data-toggle="modal"
                                                    data-target="#UpdatePengajuanPembelian-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <div
                                                    class="badge-circle badge-circle-sm badge-circle-danger pointer delete-button "
                                                    data-id="{{ $item->id }}">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data Pengajuan Pembelian.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="row mt-5">
                                <div class="col-md-6 col-12 ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Lunas/Cash</h5>
                                                    <p class="card-text" style="color: #9f191f">
                                                        @currency($totalLunas)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Hutang</h5>
                                                    <p class="card-text" style="color: #9f191f">
                                                        @currency($totalHutang)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none bg-transparent border border-darken-4 mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title mt-1">Total Pengajuan</h5>
                                                    <p class="card-text">
                                                        @currency($totalLunas + $totalHutang)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <input type="hidden" name="status"  id="status">

                            <div class="card-header pb-0 d-flex justify-content-between">
                                <h4 class="card-title"></h4>
                                <button href="#" class="btn btn-primary mr-1" onclick="selectAllItems()" type="button"><i class="bx bx-check"></i> Pilih Semua</button>
                                <button href="#" class="btn btn-warning mr-1" type="submit"><i class="bx bx-save"></i> Ajukan</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin.master-logistik.pengajuan-pembelian.modal-tambah')
@endsection
@push('page-scripts')

    <script>
        function selectAllItems() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = true;
            });
        }
        function selectAllItems() {
            let checkboxes = document.getElementsByName('pengajuan_pembelian_id[]');
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        }

        function hideTable() {
            let table = document.getElementById('table-pengajuan-pembelian');
            table.style.display = 'none';
            return true;
        }


        $(document).ready(function () {
            $("#table-pengajuan-pembelian").DataTable();
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
