<style>
    #table-show-account thead tr th {
        font-size: 11px !important;
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }

    #table-show-account tbody tr td {
        /* font-size: 11px !important; */
    }

</style>
<table class="table table-bordered table-hover" id="table-show-account">
    <thead>
        <tr>
            <th class="w-5p text-center">Check</th>
            <th class="w-25p">Kode</th>
            <th>Nama Account</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td class="text-center">
                    <li class="d-inline-block">
                        <fieldset>
                            <div class="checkbox">
                                <input type="checkbox" class="checkbox-input" id="cbx-{{ $item->id }}"
                                    onclick="checkData({{ $item->id }})">
                                <label for="cbx-{{ $item->id }}"></label>
                            </div>
                        </fieldset>
                    </li>
                </td>
                <td>{{ $item->account_code }}</td>
                <td>{{ $item->account_name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Tidak Terdapat Data Account</td>
            </tr>
        @endforelse
    </tbody>
</table>
