<table class="table table-bordered table-hover" id="table-day-off">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-25p">Hari Libur</th>
            <th class="w-17p">Tanggal Libur</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-day-off-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->day_off_code }}</td>
                <td>{{ $item->day_off_name }}</td>
                @php
                    $day_off_date = strtotime($item->day_off_date);
                @endphp
                <td>{{ date('d M Y', $day_off_date) }}</td>
                <td>{{ $item->day_off_description }}</td>
                <td class="text-center">
                    <div class="d-flex text-center">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('day-off','edit', {{ $item->id }})">
                            <i class="bx bx-edit font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                            onclick="manageData('delete', {{ $item->id }})">
                            <i class="bx bx-trash font-size-base"></i>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Tidak Terdapat Data Hari Libur
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
