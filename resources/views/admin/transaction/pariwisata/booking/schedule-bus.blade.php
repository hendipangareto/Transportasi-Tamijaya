@php
$date_in_month = date('t');
use Illuminate\Support\Facades\DB;
@endphp
<style>
    .bg-green {
        background: rgb(178, 255, 178) !important;
    }

    .bg-red {
        background: rgb(255, 178, 178) !important;
    }

    .bg-blue {
        background: rgb(178, 209, 255) !important;
    }

    .bg-yellow {
        background: rgb(255, 243, 178) !important;
    }

    .bg-black {
        background: rgb(49, 49, 49) !important;
    }

    #table-schedule-bus thead tr th,
    #table-schedule-bus tbody tr td {
        font-size: 10px !important;
    }

</style>

{{-- <input type="text" id="submission_target" name="submission_target" value=""> --}}
<table class="table table-bordered table-hover" id="table-schedule-bus">
    <thead>
        <tr>
            <th class="w-10p">
                Plat Nomor
            </th>
            {{-- <th class="w-10p">
                Tipe Bus
            </th> --}}
            @for ($i = 0; $i < $date_in_month; $i++)
                <th>{{ $i + 1 }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @php
            $sd = $start_date;
            $ed = $end_date;
            $day_sd = date_format(date_create($sd), 'd');
            $day_ed = date_format(date_create($ed), 'd');
            $arr_day_off = [];
        @endphp
        @foreach ($day_offs as $day_off_data)
            @php
                $date_d_off = date_create($day_off_data->day_off_date);
                $d_day_off = date_format($date_d_off, 'd');
                array_push($arr_day_off, $d_day_off);
            @endphp
        @endforeach

        @php
            $type_buses = DB::select("SELECT DISTINCT armada_type, armada_seat FROM armadas a WHERE armada_type IN ('MIKRO BUS','MEDIUM BUS', 'BIG BUS')");
        @endphp

        @foreach ($type_buses as $type_bus)
            <tr id="type_{{ $type_bus->armada_type }}">
                <td colspan="{{ $date_in_month + 1 }}" class="font-weight-bold text-center text-black">
                    {{ $type_bus->armada_type }} ({{ $type_bus->armada_seat }} seat)</td>
            </tr>
            @php
                $data_bus = DB::select("SELECT ARMD.id, ARMD.armada_merk, ARMD.armada_no_police, BS.bus_price armada_price, BS.bus_capacity armada_capacity FROM armadas ARMD INNER JOIN bus BS ON UPPER(ARMD.armada_type) = UPPER(BS.bus_name) WHERE ARMD.armada_type = '$type_bus->armada_type'");
            @endphp
            @foreach ($data_bus as $armada)
                <tr id="row-armada-{{ $armada->id }}">
                    <td class="pointer w-10p">
                        <div class="d-flex justify-content-between">
                            <p for="" class="mb-0">
                                {{ $armada->armada_no_police }}
                            </p>

                            <div class="checkbox checkbox-sm">
                                <input
                                    onclick="selectArmadaBus('{{ $type_bus->armada_type }}' , '{{ $armada->armada_no_police }}', {{ $armada->id }}, '{{ $armada->armada_price }}', '{{ $armada->armada_capacity }}')"
                                    type="checkbox" class="checkbox-input checkbox-sm" id="checkbox{{ $armada->id }}">
                                <label for="checkbox{{ $armada->id }}"></label>
                            </div>
                        </div>
                    </td>
                    {{-- <td class="w-10p">{{ $armada->armada_type }}</td> --}}
                    @php
                        $armada_schedules = DB::select("SELECT ash.*, a.`id` as id_armada, a.`armada_category`, a.`armada_type`, a.`armada_no_police` FROM `armada_schedules` ash INNER JOIN armadas a ON ash.id_armada = a.`id` WHERE a.id = $armada->id");
                        foreach ($armada_schedules as $schedule) {
                            $d_armada_from = $schedule->date_from;
                            $d_armada_end = $schedule->date_end;
                            $d_status = $schedule->status;
                            $day_sch_from = date_format(date_create($d_armada_from), 'd');
                            $day_sch_end = date_format(date_create($d_armada_end), 'd');
                            $arr_schedule_armada[] = [
                                'id_armada' => $schedule->id_armada,
                                'day_schedule_from' => $day_sch_from,
                                'day_schedule_end' => $day_sch_end,
                                'status_armada' => $d_status,
                            ];
                        }

                        if (!$armada_schedules) {
                            $arr_schedule_armada = [];
                        }
                    @endphp

                    @for ($i = 1; $i <= $date_in_month; $i++)
                        <td @foreach ($arr_schedule_armada as $schedule_armada)
                            @if ($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'WISATA' && $schedule_armada['id_armada'] == $armada->id)
                                class="bg-red"
                            @elseif ($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'BOOKED' && $schedule_armada['id_armada'] == $armada->id)
                                class="bg-yellow"
                            @elseif ($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'REPAIR' && $schedule_armada['id_armada'] == $armada->id)
                                class="bg-blue"
                            @endif

                            {{-- @if (($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'WISATA' && $schedule_armada['id_armada'] == $armada->id) || ($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'BOOKED' && $schedule_armada['id_armada'] == $armada->id) || ($i >= $schedule_armada['day_schedule_from'] && $i <= $schedule_armada['day_schedule_end'] && $schedule_armada['status_armada'] == 'REPAIR' && $schedule_armada['id_armada'] == $armada->id))
                               class="bg-green"
                           @endif --}}
                    @endforeach

                    @if ($i >= $day_sd && $i <= $day_ed)
                        class="bg-green"
                    @endif
                    {{-- @if ($i >= 13 && $i <= 15)
                       class="bg-red"
                   @endif --}} @if (in_array($i, $arr_day_off))
                        class="bg-black"
                    @endif


                    ></td>
            @endfor
            </tr>
        @endforeach
        @endforeach

        <tr>
            <td>Notes</td>
            <td colspan="{{ $date_in_month }}">
                <ul class="px-0 list-unstyled">
                    @foreach ($day_offs as $day_off)
                        @php
                            $date = date_create($day_off->day_off_date);
                        @endphp
                        <li>
                            {{ date_format($date, 'd M Y') }} - {{ $day_off->day_off_name }}
                        </li>
                    @endforeach
                    <li>
                        <div class="row mt-1">
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <input readonly class="bg-green form-control form-control-sm h-25 w-25">
                                    <label for="" class="ml-1">Available</label>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <input readonly class="bg-yellow form-control form-control-sm h-25 w-25">
                                    <label for="" class="ml-1">Booked</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <input readonly class="bg-red form-control form-control-sm h-25 w-25">
                                    <label for="" class="ml-1">Wisata</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <input readonly class="bg-blue form-control form-control-sm h-25 w-25">
                                    <label for="" class="ml-1">repair</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <input readonly class="bg-black form-control form-control-sm h-25 w-25">
                                    <label for="" class="ml-1">Libur</label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>
