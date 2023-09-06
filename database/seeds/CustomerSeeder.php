<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'id' => 1,
            'customer_code' => 'CST-001',
            'customer_name' => 'Johanes Adhitya Hartanto',
            'id_city' => 3171,
            'id_province' => 31,
            'customer_address' => 'Jl. Ngesrep Timur nomor 19 A RT01/RT01',
            'customer_phone' => '0812378132312',
            'customer_email' => 'joadhitya@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => '$2y$10$meNX6xziHERwtwo0CpQ8iujswWoAMypx48hBAKzxAHM6Fdn7FwNFe',
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:29:32',
            'updated_at' => '2022-02-06 07:29:32'
        ]);

        Customer::create([
            'id' => 2,
            'customer_code' => 'CST-002',
            'customer_name' => 'Christian Joy Sam Tanadi',
            'id_city' => 3171,
            'id_province' => 31,
            'customer_address' => 'Jl. Batam Miroto RT 02 / RW 15',
            'customer_phone' => '08132983217',
            'customer_email' => 'christian@gmail.com',
            'customer_nik' => '10293938182',
            'customer_password' => '$2y$10$6N6HS5Wyn9dXl.pDifKEWuYPCqtY2GlJ/NU95mdAjZSIoaO7oW9JO',
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:29:32',
            'updated_at' => '2022-02-06 07:29:32'
        ]);

        Customer::create([
            'id' => 3,
            'customer_code' => 'CST-003',
            'customer_name' => 'Yohanes Chandra Wijaya',
            'id_city' => 3171,
            'id_province' => 31,
            'customer_address' => 'Jl. Batam Miroto RT 02 / RW 15',
            'customer_phone' => '08123781231',
            'customer_email' => 'cw@gmail.com',
            'customer_nik' => '1239812983',
            'customer_password' => bcrypt("cw"),
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:29:32',
            'updated_at' => '2022-02-06 07:29:32'
        ]);

        Customer::create([
            'id' => 4,
            'customer_code' => 'CST-004',
            'customer_name' => 'Gading Condro Prasetyo',
            'id_city' => 1501,
            'id_province' => 15,
            'customer_address' => 'Jl. Solo Baru Nomor 19 A',
            'customer_phone' => '08189371237',
            'customer_email' => 'gadingramjest@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:31:04',
            'updated_at' => '2022-02-06 07:31:04'
        ]);

        Customer::create([
            'id' => 5,
            'customer_code' => 'CST-005',
            'customer_name' => 'Marcelia Litandy',
            'id_city' => 3318,
            'id_province' => 33,
            'customer_address' => 'Jl. Sunter Utara Indah Nomor 23A',
            'customer_phone' => '0837812731',
            'customer_email' => 'marcellin@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:31:29',
            'updated_at' => '2022-02-06 07:31:29'
        ]);

        Customer::create([
            'id' => 6,
            'customer_code' => 'CST-006',
            'customer_name' => 'Nada Klarissa',
            'id_city' => 3403,
            'id_province' => 34,
            'customer_address' => 'Jl. Bukit Utara Nomor 7',
            'customer_phone' => '089812371',
            'customer_email' => 'nadaklarisa@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:31:57',
            'updated_at' => '2022-02-06 07:31:57'
        ]);

        Customer::create([
            'id' => 7,
            'customer_code' => 'CST-007',
            'customer_name' => 'Maggie Handoko',
            'id_city' => 3674,
            'id_province' => 36,
            'customer_address' => 'Jl. Beryl Barat Nomor 15',
            'customer_phone' => '0878793211',
            'customer_email' => 'maggie@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:32:27',
            'updated_at' => '2022-02-06 07:32:27'
        ]);

        Customer::create([
            'id' => 8,
            'customer_code' => 'CST-008',
            'customer_name' => 'Frances Gain',
            'id_city' => 8271,
            'id_province' => 82,
            'customer_address' => 'Jl. Bukit Sintha Nomor 999',
            'customer_phone' => '0873218937',
            'customer_email' => 'frances@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:32:51',
            'updated_at' => '2022-02-06 07:32:51'
        ]);

        Customer::create([
            'id' => 9,
            'customer_code' => 'CST-009',
            'customer_name' => 'Giovanno Adnan',
            'id_city' => 3521,
            'id_province' => 35,
            'customer_address' => 'Jl. Pamulangsing Nomor 5',
            'customer_phone' => '08397213913',
            'customer_email' => 'vano@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:33:20',
            'updated_at' => '2022-02-06 07:33:20'
        ]);

        Customer::create([
            'id' => 10,
            'customer_code' => 'CST-010',
            'customer_name' => 'Gregorius Agoy',
            'id_city' => 6211,
            'id_province' => 62,
            'customer_address' => 'Jl. Bengalon Jauh Banget nomor 20',
            'customer_phone' => '08783921631',
            'customer_email' => 'agoygoy@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:34:15',
            'updated_at' => '2022-02-06 07:34:15'
        ]);

        Customer::create([
            'id' => 11,
            'customer_code' => 'CST-011',
            'customer_name' => 'Dodo',
            'id_city' => 3528,
            'id_province' => 35,
            'customer_address' => 'Jl. Tlogo Shari Nomor 99',
            'customer_phone' => '0837273912',
            'customer_email' => 'dodo@gmail.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:36:01',
            'updated_at' => '2022-02-06 07:36:01'
        ]);

        Customer::create([
            'id' => 12,
            'customer_code' => 'CST-012',
            'customer_name' => 'Sherly V.',
            'id_city' => 3514,
            'id_province' => 35,
            'customer_address' => 'Jl. Tirto Mulyo Nomor 1',
            'customer_phone' => '08989893728',
            'customer_email' => 'sherly@yahoo.com',
            'customer_nik' => '1507083927382',
            'customer_password' => NULL,
            'otp' => NULL,
            'otp_time' => NULL,
            'is_validate' => 'N',
            'created_at' => '2022-02-06 07:36:24',
            'updated_at' => '2022-02-06 07:36:24'
        ]);
    }
}
