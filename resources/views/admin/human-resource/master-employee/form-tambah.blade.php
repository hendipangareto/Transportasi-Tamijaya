@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">

                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Data Master Karyawan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('human-resource-master-employee-store-data') }} " id="form-tambah-karyawan" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 mb-1">Form Tambah Karyawan</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('human-resource-master-employee-list-data')}}"
                                       class="btn btn-warning mr-1"><i
                                            class="fe fe-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-success">Simpan <i
                                            class="fe fe-check-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">


                                <input type="hidden" class="form-control" placeholder="ID pegawai otomatis" style="font-style: italic"
                                       readonly>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fingerprint Pegawai :</label>
                                <input type="number" class="form-control" name="id_fingerprint" placeholder="ID pegawai otomatis" style="font-style: italic"
                                        >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pegawai:</label>
                                <input type="text" class="form-control" name="namaPegawai"
                                       placeholder="Masukan nama pegawai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Departemen :</label>
                                <select name="idDepartemen" id="" class="form-control">
                                    <option value="" selected disabled>Pilih departemen</option>
                                    @foreach($departemen as $item)
                                        <option value="{{$item->id}}">{{$item->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jabatan :</label>
                                <select name="jabatanPegawai" id="" class="form-control">
                                    <option value="" selected disabled>Pilih jabatan</option>
                                    @foreach($jabatan as $item)
                                        <option value="{{$item->id}}">{{$item->position_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status Pegawai :</label>
                                <select name="statusPegawai" id="" class="form-control">
                                    <option value="" selected disabled>Pilih status</option>
                                    <option value="Tetap">Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Awal Kontrak :</label>
                                <input type="date" name="awalKontrakPegawai" class="form-control"
                                       value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jenis Kelamin :</label>
                                <select name="jkPegawai" id="" class="form-control">
                                    <option value="" selected disabled>Pilih jenis kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Lahir :</label>
                                <input type="date" name="tglLahirPegawai" class="form-control"
                                       value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status Pernikahan :</label>
                                <select name="statusPernikahan" id="" class="form-control">
                                    <option value="" selected disabled>Pilih status pernikahan</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Selesai Kontrak :</label>
                                <input name="selesaiKontrakPegawai" type="date" class="form-control"
                                       value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="float-left">Alamat KTP :</label>
                                <label for="" class="float-right" style="color: red">Alamat sesuai KTP</label>
                                <label for="" class="float-right mr-1"><input type="checkbox" class="col-form-label" checked style="width: 20px; margin-top: 2px"></label>
                                <textarea name="alamatKtpPegawai" class="form-control"
                                          placeholder="Alamat sesuai KTP"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat Domisili :</label>
                                <textarea name="alamatDomisiliPegawai" class="form-control mr-2"
                                          placeholder="Alamat sesuai domisili"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nik Pegawai :</label>
                                <input name="nikPegawai" type="number" class="form-control" placeholder="Masukan nik">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">NPWP Pegawai :</label>
                                <input name="npwpPegawai" type="number" class="form-control" placeholder="Masukan NPWP">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">BPJS Kesehatan Pegawai :</label>
                                <input name="bpjsKesehatanPegawai" type="number" class="form-control"
                                       placeholder="Masukan no bpjs kesehatan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">BPJS Ketenagakerjaan Pegawai :</label>
                                <input  name="bpjsKetenagakerjaanPegawai" type="number"  class="form-control"
                                       placeholder="Masukan no bpjs Ketenagakerjaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No Hp Pegawai :</label>
                                <input name="noTeleponPegawai" type="number" class="form-control"
                                       placeholder="Masukan no hp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email Pegawai :</label>
                                <input name="emailPegawai" type="email" class="form-control"
                                       placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nama Rekening Pegawai :</label>
                                <input name="namaRekening" type="text" class="form-control"
                                       placeholder="Masukan nama Rekening">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No Rekening Pegawai :</label>
                                <input name="noRekPegawai" type="number" class="form-control"
                                       placeholder="Masukan no rekening">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-left">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-tambah-keluarga">Tambah Data Keluarga <i
                                        class="fe fe-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatables table-bordered table-hover table-data">
                            <thead>
                            <tr class="text-uppercase">
                                <th class="w-10p">Nama</th>
                                <th class="w-10p">Jenis Kelamin</th>
                                <th class="w-5p">Tanggal Lahir</th>
                                <th class="w-5p">Status Keluarga</th>
                                <th class="w-10p">ALamat KTP</th>
                                <th class="w-10p">Alamat Domisili</th>
                                <th class="w-5p">Nik</th>
                                <th class="w-5p">NPWP</th>
                                <th class="w-5p">BPJS Kesehatan</th>
                                <th class="w-10p">No Hp</th>
                                <th class="w-10p">Email</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-keluarga-employee">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.human-resource.master-employee.tambah-keluarga')
@endsection
@push('page-scripts')
    <script>
        $(function () {
            //start
            $("#btn-simpan-anggota-keluarga").click(function () {

                var namaAnggotaKeluarga = $("#nama-anggota-keluarga").val();
                var jkAnggotaKeluarga = $("#jk-anggota-keluarga").val();
                var tglLahirAnggotaKeluarga = $("#tgl-lahir-anggota-keluarga").val();
                var statusAnggotaKeluarga = $("#status_keluarga").val();
                var alamatKTPAnggotaKeluarga = $("#alamat-Ktp-keluarga").val();
                var alamatDomisiliAnggotaKeluarga = $("#alamat-domisili-keluarga").val();
                var nikAnggotaKeluarga = $("#nik-keluarga").val();
                var npwpAnggotaKeluarga = $("#npwp-keluarga").val();
                var bpjsKesehatanAnggotaKeluarga = $("#bpjs-kesehatan-keluarga").val();
                var noTeleponAnggotaKeluarga = $("#no-telepon-keluarga").val();
                var emailAnggotaKeluarga = $("#email-keluarga").val();
                var kontakDaruratAnggotaKeluarga = $("#kontak-darurat-keluarga").val();


                console.log("namaAnggotaKeluarga: " + namaAnggotaKeluarga)
                console.log("jkAnggotaKeluarga: " + jkAnggotaKeluarga)
                console.log("tglLahirAnggotaKeluarga: " + tglLahirAnggotaKeluarga)
                console.log("statusAnggotaKeluarga: " + statusAnggotaKeluarga)
                console.log("alamatKTPAnggotaKeluarga: " + alamatKTPAnggotaKeluarga)
                console.log("alamatDomisiliAnggotaKeluarga: " + alamatDomisiliAnggotaKeluarga)
                console.log("nikAnggotaKeluarga: " + nikAnggotaKeluarga)
                console.log("npwpAnggotaKeluarga: " + npwpAnggotaKeluarga)
                console.log("bpjsKesehatanAnggotaKeluarga: " + bpjsKesehatanAnggotaKeluarga)
                console.log("noTeleponAnggotaKeluarga: " + noTeleponAnggotaKeluarga)
                console.log("emailAnggotaKeluarga: " + emailAnggotaKeluarga)
                console.log("kontakDaruratAnggotaKeluarga: " + kontakDaruratAnggotaKeluarga)

                var html = `<tr>`;

                html += `<td>
                            ${namaAnggotaKeluarga}
                            <input type="hidden" name="keluarga[namaAnggotaKeluarga][]" value="${namaAnggotaKeluarga}">
                        </td>`;
                html += `<td>${jkAnggotaKeluarga}
                            <input type="hidden" name="keluarga[jkAnggotaKeluarga][]" value="${jkAnggotaKeluarga}">
                         </td>`;
                html += `<td>${tglLahirAnggotaKeluarga}
                            <input type="hidden" name="keluarga[tglLahirAnggotaKeluarga][]" value="${tglLahirAnggotaKeluarga}">
                         </td>`;
                html += `<td>${statusAnggotaKeluarga}
                            <input type="hidden" name="keluarga[statusAnggotaKeluarga][]" value="${statusAnggotaKeluarga}">
                         </td>`;
                html += `<td>${alamatKTPAnggotaKeluarga}
                            <input type="hidden" name="keluarga[alamatKTPAnggotaKeluarga][]" value="${alamatKTPAnggotaKeluarga}">
                         </td>`;
                html += `<td>${alamatDomisiliAnggotaKeluarga}
                            <input type="hidden" name="keluarga[alamatDomisiliAnggotaKeluarga][]" value="${alamatDomisiliAnggotaKeluarga}">
                         </td>`;
                html += `<td>${nikAnggotaKeluarga}
                             <input type="hidden" name="keluarga[nikAnggotaKeluarga][]" value="${nikAnggotaKeluarga}">
                         </td>`;
                html += `<td>${npwpAnggotaKeluarga}
                            <input type="hidden" name="keluarga[npwpAnggotaKeluarga][]" value="${npwpAnggotaKeluarga}">
                         </td>`;
                html += `<td>${bpjsKesehatanAnggotaKeluarga}
                            <input type="hidden" name="keluarga[bpjsKesehatanAnggotaKeluarga][]" value="${bpjsKesehatanAnggotaKeluarga}">
                         </td>`;
                html += `<td>${noTeleponAnggotaKeluarga}
                            <input type="hidden" name="keluarga[noTeleponAnggotaKeluarga][]" value="${noTeleponAnggotaKeluarga}">
                         </td>`;
                html += `<td>${emailAnggotaKeluarga}
                            <input type="hidden" name="keluarga[emailAnggotaKeluarga][]" value="${emailAnggotaKeluarga}">
                            <input type="hidden" name="keluarga[kontakDaruratAnggotaKeluarga][]" value="${kontakDaruratAnggotaKeluarga}">
                         </td>`;

                html += `</tr>`;

                $("#show-data-keluarga-employee").append(html);
                $("#modal-tambah-keluarga").modal('hide');

            })
        });

        $(document).ready(function () {
            function clearFormData() {
                $("#nama-anggota-keluarga").val("");
                $("#jk-anggota-keluarga").val("");
                $("#tgl-lahir-anggota-keluarga").val("{{date('Y-m-d')}}");
                $("#status_keluarga").val("");
                $("#alamat-Ktp-keluarga").val("");
                $("#alamat-domisili-keluarga").val("");
                $("#nik-keluarga").val("");
                $("#npwp-keluarga").val("");
                $("#bpjs-kesehatan-keluarga").val("");
                $("#no-telepon-keluarga").val("");
                $("#email-keluarga").val("");
                $("#kontak-darurat-keluarga").val("");
            }

            $("#modal-tambah-keluarga").on("hidden.bs.modal", function () {
                clearFormData();
            });
        });

    </script>
@endpush
