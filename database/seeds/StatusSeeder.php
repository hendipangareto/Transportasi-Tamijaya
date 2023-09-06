<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Status;

class StatusSeeder extends Seeder
{

    public function run()
    {
        Status::create([
            'status_code' => 'STS-001',
            'status_name' => 'ACTIVE',
            'status_description' => 'ACTIVE',
        ]);
        Status::create([
            'status_code' => 'STS-002',
            'status_name' => 'NON ACTIVE',
            'status_description' => 'NON ACTIVE',
        ]);
        Status::create([
            'status_code' => 'STS-003',
            'status_name' => 'PROCESSED',
            'status_description' => 'PROCESSED',
        ]);
        Status::create([
            'status_code' => 'STS-004',
            'status_name' => 'FINISHED',
            'status_description' => 'FINISHED',
        ]);
        Status::create([
            'status_code' => 'STS-005',
            'status_name' => 'POSTED',
            'status_description' => 'POSTED',
        ]);
        Status::create([
            'status_code' => 'STS-006',
            'status_name' => 'ARCHIEVED',
            'status_description' => 'ARCHIEVED',
        ]);
        Status::create([
            'status_code' => 'STS-007',
            'status_name' => 'UNPAID',
            'status_description' => 'UNPAID',
        ]);
        Status::create([
            'status_code' => 'STS-008',
            'status_name' => 'PAID',
            'status_description' => 'PAID',
        ]);
        Status::create([
            'status_code' => 'STS-009',
            'status_name' => 'PENDING',
            'status_description' => 'PENDING',
        ]);
        Status::create([
            'status_code' => 'STS-010',
            'status_name' => 'CANCELED',
            'status_description' => 'CANCELED',
        ]);
        Status::create([
            'status_code' => 'STS-011',
            'status_name' => 'DEPART',
            'status_description' => 'DEPART',
        ]);
        Status::create([
            'status_code' => 'STS-012',
            'status_name' => 'ARRIVE',
            'status_description' => 'ARRIVE',
        ]);
        Status::create([
            'status_code' => 'STS-013',
            'status_name' => 'RESCHEDULE',
            'status_description' => 'RESCHEDULE',
        ]);
        Status::create([
            'status_code' => 'STS-014',
            'status_name' => 'DONE',
            'status_description' => 'DONE',
        ]);
        Status::create([
            'status_code' => 'STS-015',
            'status_name' => 'ON BOARDING',
            'status_description' => 'ON BOARDING',
        ]);
        Status::create([
            'status_code' => 'STS-016',
            'status_name' => 'WAITING ON BOARDING',
            'status_description' => 'WAITING ON BOARDING',
        ]);
        Status::create([
            'status_code' => 'STS-017',
            'status_name' => 'WAITING PAYMENT',
            'status_description' => 'WAITING PAYMENT',
        ]);
        Status::create([
            'status_code' => 'STS-018',
            'status_name' => 'COMPLETED',
            'status_description' => 'COMPLETED',
        ]);
        Status::create([
            'status_code' => 'STS-019',
            'status_name' => 'REQUESTED',
            'status_description' => 'REQUESTED',
        ]);
        Status::create([
            'status_code' => 'STS-020',
            'status_name' => 'DOWN PAYMENT',
            'status_description' => 'DOWN PAYMENT',
        ]);
        Status::create([
            'status_code' => 'STS-021',
            'status_name' => 'APPROVED',
            'status_description' => 'APPROVED',
        ]);
        Status::create([
            'status_code' => 'STS-022',
            'status_name' => 'REJECTED',
            'status_description' => 'REJECTED',
        ]);
        Status::create([
            'status_code' => 'STS-023',
            'status_name' => 'APPROVED BY FINANCE',
            'status_description' => 'APPROVED BY FINANCE',
        ]);
        Status::create([
            'status_code' => 'STS-024',
            'status_name' => 'OFFERING',
            'status_description' => 'OFFERING',
        ]);
    }
}
