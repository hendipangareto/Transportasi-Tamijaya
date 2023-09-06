<table class="table table-bordered table-hover" id="table-user-admin">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-20p">Username</th>
            <th>Email</th>
            <th class="w-25p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($users) > 0)
        @php
        $no = 1;
        @endphp
        @foreach ($users as $data)
        <tr id="row-user-admin-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->name ? $data->name : $data->username}}</td>
            <td>{{ $data->email }}</td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-icon btn-outline-warning mr-1"
                    onclick="openForm('user-admin','edit', {{ $data->id }})"><i class="bx bx-edit"></i></button>
                <button type="button" id="" class="btn btn-sm btn-icon btn-outline-danger"
                    onclick="manageData('delete', {{ $data->id }})"><i class="bx bx-trash"></i></button>
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
