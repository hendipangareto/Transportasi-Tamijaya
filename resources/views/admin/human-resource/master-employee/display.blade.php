<table class="table table-bordered table-hover" id="table-master-employee">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-20p">Department</th>
            <th class="w-20p">Jabatan</th>
            <th>Nama Karyawan</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
        <tr id="row-master-employee-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->employee_code }}</td>
            <td>{{ $item->department_name }}</td>
            <td>{{ $item->position_name }}</td>
            <td>{{ $item->employee_name }}</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" onclick="openModal('master-employee','edit', {{ $item->id }})">
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
                Tidak Terdapat Data Karayawan
            </td>
        </tr>
        @endforelse
            
    </tbody>
</table>
