<table class="table table-bordered table-hover" id="table-inbox">
    <thead>
        <tr>
            <th class="w-3p">No</th>
            <th class="w-15p">Pengirim</th>
            <th class="w-20p">Subjek</th>
            <th>Pesan</th>
            <th class="w-10p">Tanggal</th>
            <th class="w-10p">Status</th>
            <th class="w-5p">Act</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inboxes as $key => $inbox)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $inbox->inbox_name }}</td>
                <td>{{ $inbox->inbox_subject }}</td>
                <td>{{ $inbox->inbox_message }}</td>
                <td>{{ date_format(date_create($inbox->created_at), 'd M Y') }} </td>
                <td>{{ $inbox->status }}</td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                            onclick="openModal('inbox','detail', {{ $inbox->id }})">
                            <i class="bx bx-info-circle font-size-base"></i>
                        </div>
                        <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                            onclick="manageData('delete', {{ $inbox->id }})">
                            <i class="bx bx-trash font-size-base"></i>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    Tidak Terdapat Data inbox
                </td>
            </tr>
        @endforelse

        {{-- @forelse ($data as $key => $item)
            <tr id="row-inbox-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->inbox_code }}</td>
                <td>{{ $item->inbox_name }}</td>
                <td>{{ $item->inbox_phone }}</td>
                <td>{{ $item->inbox_email }}</td>
                <td>{{ $item->state_name }} - {{ $item->city_name }} </td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('inbox','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data inbox
                </td>
            </tr>
        @endforelse --}}

    </tbody>
</table>
