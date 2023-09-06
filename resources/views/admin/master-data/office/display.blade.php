<style>
    #table-office tbody tr td{
        vertical-align: top;
    }
</style>
<table class="table table-bordered table-hover" id="table-office">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-10p">Kode</th>
            <th class="w-12p">Lokasi</th>
            <th class="w-12p">Kantor</th>
            <th>Alamat</th>
            <th class="w-27p">Telepon</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-office-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->office_code }}</td>
                <td>{{ $item->office_origin }}</td>
                <td>{{ $item->office_name }}</td>
                <td>{{ $item->office_address }}</td>
                <td>
                    <ul class="pl-2">
                        @php
                            $arr_office = explode(' | ', $item->office_phone);
                        @endphp
                        @foreach ($arr_office as $office_phone)
                            <li>{{ $office_phone }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">
                    <div class="d-flex">
                        <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                            onclick="openModal('office','edit', {{ $item->id }})">
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
                <td colspan="7" class="text-center">
                    Tidak Terdapat Data Kantor
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
