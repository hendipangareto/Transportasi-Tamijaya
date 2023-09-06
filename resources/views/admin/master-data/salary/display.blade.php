<table class="table table-bordered table-hover" id="table-salary">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th>Nama Gaji</th>
            <th class="w-15p text-right">Nominal</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-salary-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->salary_code }}</td>
                <td>{{ $item->salary_name }}</td>
                <td class="text-right">Rp. {{ number_format($item->salary_amount) }}</td>
                <td>{{ $item->salary_description }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('salary','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data salary
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
