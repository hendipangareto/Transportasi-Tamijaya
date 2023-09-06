<table class="table table-bordered table-hover table-transaction" id="table-executive-transaction">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-10p">Tipe</th>
            <th class="w-12p">Departure</th>
            <th class="w-10p">Tujuan</th>
            <th>Origin - Destination</th>
            <th class="w-12p text-right">Nominal</th>
            <th class="w-8p">Status</th>
            <th class="w-5p text-center">Act.</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($executive_transactions as $key => $item)
            <tr>
                <td class="w-5p">{{ $key + 1 }}</td>
                <td class="w-10p">{{ $item->booking_transactions_code }}
                </td>
                <td class="w-10p">{{ $item->type_bus }}</td>
                <td class="w-12p">{{ $item->date_departure }}</td>
                <td class="w-10p">{{ $item->destination }}</td>
                <td>{{ $item->pick_point }} <br>{{ $item->arrival_point }}</td>
                <td class="w-12p text-right">
                    Rp. {{ number_format($item->booking_transactions_total_costs) }}
                </td>
                <td class="w-10p">{{ $item->status_name }}
                </td>
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
                            <label class="dropdown-item pointer"
                                onclick="openModal('reguler-transaction','edit', {{ $item->id }})"><i
                                    class="bx bx-edit-alt mr-1"></i> edit</label>
                            <label class="dropdown-item pointer" onclick="manageData('delete', {{ $item->id }})"><i
                                    class="bx bx-trash mr-1"></i>
                                delete</label>
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
