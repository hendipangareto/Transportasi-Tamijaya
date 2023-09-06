<style>
    #table-journal thead tr th {
        font-size: 12px !important;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table-journal tbody tr td {
        font-size: 12px !important;
    }

</style>
<table class="table table-bordered table-hover" id="table-journal">
    <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-13p">Kode</th>
            <th>Nama Jurnal</th>
            <th class="w-12p text-right">Debit</th>
            <th class="w-12p text-right">Kredit</th>
            <th class="w-12p text-right">Balance</th>
            <th>Status</th>
            <th class="w-12p">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-journal-{{ $item->id }}">
                <td class="w-3p">{{ $key + 1 }}</td>
                <td class="w-13p">{{ $item->journal_number }}</td>
                <td>{{ $item->journal_description }}</td>
                <td class="text-right">Rp. {{ number_format($item->journal_debit) }}</td>
                <td class="text-right">Rp. {{ number_format($item->journal_kredit) }}</td>
                <td class="text-right">Rp. {{ number_format($item->journal_balance) }}</td>
                <td>{{ $item->status_name }}</td>
                <td class="w-12p">
                    <div class="d-flex justify-content-between">
                        <div class="badge-circle badge-circle-sm badge-circle-primary pointer"
                            onclick="openModal('journal','detail', {{ $item->id }})">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-warning pointer"
                            onclick="openModal('journal','edit', {{ $item->id }})">
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
                <td colspan="8" class="text-center">
                    Tidak Terdapat Data Jurnal
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
