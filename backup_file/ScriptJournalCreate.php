<?php

        // CREATE JOURNAL
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
        $journal_number = "JU" . $fullDate . "-" . $output;
        $amount = $data->booking_transactions_total_down_payment;
        $invoice_number = $data->booking_transactions_code;
        if ($request->type == "REGULER" && $request->action == "APPROVE") {
            $transaction_type = $request->regulerType;
            if ($transaction_type == "SUITESS") {
                $account_kredit = 27;
            } else if ($transaction_type == "EXECUTIVE") {
                $account_kredit = 28;
            }
        } else if ($request->type == "PARIWISATA" && $request->action == "APPROVE") {
            $account_kredit = 29;
        }
        $journal_description = 'Transaksi Tiket : ' . $invoice_number . ' total pembelian Rp. ' .  number_format($data->booking_transactions_total_costs);
        if ($data->booking_transactions_payment_method == "TRANSFER" && $data->booking_transactions_id_payment == 1) {
            $account_debit = 3;
        } else if ($data->booking_transactions_payment_method == "TRANSFER" && $data->booking_transactions_id_payment == 2) {
            $account_debit = 4;
        } else if ($data->booking_transactions_payment_method == "TRANSFER" && $data->booking_transactions_id_payment == 3) {
            $account_debit = 5;
        } else if ($data->booking_transactions_payment_method == "CASH") {
            $account_debit = 6;
        }


        $data_journal = [
            'journal_number' => $journal_number,
            'journal_date' => date("Y-m-d"),
            'journal_description' => $journal_description,
            'journal_debit' => $amount,
            'journal_kredit' => $amount,
            'journal_balance' => 0,
            'status' => 2
        ];
        
        $journal = Journal::create($data_journal);
        $data_debit = [
            'id_journal' => $journal->id,
            'id_account' => $account_debit,
            'type_journal' => 'DEBIT',
            'journal_amount' => $amount,
            'journal_notes' => ''
        ];
        $data_kredit = [
            'id_journal' => $journal->id,
            'id_account' => $account_kredit,
            'type_journal' => 'KREDIT',
            'journal_amount' => $amount,
            'journal_notes' => ''
        ];
        JournalDetail::create($data_debit);
        JournalDetail::create($data_kredit);