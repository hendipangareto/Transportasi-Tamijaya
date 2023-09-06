<style>
    #table-schedule-pariwisata thead tr th {
        font-size: 11px !important;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table-schedule-pariwisata tbody tr td {
        font-size: 11px !important;
    }

</style>
<table class="table table-bordered table-hover" id="table-schedule-pariwisata">
    <thead>
        <tr>
            <th class="w-20p">Tanggal Wisata</th>
            <th class="w-18p">Customer</th>
            <th class="">Tujuan Wisata</th>
            <th class="w-12p">Tipe Bus</th>
            <th class="w-12p">Sopir</th>
            <th class="w-12p">Kernet</th>
            <th class="w-5p">Act.</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-schedule-pariwisata-{{ $item->id }}">
                <td class="w-20p">{{ date('d M Y', strtotime($item->date_departure)) }} -
                    {{ date('d M Y', strtotime($item->date_return)) }}</td>
                <td class="w-18p">{{ $item->customer_name }}</td>
                <td class="">{{ $item->destination }}</td>
                <td class="w-12p">{{ $item->armada_type }}</td>
                <td class="w-12p">{{ $item->driver ? $item->driver : 'Belum Tersedia' }}
                </td>
                <td class="w-12p">{{ $item->conductor ? $item->conductor : 'Belum Tersedia' }}
                </td>
                <td class="text-center w-5p">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('schedule-pariwisata','edit', {{ $item->id }})">
                            <i class="bx bx-edit font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                            onclick="manageData('delete', 1)">
                            <i class="bx bx-x font-size-base"></i>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">
                    Tidak Terdapat Jadwal Keberangkatan Pariwisata
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
