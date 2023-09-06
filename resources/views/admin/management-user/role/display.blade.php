<table class="table table-bordered table-hover" id="table-role">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-20p">Kode</th>
            <th>Peran</th>
            <th class="w-15p text-center">Level</th>
            <th class="w-15p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($roles) > 0)
            @php
                $no = 1;
            @endphp
            @foreach ($roles as $data)
                <tr id="row-role-{{ $data->id }}">
                    <td>{{ $no }}</td>
                    <td>{{ $data->role_code }}</td>
                    <td>{{ $data->role_name }}</td>
                    <td>{{ $data->role_level }}</td>
                    <td class="text-center">
                        <div class="d-flex">
                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                onclick="openForm('role','edit', {{ $data->id }})">
                                <i class="bx bx-edit font-size-base"></i>
                            </div>
                            <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                onclick="manageData('delete', {{ $data->id }})">
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
                <td colspan="5" class="text-center">
                    Tidak Terdapat Data Peran
                </td>
            </tr>
        @endif
    </tbody>
</table>
