<?php

use Illuminate\Database\Seeder;
use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;

class JournalSeeder extends Seeder
{
    public function run()
    {
        Journal::create([
            'id' => 1,
            'journal_number' => 'JU130122-001',
            'journal_date' => '2022-01-13',
            'journal_description' => 'Journal Test 1',
            'journal_debit' => 100000,
            'journal_kredit' => 100000,
            'journal_balance' => 0,
            'status' => 2,
            'created_at' => '2022-01-19 08:18:50',
            'updated_at' => '2022-01-19 08:18:50'
        ]);



        Journal::create([
            'id' => 2,
            'journal_number' => 'JU190122-002',
            'journal_date' => '2022-01-19',
            'journal_description' => 'Transaksi Tiket : R19082548 total pembelian Rp. 1,500,000',
            'journal_debit' => 1500000,
            'journal_kredit' => 1500000,
            'journal_balance' => 0,
            'status' => 2,
            'created_at' => '2022-01-19 08:25:48',
            'updated_at' => '2022-01-19 08:25:48'
        ]);



        Journal::create([
            'id' => 3,
            'journal_number' => 'JU190122-003',
            'journal_date' => '2022-01-19',
            'journal_description' => 'Transaksi Tiket : R19082729 total pembelian Rp. 600,000',
            'journal_debit' => 600000,
            'journal_kredit' => 600000,
            'journal_balance' => 0,
            'status' => 2,
            'created_at' => '2022-01-19 08:27:29',
            'updated_at' => '2022-01-19 08:27:29'
        ]);

        Journal::create([
            'id' => 4,
            'journal_number' => 'JU290122-004',
            'journal_date' => '2022-01-29',
            'journal_description' => 'Transaksi Tiket : P29062338 total pembelian Rp. 590.000',
            'journal_debit' => 590000,
            'journal_kredit' => 590000,
            'journal_balance' => 0,
            'status' => 2,
            'created_at' => '2022-01-29 06:23:38',
            'updated_at' => '2022-01-29 06:23:38'
        ]);



        JournalDetail::create([
            'id' => 1,
            'id_journal' => 1,
            'id_account' => 4,
            'type_journal' => 'DEBIT',
            'journal_amount' => 100000,
            'journal_notes' => 'Ket 1',
            'created_at' => '2022-01-19 08:18:50',
            'updated_at' => '2022-01-19 08:18:50'
        ]);



        JournalDetail::create([
            'id' => 2,
            'id_journal' => 1,
            'id_account' => 24,
            'type_journal' => 'KREDIT',
            'journal_amount' => 100000,
            'journal_notes' => '',
            'created_at' => '2022-01-19 08:18:50',
            'updated_at' => '2022-01-19 08:18:50'
        ]);



        JournalDetail::create([
            'id' => 3,
            'id_journal' => 2,
            'id_account' => 3,
            'type_journal' => 'DEBIT',
            'journal_amount' => 1500000,
            'journal_notes' => '',
            'created_at' => '2022-01-19 08:25:48',
            'updated_at' => '2022-01-19 08:25:48'
        ]);



        JournalDetail::create([
            'id' => 4,
            'id_journal' => 2,
            'id_account' => 27,
            'type_journal' => 'KREDIT',
            'journal_amount' => 1500000,
            'journal_notes' => '',
            'created_at' => '2022-01-19 08:25:48',
            'updated_at' => '2022-01-19 08:25:48'
        ]);



        JournalDetail::create([
            'id' => 5,
            'id_journal' => 3,
            'id_account' => 5,
            'type_journal' => 'DEBIT',
            'journal_amount' => 600000,
            'journal_notes' => '',
            'created_at' => '2022-01-19 08:27:29',
            'updated_at' => '2022-01-19 08:27:29'
        ]);



        JournalDetail::create([
            'id' => 6,
            'id_journal' => 3,
            'id_account' => 28,
            'type_journal' => 'KREDIT',
            'journal_amount' => 600000,
            'journal_notes' => '',
            'created_at' => '2022-01-19 08:27:29',
            'updated_at' => '2022-01-19 08:27:29'
        ]);

        Journaldetail::create([
            'id' => 7,
            'id_journal' => 4,
            'id_account' => 3,
            'type_journal' => 'DEBIT',
            'journal_amount' => 590000,
            'journal_notes' => '',
            'created_at' => '2022-01-29 06:23:38',
            'updated_at' => '2022-01-29 06:23:38'
        ]);



        Journaldetail::create([
            'id' => 8,
            'id_journal' => 4,
            'id_account' => 29,
            'type_journal' => 'KREDIT',
            'journal_amount' => 590000,
            'journal_notes' => '',
            'created_at' => '2022-01-29 06:23:38',
            'updated_at' => '2022-01-29 06:23:38'
        ]);
    }
}
