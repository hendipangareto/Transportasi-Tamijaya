<?php

namespace App\Http\Controllers\Admin\FinanceAccounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\FinanceAccounting\Journal;
// require_once 'vendor/autoload.php';
// require_once 'config.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class JournalController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.journal.index');
        //
    }
    public function create()
    {
        $data = DB::table('journals')
            ->join('status', 'journals.status', 'status.id')
            ->select('journals.*', 'status.status_name')
            ->get();
        // $data = Journal::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.journal.display', ["data" => $data]);
    }
    public function store(Request $request)
    {
        // $this->_validation($request);
        $data = $request->all();
        $data['journal_debit'] = str_replace(".", "", $request->journal_debit);
        $data['journal_kredit'] = str_replace(".", "", $request->journal_kredit);
        $data['journal_balance'] = str_replace(".", "", $request->journal_balance);
        $journal = Journal::create($data);
        $id_journal = $journal->id;
        if (count($request->id_account)) {
            for ($count = 0; $count < count($request->id_account); $count++) {
                DB::table('journal_details')->insert(
                    [
                        'id_journal' => $id_journal,
                        'id_account' => $request->id_account[$count],
                        'type_journal' => $request->type_journal[$count],
                        'journal_amount' => str_replace(".", "", $request->journal_amount[$count]),
                        'journal_notes' => $request->journal_notes[$count]
                    ]
                );
            }
        }
        return response()->json([
            'data' => $journal,
            'message' => 'Berhasil menambahkan data ' . $journal->journal_number,
            'status' => $journal ? 200 : 400,
        ]);
    }

    public function show($type)
    {
        $count = Journal::count();
        if ($count > 0) {
            $last_data =  Journal::latest('id')->first();
            $last_data_code = substr($last_data->data_code, -3);
            if (str_contains($last_data_code, "00")) {
                $sequence = substr($last_data_code, -1) + 1;
            } else if (str_contains($last_data_code, "0")) {
                $sequence = substr($last_data_code, -2) + 1;
            } else {
                $sequence =  $last_data->id + 1;
            }
        } else {
            $sequence =  1;
        }

        $output = '';
        if ($sequence == 1) {
            $sequence = 1;
        }
        if (strlen($sequence) == 1) {
            $output = '00' . $sequence;
        } else if (strlen($sequence) == 2) {
            $output = '0' . $sequence;
        } else {
            $output = $sequence;
        }
        // GENERATE DATE TO NUMBER
        $fullDate = date("dmy");
        $code_data = "JU" . $fullDate . "-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $journal = Journal::findOrFail($id);
        $journal_details = DB::table('journal_details')
            ->join('accounts', 'journal_details.id_account', 'accounts.id')
            ->where([
                ['journal_details.id_journal', $id],
            ])->select('journal_details.*', 'accounts.account_code', 'accounts.account_name')
            ->get();
        $data = [
            "journal" => $journal,
            "journal_details" => $journal_details,
        ];
        return response()->json([
            'data' => $data,
            'status' => 200,
        ]);
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function getDataAccount()
    {
        $data = Account::orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data,
            'status' => 200,
        ]);
    }
    public function getDetailDataAccount($id)
    {
        $data = Account::orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data,
            'status' => 200,
        ]);
    }

    public function generateExceltoJSON(Request $request)
    {
        if ($request->file()) {

            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

                $arr_file = explode('.', $_FILES['file']['name']);
                $extension = end($arr_file);

                if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

                $sheetData = $spreadsheet->getSheetByName('Jurnal')->toArray();

                $insertValues = "";
                $totalDebit = 0;
                $totalKredit = 0;
                $totalBalance = 0;

                if (!empty($sheetData)) {

                    for ($i = 6; $i < count($sheetData); $i++) {
                        if ($sheetData[$i][1] && $sheetData[$i][2] && $sheetData[$i][3] && $sheetData[$i][4]) {
                            // Format Date Before Insert
                            $journal_date = date_format(date_create($sheetData[$i][1]), 'Y-m-d H:i:s');
                            $journal_notes = $sheetData[$i][4];

                            if ($sheetData[$i][5]) {
                                // Format Debit
                                $formattedDebit = str_replace("Rp ", "", $sheetData[$i][5]);
                                $formattedDebit = str_replace(" ", "", $formattedDebit);
                                $formattedDebit = str_replace(",", "", $formattedDebit);
                                $sheetData[$i][5] = (float)$formattedDebit;
                                $totalDebit += (float)$formattedDebit;
                                $totalBalance = $totalDebit - $totalKredit;

                                if ($insertValues === "") {
                                    $insertValues .= "(
                                        JOURNAL_ID,
                                        'DEBIT',
                                        $formattedDebit,
                                        '$journal_notes',
                                        '$journal_date'
                                    )";
                                } else {
                                    $insertValues .= ", (
                                        JOURNAL_ID,
                                        'DEBIT',
                                        $formattedDebit,
                                        '$journal_notes',
                                        '$journal_date'
                                    )";
                                }
                            } else if ($sheetData[$i][6]) {
                                // Format Kredit
                                $formattedKredit = str_replace("Rp ", "", $sheetData[$i][6]);
                                $formattedKredit = str_replace(" ", "", $formattedKredit);
                                $formattedKredit = str_replace(",", "", $formattedKredit);
                                $sheetData[$i][6] = (float)$formattedKredit;
                                $totalKredit += (float)$formattedKredit;
                                $totalBalance = $totalDebit - $totalKredit;

                                if ($insertValues === "") {
                                    $insertValues .= "(
                                        JOURNAL_ID,
                                        'KREDIT',
                                        $formattedKredit,
                                        '$journal_notes',
                                        '$journal_date'
                                    )";
                                } else {
                                    $insertValues .= ", (
                                        JOURNAL_ID,
                                        'KREDIT',
                                        $formattedKredit,
                                        '$journal_notes',
                                        '$journal_date'
                                    )";
                                }
                            }
                        }
                    }
                }

                $SQL_HEADER = "INSERT INTO journals (journal_number,journal_date,journal_description,journal_debit,journal_kredit,journal_balance,status,created_at)
                SELECT CONCAT('JU" . date('dmy') . "-', LPAD(MAX(id) +1, 3, 0)), CURDATE(), 'JOURNAL UMUM : ...', $totalDebit, $totalKredit, $totalBalance, 2, NOW() FROM journals";

                echo $SQL_HEADER;

                // if(DB::insert($SQL_HEADER)){
                //     $JOURNAL_ID = DB::getPdo()->lastInsertId();
                //         $insertValues = str_replace("JOURNAL_ID", $JOURNAL_ID, $insertValues);

                //         $SQL_DETAIL = "INSERT INTO journal_details ( id_journal, type_journal, journal_amount, journal_notes, created_at )
                //         VALUES $insertValues";

                //         if(DB::insert($SQL_DETAIL)){
                //             return response()->json([
                //                 'status' => 200,
                //             ]);
                //         } else {
                //             return response()->json([
                //                 'status' => 400,
                //                 'message' => 'Error Insert Detail Journal',
                //             ]);
                //         }

                // } else {
                //     return response()->json([
                //         'status' => 400,
                //         'message' => 'Error Insert Header Journal',
                //     ]);
                // }

            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Upload only CSV or Excel file.',
                ]);
            }
        }
    }
}
