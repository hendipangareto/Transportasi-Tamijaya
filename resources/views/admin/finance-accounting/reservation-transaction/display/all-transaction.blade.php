<table class="table table-bordered table-hover table-transaction" id="table-all-transaction">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-20p">Jenis - Tipe</th>
            <th class="">Customer</th>
            <th class="w-12p">Tanggal</th>
            <th class="w-12p text-right">Nominal</th>
            <th class="w-8p">Status</th>
            <th class="w-5p text-center">Act.</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($all_transactions as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td class="w-10p">{{ $item->booking_transactions_code }}</td>
                <td class="w-20p">{{ $item->booking_transactions_type_booking }}</td>
                <td class="">{{ $item->customer_name }}</td>
                <td class="w-12p">{{ date_format(date_create($item->created_at), 'd M Y') }} </td>
                <td class="w-12p text-right">Rp. {{ number_format($item->booking_transactions_total_costs) }}</td>
                <td class="w-8p">{{ $item->status_name }}</td>
                <td class="w-5p text-center">
                    <div class="dropdown">
                        <span
                            class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                        </span>
                        <div class="dropdown-menu dropdown-menu-right">
                            <label class="dropdown-item pointer"
                                onclick="openModal('reguler-transaction','detail', {{ $item->id }})"><i
                                    class="bx bx-info-circle mr-1"></i> detail</label>
                            @if ($item->status_name !== 'DONE')                              
                                <label class="dropdown-item pointer"
                                    onclick="manageData('delete', {{ $item->id }})"><i class="bx bx-trash mr-1"></i>
                                    delete</label>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Tidak terdapat data transaksi</td>
            </tr>
        @endforelse
    </tbody>
</table>
