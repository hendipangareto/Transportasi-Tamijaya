<table class="table table-bordered table-hover" id="table-bank">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th class="w-15p">Nama Bank</th>
            <th >Nama Pemilik</th>
            <th class="w-20p">Nomor Rekening</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-bank-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->bank_code }}</td>
                <td>{{ $item->bank_name }}</td>
                <td>{{ $item->bank_holder }}</td>
                <td>{{ $item->bank_account }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('bank','edit', {{ $item->id }})">
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
                <td colspan="6" class="text-center">
                    Tidak Terdapat Data Bank
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
