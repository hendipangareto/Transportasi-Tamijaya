<table class="table table-bordered table-hover" id="table-pick-point">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-15p">Asal</th>
            <th class="w-25p">Titik Jemput</th>
            <th class="w-10p">Waktu</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            // print_r($data);
        @endphp
        @forelse ($data as $key => $item)
            <tr id="row-pick-point-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->pick_point_code }}</td>
                <td>{{ $item->pick_point_origin }}</td>
                <td>{{ $item->pick_point_name }}</td>
                {{-- <td>{{ $item->pick_point_eta }} {{ $item->pick_point_zone }}</td> --}}
                <td>{{ date('H:i', strtotime($item->pick_point_eta)) }} {{ $item->pick_point_zone }}</td>
                {{-- <td>{{ $item->pick_point_description }}</td> --}}
                <td class="text-center">
                    <div class="d-flex text-center">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('pick-point','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data Titik Penjemputan
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
