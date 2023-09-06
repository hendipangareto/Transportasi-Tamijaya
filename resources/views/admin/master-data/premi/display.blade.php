<table class="table table-bordered table-hover" id="table-premi">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th>Nama Premi</th>
            <th class="w-15p text-right">Nominal</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-premi-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->premi_code }}</td>
                <td>{{ $item->premi_name }}</td>
                <td class="text-right">Rp. {{ number_format($item->premi_amount) }}</td>
                <td>{{ $item->premi_description }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('premi','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data Premi
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
