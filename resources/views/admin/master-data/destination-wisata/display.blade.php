<table class="table table-bordered table-hover" id="table-destination-wisata">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-20p">Provinsi</th>
            <th class="">Destinasi Wisata</th>
            <th class="w-25p">Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-destination-wisata-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->destination_wisata_code }}</td>
                <td>{{ $item->state_name }}</td>
                <td>{{ $item->destination_wisata_name }}</td>
                <td>{{ $item->destination_wisata_description }}</td>
                <td class="text-center">
                    <div class="d-flex text-center">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('destination-wisata','edit', {{ $item->id }})">
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
                    Tidak Terdapat Data Destinasi Wisata
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
