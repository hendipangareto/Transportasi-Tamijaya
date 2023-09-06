<table class="table table-bordered table-hover" id="table-customer">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-12p">Kode</th>
            <th >Nama</th>
            <th class="w-12p">Telepon</th>
            <th class="w-15p">Email</th>
            <th class="w-20p">Provinsi - Kota</th>
            <th class="w-10p text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
        <tr id="row-customer-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->customer_code }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_phone }}</td>
            <td>{{ $item->customer_email }}</td>
            <td>{{ $item->state_name }} - {{ $item->city_name }} </td>
            <td class="text-center">
                <div class="d-flex">
                    <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" onclick="openModal('customer','edit', {{ $item->id }})">
                        <i class="bx bx-edit font-size-base"></i>
                    </div>
                    <div class="badge-circle badge-circle-sm badge-circle-danger pointer" onclick="manageData('delete', {{ $item->id }})">
                        <i class="bx bx-trash font-size-base"></i>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                Tidak Terdapat Data Customer
            </td>
        </tr>
        @endforelse
            
    </tbody>
</table>
