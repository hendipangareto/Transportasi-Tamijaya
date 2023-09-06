<table class="table table-bordered table-hover" id="table-bus">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-15p">Nama Bus</th>
            <th class="w-15p">Kapasitas</th>
            <th>Fasilitas</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
        <tr id="row-bus-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->bus_code }}</td>
            <td>{{ $item->bus_name }}</td>
            <td>{{ $item->bus_capacity }} Seat</td>
            <td>{{ $item->bus_facility }}</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" onclick="openModal('bus','gallery', {{ $item->id }})">
                        <i class="bx bx-images font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" onclick="openModal('bus','edit', {{ $item->id }})">
                        <i class="bx bx-edit font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-danger pointer" onclick="manageData('delete', {{ $item->id }})">
                        <i class="bx bx-trash font-size-base"></i>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                Tidak Terdapat Data Bus
            </td>
        </tr>
        @endforelse

    </tbody>
</table>
