<table class="table table-bordered table-hover" id="table-unit">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th>Satuan Unit</th>
            <th class="w-10p">Alias</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-unit-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->unit_code }}</td>
                <td>{{ $item->unit_name }}</td>
                <td>{{ $item->unit_alias }}</td>
                <td>{{ $item->unit_description }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('unit','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data Satuan Unit
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
