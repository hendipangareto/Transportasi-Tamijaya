<style>
    #table-balance-pasiva thead tr th {
        font-size: 11px !important;
    }

    #table-balance-pasiva tbody tr td {
        font-size: 12px !important;
    }

    #table-balance-pasiva-detail thead tr th {
        font-size: 11px !important;
    }

    #table-balance-pasiva-detail tbody tr td {
        font-size: 12px !important;
    }

</style>
<table class="table table-bordered table-hover" id="table-balance-pasiva">
    <thead>
        <tr>
            <th class="w-25p">Kode</th>
            <th>Nama Header</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td class="pointer" onclick="openDetailPasiva({{ $item->id }})">
                    {{ $item->balance_pasiva_code }}</td>
                <td class="pointer" onclick="openDetailPasiva({{ $item->id }})"
                    id="td-title-pasiva-{{ $item->id }}">{{ $item->balance_pasiva_name }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('balance-pasiva','edit', {{ $item->id }})">
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
                <td colspan="3" class="text-center">Tidak terdapat Neraca Pasiva</td>
            </tr>
        @endforelse
    </tbody>
</table>
