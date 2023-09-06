<table class="table table-bordered table-hover table-transaction" id="table-data-transaction">
    <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-8p">Kode</th>
            <th class="w-8p">Tipe</th>
            <th>Customer</th>
            <th>Departure - Time</th>
            <th class="w-8p">Tujuan</th>
            <th class="w-12p text-right">Nominal</th>
            <th class="w-7p">Status</th>
            <th class="w-5p text-center">Act.</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($all_transactions as $key => $transaction)
            <tr id="row-schedule-{{ $transaction->id }}">
                <td class="w-3p">{{ $key + 1 }}</td>
                <td class="w-8p">{{ $transaction->booking_transactions_code }}
                </td>
                <td class="w-8p">{{ $transaction->type_bus }}</td>
                <td>{{ $transaction->customer_name }}
                    <br>({{ $transaction->customer_phone }})
                </td>
                <td>{{ $transaction->date_departure }}</td>
                <td class="w-8p">{{ $transaction->destination }}</td>
                <td class="w-12p text-right">
                    Rp. {{ number_format($transaction->booking_transactions_total_costs) }}
                </td>
                <td class="w-7p">{{ $transaction->status_name }}
                </td>
                <td class="w-5p text-center">
                    <div class="dropdown">
                        <span
                            class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                        </span>
                        <div class="dropdown-menu dropdown-menu-right">
                            <label class="dropdown-item pointer"
                                onclick="openModal('reguler-transaction','detail', {{ $transaction->id }})"><i
                                    class="bx bx-info-circle mr-1"></i> detail</label>
                            <label class="dropdown-item pointer"
                                onclick="openModal('reguler-transaction','reschedule', {{ $transaction->id }})"><i
                                    class="bx bx-revision mr-1"></i> reschedule</label>
                            <label class="dropdown-item pointer"
                                onclick="openModal('reguler-transaction','cancel', {{ $transaction->id }})"><i
                                    class="bx bx-calendar-x mr-1"></i> cancel</label>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Tidak Terdapat Data Transaksi</td>
            </tr>
        @endforelse
    </tbody>
</table>
