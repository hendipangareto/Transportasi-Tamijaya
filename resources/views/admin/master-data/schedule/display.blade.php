<table class="table table-bordered table-hover" id="table-schedule">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th>Tipe Armada</th>
            <th class="w-12p">Hari</th>
            <th>Destinasi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        @php
            function generateDay($day){
                if($day == "Mon"){
                    return 'SENIN';
                }else if($day == "Tue"){
                    return 'SELASA';
                }else if($day == "Wed"){
                    return 'RABU';
                }else if($day == "Thu"){
                    return 'KAMIS';
                }else if($day == "Fri"){
                    return 'JUMAT';
                }else if($day == "Sat"){
                    return 'SABTU';
                }else {
                    return 'MINGGU';
                }
            }
        @endphp
        @forelse ($data as $key => $item)
            <tr id="row-schedule-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->schedule_code }}</td>
                <td>{{ $item->schedule_bus }}</td>
                <td>{{ generateDay($item->schedule_day) }}</td>
                <td>{{ $item->schedule_destination }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('schedule','edit', {{ $item->id }})">
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
                <td colspan="6" class="text-center">
                    Tidak Terdapat Data Jadwal
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
