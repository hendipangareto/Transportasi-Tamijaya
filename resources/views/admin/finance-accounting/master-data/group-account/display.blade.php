<style>
    #table-group-account tbody tr td {
        vertical-align: top;
    }

</style>
<table class="table table-bordered table-hover" id="table-group-account">
    <thead>
        <tr>
            <th class="w-10p">Kode</th>
            <th class="w-20p">Nama Group Account</th>
            <th>List Account</th>
            <th class="w-12p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            use Illuminate\Support\Facades\DB;
            use App\Models\MasterData\Account;
        @endphp
        @forelse ($data as $item)
            <tr>
                <td class="pointer">
                    {{ $item->group_account_code }}</td>
                <td class="pointer" onclick="openDetailAktiva({{ $item->id }})"
                    id="td-title-aktiva-{{ $item->id }}">{{ $item->group_account_name }}</td>
                <td>
                    <ul class="pl-2 mb-0">
                        @php
                            $accounts = Account::where('id_group_account', $item->id)->get();
                        @endphp
                        @forelse ($accounts as $account)
                            <li>{{ $account->account_name }}</li>
                        @empty
                            <li>Tidak Terdapat Data Account</li>
                        @endforelse
                    </ul>
                </td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                            onclick="openModal('group-account','list-account', {{ $item->id }})">
                            <i class="bx bx-collection font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('group-account','edit', {{ $item->id }})">
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
                <td colspan="4" class="text-center">Tidak terdapat Group Account</td>
            </tr>
        @endforelse
    </tbody>
</table>
