<table class="table table-bordered table-hover" id="table-position">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th class="w-20p">Department</th>
            <th>Jabatan</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            // print_r($data);
        @endphp
        @forelse ($data as $key => $item)
        <tr id="row-position-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->position_code }}</td>
            <td>{{ $item->department_name }}</td>
            <td>{{ $item->position_name }}</td>
            <td>{{ $item->position_description }}</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" onclick="openModal('position','edit', {{ $item->id }})">
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
            <td colspan="5" class="text-center">
                Tidak Terdapat Data Jabatan
            </td>
        </tr>
        @endforelse
            
    </tbody>
</table>
