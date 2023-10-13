
<div class="table-responsive mt-2">
    <table class="table table-bordered" id="table-jadwal-pariwisata">
        <thead class="text-center">
        <tr>
            <th class="w-2p" rowspan="2">No</th>
            <th class="w-10p" rowspan="2">Tanggal Keberangkatan</th>
            <th class="w-10p" rowspan="2">Tanggal Pulang</th>
            <th class="w-10p" rowspan="2">Tipe Armada</th>
            <th class="w-10p" rowspan="2">Armada</th>
            <th class="w-10p" colspan="2">Detail Perjalanan</th>
            <th class="w-10p" rowspan="2">Sopir 1</th>
            <th class="w-10p" rowspan="2">Sopir 2</th>
            <th class="w-10p" rowspan="2">Kernet</th>
            <th class="w-10p" rowspan="2">Status</th>
            <th class="w-10p" rowspan="2">Action</th>
        </tr>
        <tr>
            <td class="w-5p">Kode Keberangkatan</td>
            <td class="w-5p">Kode Tujuan</td>
        </tr>

        </thead>
        <tbody>
        @forelse($schedulePariwisatas as $item)
            @php
                $employee = \App\Models\HumanResource\Employee::find($item->sopir_1);
                $employees = \App\Models\HumanResource\Employee::find($item->sopir_2);
            @endphp
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->date_departure }}</td>
                <td>{{ $item->date_return }}</td>
                <td>{{ $item->no_police }}</td>
                <td>{{ $item->id_pick_point }}</td>
                <td></td>
                <td> </td>
                <td>
                    @if ($employee)
                        {{ $employee->employee_name }}
                    @else
                        Sopir Tidak Ditemukan
                    @endif
                </td>
                <td>
                    @if ($employees)
                        {{ $employees->employee_name }}
                    @else
                        Sopir Tidak Ditemukan
                    @endif
                </td>

                <td>{{ $item->employee_name }}</td>
                <td>Ban Kempes</td>
                <td>
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                             data-toggle="modal"
                             data-target="#DetailSubBagian-{{ $item->id }}">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                             data-toggle="modal"
                             data-target="#UpdateScheduleParawisata-{{ $item->id }}">
                            <i class="bx bx-edit font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer"
                             data-toggle="modal"
                             data-target="#UpdateScheduleParawis-{{ $item->id }}">
                            <i class="bx bx-trash font-size-base"></i>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data schedule parawisata</td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
