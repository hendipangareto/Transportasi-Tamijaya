<table class="table table-bordered table-hover" id="table-status">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-15p">Kode Status</th>
            <th>Status</th>
            <th>Deskripsi</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($status) > 0)
            @php
                $no = 1;
            @endphp
            @foreach ($status as $data)
                <tr id="row-status-{{ $data->id }}">
                    <td>{{ $no }}</td>
                    <td>{{ $data->status_code }}</td>
                    <td>{{ $data->status_name }}</td>
                    <td>{{ $data->status_description }}</td>
                    <td class="text-center">
                        <div class="d-flex">
                            <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" onclick="openModal('status','edit', {{ $data->id }})">
                                <i class="bx bx-edit font-size-base"></i>
                            </div>
                            <div class="badge-circle badge-circle-sm badge-circle-danger pointer" onclick="manageData('delete', {{ $data->id }})">
                                <i class="bx bx-trash font-size-base"></i>
                            </div>
                        </div>
                        {{-- <div class="badge-circle badge-circle-sm badge-circle-light-warning mr-1 pointer">
                            <i class="bx bx-edit"></i>
                        </div> --}}

                        {{-- <div class="dropdown">
                            <span
                                class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item pointer" onclick="openModal('status','edit', {{ $data->id }})"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                <a class="dropdown-item pointer" onclick="manageData('delete', {{ $data->id }})"><i class="bx bx-trash mr-1"></i> delete</a>
                            </div>
                        </div> --}}
                        
                        {{-- <button type="button" class="btn btn-sm btn-icon btn-outline-warning mr-1" --}}
                        {{-- <button type="button" class="btn btn-sm btn-icon btn-outline-warning mr-1"
                    onclick="openModal('status','edit', {{ $data->id }})"><i class="bx bx-edit"></i></button>
                <button type="button" id="" class="btn btn-sm btn-icon btn-outline-danger"
                    onclick="manageData('delete', {{ $data->id }})"><i class="bx bx-trash"></i></button> --}}
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">
                    Tidak Terdapat Data Status
                </td>
            </tr>
        @endif
    </tbody>
</table>
