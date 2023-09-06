<table class="table table-bordered table-hover" id="table-account">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-20p">Kode Perkiraan</th>
            <th>Nama Account</th>
            {{-- <th>Deskripsi</th> --}}
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-account-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->account_code }}</td>
                <td>{{ $item->account_name }}</td>
                {{-- <td>{{ $item->account_description }}</td> --}}
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('account','edit', {{ $item->id }})">
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
                <td colspan="5" class="text-center">
                    Tidak Terdapat Data Kode Perkiraan
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
