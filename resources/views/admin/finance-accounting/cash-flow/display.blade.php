<style>
    #table-cash-flow tfoot tr td {
        font-size: 14px !important;
        padding: 5px;
        vertical-align: bottom;
    }

</style>
<table class="table table-bordered table-hover" id="table-cash-flow">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-35p">Account</th>
            <th>Deskripsi</th>
            <th class="w-12p text-center">Tanggal</th>
            <th class="w-12p text-right">Debit</th>
            <th class="w-12p text-right">Kredit</th>
            <th class="w-12p text-center">Reff. Number</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr>
                <td class="w-5p">{{ $key + 1 }}</td>
                <td class="w-15p">{{ $item->account_name }}</td>
                <td>{{ $item->description }}</td>
                <td class="text-center">
                    {{ date_format(date_create($item->date_cf), 'd M Y') }}
                </td>
                <td class="w-12p text-right text-success">
                    @if ($item->type_cf == 'DEBIT')
                        {{ number_format($item->amount) }}
                    @else
                        -
                    @endif
                </td>
                <td class="w-12p text-right text-danger">
                    @if ($item->type_cf == 'KREDIT')
                        {{ number_format($item->amount) }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-center">
                    R019239123
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Tidak terdapat data Cash Flow</td>
            </tr>
        @endforelse
    </tbody>
    @if ($data_result)
        <tfoot class="table-bordered font-weight-bold">
            <tr>
                <td colspan="4" class="text-right">TOTAL</td>
                <td class="text-right ">{{ number_format($data_result->TOTAL_DEBIT) }}</td>
                <td class="text-right ">{{ number_format($data_result->TOTAL_KREDIT) }}</td>
                <td class="text-right ">Balance : {{ number_format($data_result->BALANCE) }}</td>
            </tr>
        </tfoot>
    @endif

</table>
