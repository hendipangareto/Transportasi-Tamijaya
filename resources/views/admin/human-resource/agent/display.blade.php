<table class="table table-bordered table-hover" id="table-agent">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-20p">Domisili</th>
            <th class="w-25p">Nama Agen</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-agent-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->agent_code }}</td>
                <td>{{ $item->agent_domicile }}</td>
                <td>{{ $item->agent_name }}</td>
                <td>{{ $item->agent_description }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                            onclick="openModal('agent','detail', {{ $item->id }})">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('agent','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data Karayawan
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
