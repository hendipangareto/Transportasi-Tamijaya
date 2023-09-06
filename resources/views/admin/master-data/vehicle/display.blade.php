<table class="table table-bordered table-hover" id="table-vehicle">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th class="w-25p">Service</th>
            <th>Class</th>
            <th>Merk</th>
            <th>Seat</th>
            <th>Police Number</th>
        </tr>
    </thead>
    <tbody>
        @if (count($vehicles) > 0)
        @php
        $no = 1;
        @endphp
        @foreach ($vehicles as $data)
        <tr id="row-vehicle-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->service }}</td>
            <td>{{ $data->class }}</td>
            <td>{{ $data->merk }}</td>
            <td>{{ $data->seat }}</td>
            <td>{{ $data->police_number}}</td>
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
