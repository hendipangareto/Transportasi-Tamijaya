<style>
    #table-payment-request tbody tr td{
        font-size: 12px!important;
    }
</style>
<table class="table table-bordered table-hover" id="table-payment-request">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th>Pesan</th>
            <th class="w-10p text-right">Nominal</th>
            <th class="w-12p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            @php
                $message = 'Pembayaran tiket : '.$item->booking_transactions_code . ' (' . $item->payment_type . ') dengan nominal Rp. ' . number_format($item->amount) . ' atas nama ' . $item->customer_name . ' diajukan oleh : ' . $item->user_name;
            @endphp
            <tr id="row-payment-request-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $message }}</td>
                <td class="text-right">{{ number_format($item->amount) }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-between">
                        <div class="badge-circle badge-circle-sm badge-circle-primary pointer"
                            onclick="openModal('payment-request','detail',{{ $item->id }})">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-success pointer"
                            onclick="manageData('approve', {{ $item->id }})">
                            <i class="bx bx-check-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                            onclick="manageData('reject', {{ $item->id }})">
                            <i class="bx bx-x-circle font-size-base"></i>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Tidak Terdapat Permintaan Pembayaran
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
