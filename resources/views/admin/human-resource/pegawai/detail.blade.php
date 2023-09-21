@foreach($data as $item)
    <div class="modal fade text-left" id="DetailGaji-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2  text-center">Detail Data Gaji Pegawai</h5>
                    <div class="card">
                        <div class="table-responsive mb-3">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                <tr>
                                    <th>Departemen</th>
                                    <td>: {{ $item->department_name }}  </td>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Jabatan </th>
                                    <td>: {{ $item->position_name }} </td>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <td>: {{ $item->employee_name }} </td>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Status Pegawai</th>
                                    <td>: {{ $item->employee_status }} </td>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Gaji Pegawai</th>
                                    <td>:Rp. {{ $item->g_pokok }} </td>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>: {{ $item->keterangan }} </td>
                                </tr>
                                </thead>
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
