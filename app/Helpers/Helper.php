<?php

namespace App\Helpers;

use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;
use App\Models\FinanceAccounting\CashFlow;
use App\Models\Transaction\Booking;

class Helper
{
    public static function createJournal($booking_id, $booking_type, $armada_type, $journal_description, $amount, $action = 'APPROVE')
    {
        try {
            $data = Booking::findOrFail($booking_id);
            // CREATE JOURNAL
            $count = Journal::count();
            if ($count > 0) {
                $last_data = Journal::latest('id')->first();
                $last_data_code = substr($last_data->data_code, -3);
                if (str_contains($last_data_code, '00')) {
                    $sequence = substr($last_data_code, -1) + 1;
                } elseif (str_contains($last_data_code, '0')) {
                    $sequence = substr($last_data_code, -2) + 1;
                } else {
                    $sequence = $last_data->id + 1;
                }
            } else {
                $sequence = 1;
            }

            $output = '';
            if ($sequence == 1) {
                $sequence = 1;
            }
            if (strlen($sequence) == 1) {
                $output = '00' . $sequence;
            } elseif (strlen($sequence) == 2) {
                $output = '0' . $sequence;
            } else {
                $output = $sequence;
            }
            // GENERATE DATE TO NUMBER
            $fullDate = date('dmy');
            $journal_number = 'JU' . $fullDate . '-' . $output;
            $amount = $data->booking_transactions_total_down_payment;
            $invoice_number = $data->booking_transactions_code;
            if ($booking_type == 'REGULER' && $action == 'APPROVE') {
                if ($armada_type == 'SUITESS') {
                    $account_kredit = 27;
                } elseif ($armada_type == 'EXECUTIVE') {
                    $account_kredit = 28;
                }
            } elseif ($booking_type == 'PARIWISATA' && $action == 'APPROVE') {
                $account_kredit = 29;
            }
            $journal_description = 'Transaksi Tiket : ' . $invoice_number . ' total pembelian Rp. ' . number_format($data->booking_transactions_total_costs);
            if ($data->booking_transactions_payment_method == 'TRANSFER' && $data->booking_transactions_id_payment == 1) {
                $account_debit = 3;
            } elseif ($data->booking_transactions_payment_method == 'TRANSFER' && $data->booking_transactions_id_payment == 2) {
                $account_debit = 4;
            } elseif ($data->booking_transactions_payment_method == 'TRANSFER' && $data->booking_transactions_id_payment == 3) {
                $account_debit = 5;
            } elseif ($data->booking_transactions_payment_method == 'CASH') {
                $account_debit = 6;
            }

            $data_journal = [
                'journal_number' => $journal_number,
                'journal_date' => date('Y-m-d'),
                'journal_description' => $journal_description,
                'journal_debit' => $amount,
                'journal_kredit' => $amount,
                'journal_balance' => 0,
                'status' => 2,
            ];

            $journal = Journal::create($data_journal);

            $data_debit = [
                'id_journal' => $journal->id,
                'id_account' => $account_debit,
                'type_journal' => 'DEBIT',
                'journal_amount' => $amount,
                'journal_notes' => '',
            ];
            $data_kredit = [
                'id_journal' => $journal->id,
                'id_account' => $account_kredit,
                'type_journal' => 'KREDIT',
                'journal_amount' => $amount,
                'journal_notes' => '',
            ];

            $resultDebit = JournalDetail::create($data_debit);
            $resultKredit = JournalDetail::create($data_kredit);
            var_dump('resultDebit', $resultDebit);
            var_dump('resultKredit', $resultKredit);

            return response()->json(
                [
                    'debit' => $resultDebit,
                    'kredit' => $resultKredit,
                ],
                200,
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public static function createCashflow($id_account, $description, $type, $amount, $status = 'PAID')
    {
        try {
            $data_cf = [
                'id_account' => $id_account,
                'description' => $description,
                'type' => $type,
                'amount' => $amount,
                'status' => 'PAID'
            ];
            $resultData = CashFlow::create($data_cf);
            return response()->json(
                [
                    'data' => $resultData
                ],
                200,
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public static function changeDateFormate($date, $date_format)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
    }

    public static function productImagePath($image_name)
    {
        return public_path('images/products/' . $image_name);
    }
}
