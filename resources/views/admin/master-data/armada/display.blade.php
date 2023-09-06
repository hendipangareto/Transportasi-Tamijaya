<table class="table table-bordered table-hover" id="table-armada">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-20p">Kategori</th>
            <th class="w-25p">Type</th>
            <th class="d-none">Year</th>
            <th class="d-none">Capacity</th>
            <th class="d-none">Cylinder</th>
            <th>Seat</th>
            <th>Merk</th>
            <th>No Polisi</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($armada) > 0)
        @php
        $no = 1;
        @endphp
        @foreach ($armada as $data)
        <tr id="row-armada-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->armada_category }} - {{ $data->id }}</td>
            <td>{{ $data->armada_type }}</td>
            <td class="d-none">{{ $data->armada_year }}</td>
            <td class="d-none">{{ $data->armada_capacity }}</td>
            <td class="d-none">{{ $data->armada_cylinder }}</td>
            <td>{{ $data->armada_seat }}</td>
            <td>{{ $data->armada_merk }}</td>
            <td>{{ $data->armada_no_police }}</td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" onclick="openInfoSeat(this)" >
                        <i class="bx bx-info-circle font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                        onclick="openModal('armada','edit', {{ $data->id }})"
                        >
                        <i class="bx bx-edit font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                        onclick="manageData('delete', {{ $data->id }})"
                        >
                        <i class="bx bx-trash font-size-base"></i>
                    </div>
                </div>
            </td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">
                Tidak Terdapat Data Armada
            </td>
        </tr>
        @endif
    </tbody>
</table>
