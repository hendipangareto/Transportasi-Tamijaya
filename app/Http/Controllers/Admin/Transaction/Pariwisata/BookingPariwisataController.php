<?php

namespace App\Http\Controllers\Admin\Transaction\Pariwisata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Bank;
use App\Models\MasterData\Province;
use App\Models\MasterData\Armada;
use App\Models\MasterData\DestinationWisata;
use App\Models\MasterData\RouteWisata;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\SchedulePariwisata;
use App\Models\HumanResource\Agent;
use Illuminate\Support\Facades\Auth;
use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;
use PDF;

class BookingPariwisataController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('bank_name', 'ASC')->get();
        $agents = Agent::orderBy('agent_domicile', 'ASC')->get();
        $provinces = Province::orderBy('state_name', 'ASC')
            ->whereIn('id', [1, 2, 3, 16, 17, 18, 31, 32, 33, 34, 35, 36, 51, 52, 53])
            ->get();
        $armadas = Armada::orderBy('id', 'ASC')
            ->where('armada_category', 'PARIWISATA')
            ->where('armada_type', 'MIKRO BUS')
            ->get();
        $destinations = DestinationWisata::orderBy('destination_wisata_name', 'ASC')->get();
        return view('admin.transaction.pariwisata.booking.index', ['banks' => $banks, 'agents' => $agents, 'provinces' => $provinces, 'armadas' => $armadas, 'destinations' => $destinations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Add function Pariwisata
    public function getMasterCustomer(Request $request)
    {
        $data = [];
        $search = $request->search;
        $data = DB::select("SELECT CONCAT(id,'|',customer_code,'|',customer_phone,'|',customer_nik,'|',customer_email) 'id', CONCAT(customer_name, ' - ', customer_email) 'text' FROM customers WHERE customer_name LIKE '%" . $search . "%'");
        return response()->json($data);
    }

    public function checkAvailableBus(Request $request)
    {
        $resultBus = DB::select("SELECT id,bus_code, bus_name, bus_capacity, bus_facility, bus_image FROM bus WHERE bus_type = 'Pariwisata'");

        return response()->json([
            'bus' => $resultBus,
            'message' => empty($resultBus) ? 'Tidak ada bus tersedia' : 'Bus Tersedia !',
            'status' => $resultBus ? 200 : 400,
        ]);
    }

    public function checkAvailableArmada(Request $request)
    {
        $resultArmada = DB::select("SELECT ARMD.id, ARMD.armada_merk, ARMD.armada_no_police, BS.bus_price armada_price, BS.bus_capacity armada_seat FROM armadas ARMD INNER JOIN bus BS ON UPPER(ARMD.armada_type) = UPPER(BS.bus_name)
        WHERE ARMD.armada_type = '$request->typeBus'");

        return response()->json([
            'armada' => $resultArmada,
            'message' => empty($resultArmada) ? 'Tidak ada Armada Pariwisata tersedia' : 'Armada Pariwisata Tersedia !',
            'status' => $resultArmada ? 200 : 400,
        ]);
    }

    public function submitTransactionPariwisata(Request $request)
    {
        // $this->_validation($request);
        // echo json_encode($request->all());

        extract($request->all());

        $req = $request->all();
        $path_payment_attachment = null;

        $files = $request->file();

        $isAvailablePaymentMethod = isset($files['payment_attachment']);
        if ($isAvailablePaymentMethod) {
            $path_payment_attachment = $files['payment_attachment']->store('assets/payment', 'public');
        }

        $payload = [
            '_token' => $req['_token'],
            'booking_transactions_code' => 'P' . date('dHis'),
            'booking_transactions_customer_code' => $req['transaction_customer_id'],
            'booking_transactions_type_booking' => 'PARIWISATA',
            'booking_transactions_city_from' => $req['from_wisata'],
            'booking_transactions_city_to' => $req['target_wisata'],
            'booking_transactions_total_seats' => $req['wisata_jumlah_penumpang'],
            'booking_transactions_total_costs' => $req['total_price'],
            'booking_transactions_additional_price' => $req['additional_price'] ? $req['additional_price'] : 0,
            'booking_transactions_total_discount' => $req['discount'] ? $req['discount'] : 0,
            'booking_transactions_payment_method' => $req['payment_method'],
            'booking_transactions_payment_attachment' => $path_payment_attachment ? $path_payment_attachment : null,
            'booking_transactions_id_payment' => $req['id_payment'] ? $req['id_payment'] : null,
            'booking_transactions_status' => 19,
            'created_by' => Auth::user()->id,
        ];

        // START INSERT BOOKINT PARIWISATA
        $booking = BookingTransaction::create($payload);
        // END INSERT BOOKINT PARIWISATA

        // START INSERT ITINERARY
        $valueItinerary = '';
        if ($itinerary_tujuan) {
            foreach ($req['itinerary_tujuan'] as $key => $value) {
                if ($valueItinerary === '') {
                    $valueItinerary .= '(' . $booking['id'] . ",'" . $itinerary_tujuan[$key] . "','" . $itinerary_destinasi[$key] . "','" . $itinerary_notes[$key] . "', NOW())";
                } else {
                    $valueItinerary .= ',(' . $booking['id'] . ",'" . $itinerary_tujuan[$key] . "','" . $itinerary_destinasi[$key] . "','" . $itinerary_notes[$key] . "', NOW())";
                }
            }
        }

        $resultInsertItinerary = DB::insert(
            'INSERT INTO booking_itinerary (
                                                booking_transaction_id,
                                                booking_itinerary_tujuan,
                                                booking_itinerary_destinasi,
                                                booking_itinerary_notes,
                                                created_at
                                            )
                                            VALUES ' . $valueItinerary,
        );
        // END INSERT ITINERARY

        // START INSERT SCHEDULE PARIWISATA
        $armada = json_decode($selected_armada);

        foreach ($armada as $key => $bus) {
            $payload = [
                '_token' => $_token,
                'id_booking_transaction' => $booking->id,
                'bus_type' => $bus->typeBus,
                'date_departure' => $wisata_tanggal_berangkat,
                'date_return' => $wisata_tanggal_kembali,
                'total_days' => $total_days,
                'bus_price' => $bus->price,
            ];
            $resultInsertSchedulePariwisata = SchedulePariwisata::create($payload);
        }
        // END INSERT SCHEDULE PARIWISATA

        // // ADD SCHEDULE
        // $date_departure = $req['transaction_travel_detail_date_departure'];
        // $date_return = $req['transaction_travel_detail_date_return'];
        // $id_armada = $req['pariwisata_armada'];
        // $bus_price = $req['bus_price'];
        // $notes = $req['notes_pariwisata'];

        // $diff = abs(strtotime($date_return) - strtotime($date_departure));
        // $years = floor($diff / (365 * 60 * 60 * 24));
        // $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        // $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        // foreach ($req['itinerary_tujuan'] as $key => $value) {
        //     DB::insert("INSERT INTO schedule_pariwisatas (id_booking_transaction, date_departure, date_return, id_armada, total_days, bus_price, notes ) VALUES ($booking->id, '$date_departure', '$date_return', $id_armada, $days,  $bus_price, '$notes') ");
        // }

        return response()->json([
            'data' => $resultInsertSchedulePariwisata,
            'message' => 'Berhasil submit Data Transaction Pariwisata.',
            'status' => $resultInsertSchedulePariwisata ? 200 : 400,
        ]);
    }

    public function scheduleBus(Request $request)
    {
        // ->where('armada_type', $request->typeBus)
        $armadas = Armada::orderBy('id', 'ASC')
            ->where('armada_category', 'PARIWISATA')
            ->get();
        $month = date('m');
        $year = date('Y');
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $day_offs = DB::select("SELECT * FROM day_offs WHERE MONTH(day_off_date) = $month AND YEAR(day_off_date) = $year");
        return view('admin.transaction.pariwisata.booking.schedule-bus', ['armadas' => $armadas, 'day_offs' => $day_offs, 'start_date' => $start_date, 'end_date' => $end_date]);
    }
    public function calculateEstimation(Request $request)
    {
        $destinations = $request->destination_wisata;
        $estimate_price = 0;
        for ($i = 0; $i < count($destinations) - 1; $i++) {
            $destination_from = $destinations[$i];
            $destination_target = $destinations[$i + 1];
            $route = RouteWisata::where('route_wisata_from', $destination_from)
                ->where('route_wisata_target', $destination_target)
                ->first();
            if ($route) {
                $route_price = $route->route_wisata_price;
                $estimate_price += $route_price;
            }
        }
        return response()->json([
            'data' => $estimate_price,
            'message' => 'Estimasi perjalanan pariwisata Rp. ' . number_format($estimate_price),
            'status' => $estimate_price ? 200 : 400,
        ]);
    }

    public function getEstimationDayRouteWisata(Request $request)
    {
        $destination_from = $request->from_wisata;
        $destination_target = $request->target_wisata;
        $route = RouteWisata::where('route_wisata_from', $destination_from)
            ->where('route_wisata_target', $destination_target)
            ->first();
        return response()->json([
            'data' => $route ? $route->route_wisata_estimate : [],
            'message' => $route ? 'Berhasil mendapatkan data Rute Wisata' : 'Rute Wisata tidak ditemukan',
            'status' => $route ? 200 : 400,
        ]);
    }

    public function printOfferingWisata($data)
    {
        $customer_name = $_GET['transaction_customer_name'];
        $customer_phone = $_GET['transaction_customer_phone'];
        $customer_email = $_GET['transaction_customer_email'];
        $customer_nik = $_GET['transaction_customer_nik'];
        echo $customer_name;
        $data = [
            'customer_name' => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_email' => $customer_email,
            'customer_nik' => $customer_nik,
        ];
        // die;
        // $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.booking_transactions_code = '$booking_code'"))->first();
        // $id_booking = $data->id;
        // $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id_booking");
        $pdf = PDF::loadView('admin.reports.offering-pariwisata', ['data' => $data]);
        $invoice_name = 'OFFERING_PARIWISATA';
        return $pdf->stream($invoice_name . '.pdf');
        // return view('admin.reports.offering-pariwisata', ['data' => $data]);
        // die;
        // $pdf = PDF::loadView('admin.reports.offering-pariwisata');
        // $offering = 'OFFERING_PARIWISATA';
        // return $pdf->stream($offering . '.pdf');
    }

    public function printDataOfferingWisata($data)
    {
        // $data = json_decode($data, true);
        $data = json_encode($data, true);

        var_dump(json_decode($data, true));

        // $array = unserialize($data);
        print_r($data);
    }

    public function savePariwisataOffering(Request $request)
    {
        extract($request->all());

        $payload = [
            '_token' => $_token,
            'booking_transactions_code' => 'P' . date('dHis'),
            'booking_transactions_customer_code' => $transaction_customer_id,
            'booking_transactions_type_booking' => 'PARIWISATA',
            'booking_transactions_city_from' => $from_wisata,
            'booking_transactions_city_to' => $target_wisata,
            'booking_transactions_total_seats' => $wisata_jumlah_penumpang,
            'booking_transactions_total_costs' => $total_offering_price,
            'booking_transactions_payment_method' => 'CASH',
            'booking_transactions_status' => 19,
            'created_by' => Auth::user()->id,
        ];

        $booking = BookingTransaction::create($payload);

        var_dump($booking);

        if ($offering_unit_mikro !== null) {
            for ($i = 0; $i < $offering_unit_mikro; $i++) {
                $payload = [
                    '_token' => $_token,
                    'id_booking_transaction' => $booking->id,
                    'bus_type' => 'MIKRO BUS',
                    'date_departure' => $wisata_tanggal_berangkat,
                    'date_return' => $wisata_tanggal_kembali,
                    'total_days' => $estimasi_hari_wisata,
                    'bus_price' => $mikro_unit_offering_price,
                ];
                SchedulePariwisata::create($payload);
            }
        }

        if ($offering_unit_medium !== null) {
            for ($i = 0; $i < $offering_unit_medium; $i++) {
                $payload = [
                    '_token' => $_token,
                    'id_booking_transaction' => $booking->id,
                    'bus_type' => 'MEDIUM BUS',
                    'date_departure' => $wisata_tanggal_berangkat,
                    'date_return' => $wisata_tanggal_kembali,
                    'total_days' => $estimasi_hari_wisata,
                    'bus_price' => $medium_unit_offering_price,
                ];
                SchedulePariwisata::create($payload);
            }
        }

        if ($offering_unit_bigbus !== null) {
            for ($i = 0; $i < $offering_unit_bigbus; $i++) {
                $payload = [
                    '_token' => $_token,
                    'id_booking_transaction' => $booking->id,
                    'bus_type' => 'BIG BUS',
                    'date_departure' => $wisata_tanggal_berangkat,
                    'date_return' => $wisata_tanggal_kembali,
                    'total_days' => $estimasi_hari_wisata,
                    'bus_price' => $bigbus_unit_offering_price,
                ];
                $action = SchedulePariwisata::create($payload);
                // if ($action->exists) {
                //     // success
                // } else {
                //     // failure
                // }
            }
        }

        return response()->json([
            'message' => 'Get Data',
            'status' => $data ? 200 : 400,
        ]);
    }

    function checkBusAvailability(Request $request)
    {
        $data = $request->all();
        $available_bus = DB::select("SELECT BS.bus_name BUS_TYPE, COUNT(*) AVAILABLE, BS.bus_price PRICE
        FROM armadas ARMD INNER JOIN bus BS ON ARMD.armada_type = BS.bus_name
        LEFT JOIN schedule_pariwisatas SCHPAR ON SCHPAR.id_armada = ARMD.id
        WHERE BS.bus_type = 'PARIWISATA'
        GROUP BY BS.bus_name");

        foreach ($available_bus as $value) {
            if ($value->BUS_TYPE === 'BIG BUS') {
                $total_av_bigbus = $value->AVAILABLE;
                $price_bigbus = $value->PRICE;
            } elseif ($value->BUS_TYPE === 'MEDIUM BUS') {
                $total_av_medium = $value->AVAILABLE;
                $price_medium = $value->PRICE;
            } elseif ($value->BUS_TYPE === 'MIKRO BUS') {
                $total_av_mikro = $value->AVAILABLE;
                $price_mikro = $value->PRICE;
            }
        }

        $data_availability = [
            'mikro_bus' => $total_av_mikro,
            'medium_bus' => $total_av_medium,
            'big_bus' => $total_av_bigbus,
        ];
        $data_price = [
            'mikro_bus' => $price_mikro,
            'medium_bus' => $price_medium,
            'big_bus' => $price_bigbus,
        ];

        return response()->json([
            'data_availability' => $data_availability,
            'data_price' => $data_price,
            'message' => 'Get Data',
            'status' => $data ? 200 : 400,
        ]);
    }
}
