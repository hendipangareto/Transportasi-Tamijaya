<table class="table table-bordered table-hover" id="table-city">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-20p">Kode Kota</th>
            <th class="w-25p">Provinsi</th>
            <th>Nama Kota</th>
        </tr>
    </thead>
    <tbody>
        @if (count($cities) > 0)
        @php
        $no = 1;
        @endphp
        @foreach ($cities as $data)
        <tr id="row-province-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->state_code }} - {{ $data->id }}</td>
            <td>{{ $data->state_name }}</td>
            <td>{{ $data->city_name }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
            <td colspan="5" class="text-center">
                Tidak Terdapat Data Kota
            </td>
        </tr>
        @endif
    </tbody>
</table>
