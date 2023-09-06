<table class="table table-bordered table-hover" id="table-province">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-25p">Kode Provinsi</th>
            <th>Nama Provinsi</th>
        </tr>
    </thead>
    <tbody>
        @if (count($provinces) > 0)
        @php
        $no = 1;
        @endphp
        @foreach ($provinces as $data)
        <tr id="row-province-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->state_code }}</td>
            <td>{{ $data->state_name }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
            <td colspan="5" class="text-center">
                Tidak Terdapat Data Provinsi
            </td>
        </tr>
        @endif
    </tbody>
</table>
