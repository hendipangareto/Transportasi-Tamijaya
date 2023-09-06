<table class="table table-bordered table-hover" id="table-route-wisata">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="">Dari</th>
            <th class="">Tujuan</th>
            {{-- <th class="w-20p">Harga</th> --}}
            <th class="w-10p">Estimasi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-route-wisata-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->destination_from }}</td>
                <td>{{ $item->destination_target }}</td>
                {{-- <td>Rp. {{ number_format($item->route_wisata_price) }}</td> --}}
                <td>{{ $item->route_wisata_estimate }} hari</td>
                <td class="text-center">
                    <div class="d-flex text-center">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('route-wisata','edit', {{ $item->id }})">
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
