<style>
    #table-schedule-reguler thead tr th {
        font-size: 11px !important;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table-schedule-reguler tbody tr td {
        font-size: 11px !important;
    }

</style>
<table class="table table-bordered table-hover" id="table-schedule-reguler">
    <thead>
    <tr>
        {{-- <th class="w-5p">No</th> --}}
        <th class="w-12p">Tanggal</th>
        <th class="w-10p">Tipe</th>
        <th class="w-12p">Tujuan</th>
        <th>Armada</th>
        <th class="w-13p">Sopir 1</th>
        <th class="w-13p">Sopir 2</th>
        <th class="w-13p">Kernet</th>
        <th class="w-5p">Act.</th>
    </tr>
    </thead>

    <tbody>
    <style>

    </style>
    @forelse ($data as $key => $item)
        <tr id="row-schedule-reguler-{{ $item->id }}" @if ($item->destination == 'JOG-DPS')
            {{-- class="bg-depart" --}}
            @else
            {{-- class="bg-return" --}}
            @endif>
            {{-- <td>{{ $key + 1 }}</td> --}}
            <td class="w-12p">{{ date('d/m/Y', strtotime($item->date_departure)) }}</td>
            <td class="w-10p">{{ $item->type_bus }}</td>
            <td>{{ $item->destination }}</td>
            <td>{{ $item->armada }}</td>
            <td>{{ $item->driver_1 }}</td>
            <td>{{ $item->driver_2 }}</td>
            <td>{{ $item->conductor }}</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                         onclick="openModal('schedule-reguler','edit', {{ $item->id }})">
                        <i class="bx bx-edit font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-danger pointer" onclick="manageData('delete', 1)">
                        <i class="bx bx-x font-size-base"></i>
                    </div>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">
                Tidak Terdapat Jadwal Reguler
            </td>
        </tr>
    @endforelse

    </tbody>
</table>
