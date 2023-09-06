<div class="col-md-6">
    <div class="" id="show-data-account-balance-detail-pasiva">
        <table class="table table-bordered table-hover" id="table-balance-aktiva">
            <thead>
                <tr>
                    <th class="w-20p">Kode</th>
                    <th>Nama Account</th>
                    <th class="w-8p text-center">Act</th>
                </tr>
            </thead>
            <tbody id="group-account-list">

                @forelse ($selected_data_by_id as $item)
                    <tr id="tr-group-account-{{ $item->id }}">
                        <td>{{ $item->account_code }}</td>
                        <td>{{ $item->account_name }}</td>
                        <td class="text-center">
                            <div class="d-flex text-center">
                                <div class="badge-circle badge-circle-sm badge-circle-danger pointer text-center"
                                    onclick="checkRemoveData({{ $item->id }}, 'remove')"> <i
                                        class="bx bx-x font-size-base"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    {{-- <tr>
                        <td colspan="3" class="text-center">Tidak terdapat data Account</td>
                    </tr> --}}
                @endforelse

            </tbody>
        </table>
    </div>
</div>

<div class="col-md-6">
    <div id="show-data-list-account">
        <table class="table table-bordered table-hover" id="table-show-account">
            <thead>
                <tr>
                    <th class="w-5p text-center">Check</th>
                    <th class="w-25p">Kode</th>
                    <th>Nama Account</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_data_account as $account)
                {{-- {{ $account }} --}}
                <tr id="tr-account-{{ $account->id }}"
                    @if ($account->group_id !== null) style="display:none;" @endif
                    >
                        <td class="text-center">
                            {{-- <li class="d-inline-block">
                                <fieldset>
                                    <div class="checkbox">
                                        <input type="checkbox" class="checkbox-input" id="cbx-{{ $account->id }}"
                                            onclick="checkRemoveData({{ $account->id }}, 'add', '{{ $account->account_code }}','{{ $account->account_name }}')">
                                        <label for="cbx-{{ $account->id }}"></label>
                                    </div>
                                </fieldset>
                            </li> --}}

                            <div class="text-center">
                                <div class="badge-circle badge-circle-sm badge-circle-success pointer text-center"
                                    onclick="checkRemoveData({{ $account->id }}, 'add', '{{ $account->account_code }}','{{ $account->account_name }}')">
                                    <i class="bx bx-check font-size-base"></i>
                                </div>
                            </div>
                        </td>
                        <td>{{ $account->account_code }}</td>
                        <td>{{ $account->account_name }}</td>
                    </tr>
                @empty
                    {{-- <tr>
                        <td colspan="3" class="text-center">Tidak terdapat data Account</td>
                    </tr> --}}
                @endforelse

            </tbody>
        </table>
    </div>
</div>